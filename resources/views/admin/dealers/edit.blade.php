@extends('adminlte::page')

@section('title', 'Edit Dealer')

@section('content_header')
    <h1>Edit Dealer</h1>
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

            <form action="{{ route('dealers.update', $dealer->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="dealername">Dealer Name</label>
                        <input type="text" name="dealername" class="form-control" value="{{ old('dealername', $dealer->dealername) }}" required>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="storecode">Store Code</label>
                        <input type="text" name="storecode" class="form-control" value="{{ old('storecode', $dealer->storecode) }}">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="address1">Address 1</label>
                        <input type="text" name="address1" class="form-control" value="{{ old('address1', $dealer->address1) }}">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="address2">Address 2</label>
                        <input type="text" name="address2" class="form-control" value="{{ old('address2', $dealer->address2) }}">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="address3">Address 3</label>
                        <input type="text" name="address3" class="form-control" value="{{ old('address3', $dealer->address3) }}">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="suburbs">Suburbs</label>
                        <input type="text" name="suburbs" class="form-control" value="{{ old('suburbs', $dealer->suburbs) }}">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="city">City</label>
                        <input type="text" name="city" class="form-control" value="{{ old('city', $dealer->city) }}">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="state">State</label>
                        <input type="text" name="state" class="form-control" value="{{ old('state', $dealer->state) }}">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="pincode">Pincode</label>
                        <input type="text" name="pincode" class="form-control" value="{{ old('pincode', $dealer->pincode) }}">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="phone">Phone</label>
                        <input type="text" name="phone" class="form-control" value="{{ old('phone', $dealer->phone) }}">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="fax">Fax</label>
                        <input type="text" name="fax" class="form-control" value="{{ old('fax', $dealer->fax) }}">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="contactnumber">Contact Number</label>
                        <input type="text" name="contactnumber" class="form-control" value="{{ old('contactnumber', $dealer->contactnumber) }}">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="contactperson">Contact Person</label>
                        <input type="text" name="contactperson" class="form-control" value="{{ old('contactperson', $dealer->contactperson) }}">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="dealertype">Dealer Type</label>
                        <input type="text" name="dealertype" class="form-control" value="{{ old('dealertype', $dealer->dealertype) }}">
                    </div>

                    <div class="form-group col-md-12">
                        <label for="google_link">Google Map Link</label>
                        <textarea name="google_link" class="form-control" rows="2">{{ old('google_link', $dealer->google_link) }}</textarea>
                    </div>

                    <div class="form-group col-md-12">
                        <label for="360degree">360° View Link</label>
                        <textarea name="360degree" class="form-control" rows="2">{{ old('360degree', $dealer->{"360degree"}) }}</textarea>
                    </div>
                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">Update Dealer</button>
                    <a href="{{ route('dealers.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@stop
