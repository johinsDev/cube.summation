<form method="POST" action="{{ route('cube.update') }}" accept-charset="UTF-8"><input name="_token" type="hidden" value="mNZ7OJidLVCRPV6vrJ8fwmEAbVRjnypYgLiyiXqy">
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