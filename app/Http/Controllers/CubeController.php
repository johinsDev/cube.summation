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
}
