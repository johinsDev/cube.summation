<?php

namespace App\Http\Controllers;

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
}
