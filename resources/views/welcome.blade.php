@extends('layouts.app')
    @section('content')
        <main>


            <div class="container">

                <h1>Cube Summation using the Database</h1>
                <h3></h3>

                <div class="divider"></div>

                <form method="POST" action="{{ route('init.cube') }}" accept-charset="UTF-8">
                    {{ csrf_field() }}
                    <h4>Create a new Test Cases</h4>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="size" class="control-label">Size (size from 1 to 50)</label>
                                <input class="form-control" name="test_cases_num" type="number" value="{{ session()->has('test_cases') ? session()->get('test_cases') : 1}}" id="test_cases">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <input class="btn btn-primary" name="submit-btn" type="submit" value="Create new Test">
                        </div>
                        <div class="col-md-6">
                            <p class="text-danger">NOTE: This deletes the old matrix and queries</p>
                            <p class="text-warning">Due to heroku constraints, the maximum size can be 21 X 21
                                X21</p>
                        </div>
                    </div>
                </form>

                <div class="divider"></div>

                @if (session()->has('test_cases'))

                @endif
            </div>
        </main>
    @endsection