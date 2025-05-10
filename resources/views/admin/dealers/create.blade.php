@extends('adminlte::page')

@section('title', 'Add Dealer')

@section('content_header')
    <h1>Add Dealer</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> Please correct the errors below.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('dealers.store') }}" method="POST">
                @csrf

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="dealername">Dealer Name</label>
                        <input type="text" name="dealername" class="form-control" required>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="storecode">Store Code</label>
                        <input type="text" name="storecode" class="form-control">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="address1">Address 1</label>
                        <input type="text" name="address1" class="form-control">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="address2">Address 2</label>
                        <input type="text" name="address2" class="form-control">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="address3">Address 3</label>
                        <input type="text" name="address3" class="form-control">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="suburbs">Suburbs</label>
                        <input type="text" name="suburbs" class="form-control">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="city">City</label>
                        <input type="text" name="city" class="form-control">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="state">State</label>
                        <input type="text" name="state" class="form-control">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="pincode">Pincode</label>
                        <input type="text" name="pincode" class="form-control">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="phone">Phone</label>
                        <input type="text" name="phone" class="form-control">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="fax">Fax</label>
                        <input type="text" name="fax" class="form-control">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="contactnumber">Contact Number</label>
                        <input type="text" name="contactnumber" class="form-control">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="contactperson">Contact Person</label>
                        <input type="text" name="contactperson" class="form-control">
                    </div>

                    <div class="form-group col-md-6">
    <label for="dealertype">Dealer Type</label>
    <select name="dealertype" id="dealertype" class="form-control" required>
        <option value="">Select Dealer Type</option>
        <option value="world" {{ old('dealertype') == 'world' ? 'selected' : '' }}>World</option>
        <option value="studio" {{ old('dealertype') == 'studio' ? 'selected' : '' }}>Studio</option>
        <option value="showroom" {{ old('dealertype') == 'showroom' ? 'selected' : '' }}>Showroom</option>
    </select>
</div>


                    <div class="form-group col-md-12">
                        <label for="google_link">Google Map Link</label>
                        <textarea name="google_link" class="form-control" rows="2"></textarea>
                    </div>

                    <div class="form-group col-md-12">
                        <label for="360degree">360° View Link</label>
                        <textarea name="360degree" class="form-control" rows="2"></textarea>
                    </div>
                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">Save Dealer</button>
                    <a href="{{ route('dealers.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@stop
