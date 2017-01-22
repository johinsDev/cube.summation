<?php

namespace App\Http\Controllers;

use App\Models\Cube;
use Illuminate\Http\Request;

class CubeController extends Controller
{
    public function home()
    {
        return view('welcome');
    }

    public function init(Request $request)
    {
        $this->validate( $request , [
            'test_cases_num' => 'required|integer|between:1,50'
        ]);

        session()->remove('cube');

        session()->remove('queries_history');

        session()->put('test_cases' , $request->get('test_cases_num'));
        
        return redirect()->route('home');
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'commands' => 'required|integer|between:1,1000',
            'size' => 'required|integer|between:1,100',
        ]);

        if (!session()->get('test_cases'))
            return redirect()->route('home')->withError('Dont have more tests.create new');
            
        $cube = new Cube($request->get('size') , $request->get('commands'));

        session()->put('test_cases' , session()->get('test_cases') - 1);

        $cube->saveMValue($request->get('commands'));

        $cube->setValue('queries_history' , 'Create new cube 3 X '.$request->get('size') , -1);

        $request->session()->put('cube', $cube);

        return redirect()->route('home')->withInfo('Cube create');
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'x' => 'required|integer|min:1',
            'y' => 'required|integer|min:1',
            'z' => 'required|integer|min:1',
            'value' => 'required|integer|between:-1000000000,1000000000',
        ]);

        $cube = session()->get('cube');

        if (!$cube)
            return redirect()->route('home')->withError('Cube not exists');

        $input = $request->only('x', 'y', 'z', 'value');

        if ($input['x'] > $cube->n || $input['y'] > $cube->n || $input['z'] > $cube->n)
            return redirect()->route('home')->withError('Values exceded');

        if (!$cube->has('queries'))
            return redirect()->route('home')->withError('You don not have more commands');

        $cube->updateCube($input['x'] - 1, $input['y'] - 1, $input['z'] - 1, $input['value']);

        $message = 'Update cell '.$input['x'].' '.$input['y'].' '.$input['z'].' to: '.$input['value'];

        $cube->restart('queries');

        $cube->setValue('queries_history' , $message);

        return redirect()->route('home')->withInfo($message);
    }

    public function query(Request $request)
    {
        $cube = session()->get('cube');


        $this->validate($request, [
            'x1' => 'required|numeric|min:1|between:1,'.$request->get('x2'),
            'x2' => 'required|numeric|min:1|between:'.(int) $request->get('x1').','.(int) $cube->n,
            'y1' => 'required|numeric|min:1|between:1,'.$request->get('y2'),
            'y2' => 'required|numeric|min:1|between:'.$request->get('y1').','.$cube->n,
            'z1' => 'required|numeric|min:1|between:1,'.$request->get('z2'),
            'z2' => 'required|numeric|min:1|between:'.$request->get('z1').','.$cube->n,
        ]);

        if (!$cube)
            return redirect()->route('home')->withError('Cube not exists');

        $values = $request->only('x1', 'x2', 'y1', 'y2', 'z1', 'z2');

        if (!$cube->has('queries'))
            return redirect()->route('home')->withError('You don not have more commands');
        
        $result = $cube->queryCube($values['x1']-1, $values['y1']-1, $values['z1']-1, $values['x2']-1, $values['y2']-1, $values['z2']-1);
        $message = 'The sum of cells between '.$values['x1'].' '.$values['y1'].' '.$values['z1'].' and '.$values['x2'].' '.$values['y2'].' '.$values['z2'].' is: '.$result;
        
        $cube->restart('queries');
        
        $cube->setValue('queries_history' , $message);
        
        return redirect()->route('home')->withInfo($message);
    }
}
