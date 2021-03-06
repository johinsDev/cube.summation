<form method="POST" action="{{ route('cube.create') }}" accept-charset="UTF-8">
    {{ csrf_field() }}
    <h4>Create a new Cube</h4>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="size" class="control-label">Size (size from 1 to 100)</label>
                <input class="form-control" name="size"   type="number"  value="{{ session()->has('cube') ? session()->get('cube')->n : 1  }}" id="size">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="size" class="control-label">Commands (queries and updates) </label>
                <input class="form-control" name="commands"  type="number"  value="{{ session()->has('cube') ? session()->get('cube')->m : 1  }}" id="commands">
            </div>
        </div>

        @if(session()->get('test_cases') > 0)
            <div class="col-md-4">
                <input class="btn btn-primary" name="submit-btn" type="submit" value="Create new Cube">
            </div>
        @else
            <p class="text-warning">You dont have more test. Create a new.</p>
        @endif
    </div>
</form>