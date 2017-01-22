@extends('layouts.app')
    @section('content')
        <main>


            <div class="container">
                @if(session()->has('info'))
                    <div class="alert alert-info">
                        <p>{{ session()->get('info') }}</p>
                    </div>
                @endif
                    @if(session()->has('error'))
                        <div class="alert alert-danger">
                            <p>{{ session()->get('error') }}</p>
                        </div>
                    @endif
                <h1>Cube Summation using the Session</h1>
                <h3>{{ session()->has('cube') ? '3 X '.session()->get('cube')->n : 'None Cube'  }}</h3>

                <div class="divider"></div>

                <form method="POST" action="{{ route('init.cube') }}" accept-charset="UTF-8">
                    {{ csrf_field() }}
                    <h4>Create a new Test Cases</h4>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="size" class="control-label">Num Test (size from 1 to 50)</label>
                                <input class="form-control" name="test_cases_num" max="50" type="number"  value="{{ session()->has('test_cases') ? session()->get('test_cases') : 1}}" id="test_cases">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <input class="btn btn-primary" name="submit-btn" type="submit" value="Create new Test">
                        </div>
                        <div class="col-md-6">
                            <p class="text-danger">NOTE: This deletes the old matrix and queries</p>
                            @if(count($errors))
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{$error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>
                </form>

                <div class="divider"></div>

                @if (session()->has('test_cases'))
                    @include('partials.create')
                    @if(session()->has('cube') && session()->get('cube')->has('queries'))
                        <div class="divider"></div>
                            @include('partials.update')
                        <div class="divider"></div>
                            @include('partials.query')
                     @endif
                @endif
            </div>
        </main>
    @endsection