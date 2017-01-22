<form method="POST" action="{{ route('cube.query') }}" accept-charset="UTF-8">
    {!! csrf_field() !!}
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