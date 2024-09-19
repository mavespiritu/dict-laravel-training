<form method="{{ $method }}" action="{{ $actionUrl }}">
    @csrf
    <div class="form-group">
        <label for="">Title</label>
        <input type="text" class="form-control" name="title" id="title" value="{{ !empty($data) ? $data->title : '' }}" required/>
    </div>

    <div class="form-group">
        <label for="">Description</label>
        <input type="text" class="form-control" name="description" id="description" value="{{ !empty($data) ? $data->description : '' }}" />
    </div>

    <div class="form-group">
        <label for="">Country ID</label>
        <input type="text" class="form-control" name="country_id" id="country_id" value="{{ !empty($data) ? $data->country_id : '' }}" />
    </div>

    <div class="form-group">
        <label for="">Stocks</label>
        <input type="number" class="form-control" name="stocks" id="stocks" value="{{ !empty($data) ? $data->stocks : '' }}" />
    </div>

    <div class="form-group">
        <label for="">Amount</label>
        <input type="number" class="form-control" name="amount" id="amount" value="{{ !empty($data) ? $data->amount : '' }}" />
    </div>

    <div class="form-group">
        <label for="">Photo</label>
        <input type="text" class="form-control" name="photo" id="photo" value="{{ !empty($data) ? $data->photo : '' }}" />
    </div>

    <hr>

    <button type="submit" class="btn btn-primary">{{ $submitButtonText }}</button>
</form>
