<form method="POST" action="{{ route('create.cube') }}" accept-charset="UTF-8">
    {{ csrf_field() }}
    <h4>Create a new Cube</h4>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="size" class="control-label">Size (size from 1 to 100)</label>
                <input class="form-control" name="size"  type="number"  value="" id="size">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="size" class="control-label">Commands (queries and updates) (size from 1 to 1000)</label>
                <input class="form-control" name="commands"  type="number"  value="" id="commands">
            </div>
        </div>
        <div class="col-md-4">
            <input class="btn btn-primary" name="submit-btn" type="submit" value="Create new Cube">
        </div>
        <div class="col-md-6">
            @if(count($errors))
                @foreach($errors->all() as $error)
                    <p class="text-warning">{{ $error }}</p>
                @endforeach
            @endif
        </div>
    </div>
</form>