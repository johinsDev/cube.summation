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
        session()->put('test_cases' , $request->get('test_cases_num'));

        return redirect()->route('home');
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'commands' => 'required|integer|between:1,1000',
            'size' => 'required|integer|between:1,100',
        ]);

        $cube = new Cube($request->get('size') , $request->get('commands'));
        $cube->saveMValue($request->get('commands'));
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
        $cube->restart('queries');

        return redirect()->route('home')->withInfo('Update cell '.$input['x'].' '.$input['y'].' '.$input['z'].' to: '.$input['value']);
    }
}
