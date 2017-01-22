@extends('layouts.app')
    @section('content')
        <main>


            <div class="container">

                <h1>Cube Summation using the Database</h1>
                <h3></h3>

                <div class="divider"></div>

                <form method="POST" action="" accept-charset="UTF-8">
                    {{ csrf_field() }}
                    <h4>Create a new Matrix</h4>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="size" class="control-label">Size (size from 1 to 21)</label>
                                <input class="form-control" name="size" type="number" value="4" id="size">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <input class="btn btn-primary" name="submit-btn" type="submit" value="Create new Matrix">
                        </div>
                        <div class="col-md-6">
                            <p class="text-danger">NOTE: This deletes the old matrix</p>
                            <p class="text-warning">Due to heroku constraints, the maximum size can be 21 X 21
                                X21</p>
                        </div>
                    </div>
                </form>

                <div class="divider"></div>

                <form method="POST" action="http://aqueous-peak-25449.herokuapp.com/db/update" accept-charset="UTF-8"><input name="_token" type="hidden" value="mNZ7OJidLVCRPV6vrJ8fwmEAbVRjnypYgLiyiXqy">
                    <h4>Update a Matrix cell</h4>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="x" class="control-label">X position</label>
                                <input class="form-control" name="x" type="number" value="1" id="x">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="y" class="control-label">Y position</label>
                                <input class="form-control" name="y" type="number" value="1" id="y">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="z" class="control-label">Z position</label>
                                <input class="form-control" name="z" type="number" value="1" id="z">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="value" class="control-label">Value</label>
                                <input class="form-control" name="value" type="number" value="1" id="value">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input class="btn btn-primary" name="submit-btn" type="submit" value="Update value">
                            </div>
                        </div>
                    </div>
                </form>

                <div class="divider"></div>

                <form method="POST" action="http://aqueous-peak-25449.herokuapp.com/db/query" accept-charset="UTF-8"><input name="_token" type="hidden" value="mNZ7OJidLVCRPV6vrJ8fwmEAbVRjnypYgLiyiXqy">
                    <h4>Query the matrix</h4>
                    <div class="row">
                        <div class="col-md-1">
                            <div class="form-group">
                                <label for="x1" class="control-label">X1</label>
                                <input class="form-control" name="x1" type="number" value="1" id="x1">
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group">
                                <label for="y1" class="control-label">Y1</label>
                                <input class="form-control" name="y1" type="number" value="1" id="y1">
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group">
                                <label for="z1" class="control-label">Z1</label>
                                <input class="form-control" name="z1" type="number" value="1" id="z1">
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group">
                                <label for="x2" class="control-label">X2</label>
                                <input class="form-control" name="x2" type="number" value="1" id="x2">
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group">
                                <label for="y2" class="control-label">Y2</label>
                                <input class="form-control" name="y2" type="number" value="1" id="y2">
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group">
                                <label for="z2" class="control-label">Z2</label>
                                <input class="form-control" name="z2" type="number" value="1" id="z2">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="btn btn-primary" name="submit-btn" type="submit" value="Query">
                            </div>
                        </div>
                    </div>
                </form>


            </div>
        </main>
    @endsection