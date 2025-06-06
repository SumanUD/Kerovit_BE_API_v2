@extends('adminlte::page')

@section('title', 'Collections Management')

@section('content_header')
    <h1>Collections Management</h1>
@stop

@section('content')
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ isset($editCollection) ? 'Edit' : 'Add' }} Collection</h3>
            </div>
{{-- CREATE FORM (visible when $editCollection is not set) --}}
@if(!isset($editCollection))
<form 
    action="{{ route('collections.store') }}" 
    method="POST" 
    enctype="multipart/form-data"
>
    @csrf

    <div class="card-body">
        <h5>Create New Collection</h5>

        <div class="form-group">
            <label>Name *</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
            @error('name') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label>Thumbnail Image</label>
            <input type="file" name="thumbnail_image" class="form-control-file">
        </div>

        <div class="form-group">
            <label>Order</label>
            <input type="number" name="order" class="form-control" value="{{ old('order', 0) }}">
        </div>

        <div class="form-group">
            <input type="hidden" name="is_active" value="0">
            <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="is_active_store" name="is_active" value="1" {{ old('is_active', false) ? 'checked' : '' }}>
                <label class="custom-control-label" for="is_active_store">Active</label>
            </div>
        </div>

    </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-success">Create</button>
    </div>
</form>
@endif


{{-- UPDATE FORM (visible when $editCollection is set) --}}
@if(isset($editCollection))
<form 
    action="{{ route('collections.update', $editCollection->id) }}" 
    method="POST" 
    enctype="multipart/form-data"
>
    @csrf
    @method('PUT')

    <div class="card-body">
        <h5>Edit Collection</h5>

        <div class="form-group">
            <label>Name *</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $editCollection->name) }}" required>
            @error('name') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
                        <label>Description *</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                    </div>

        <div class="form-group">
            <label>Thumbnail Image</label>
            <input type="file" name="thumbnail_image" class="form-control-file">
            @if($editCollection->thumbnail_image)
                <img src="{{ asset('storage/' . $editCollection->thumbnail_image) }}" width="100" class="mt-2">
            @endif
        </div>

        <div class="form-group">
            <label>Order</label>
            <input type="number" name="order" class="form-control" value="{{ old('order', $editCollection->order ?? 0) }}">
        </div>

        <div class="form-group">
            <input type="hidden" name="is_active" value="0">
            <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="is_active_edit" name="is_active" value="1" {{ old('is_active', $editCollection->is_active) ? 'checked' : '' }}>
                <label class="custom-control-label" for="is_active_edit">Active</label>
            </div>
        </div>
    </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('collections.index') }}" class="btn btn-secondary">Cancel</a>
    </div>
</form>
@endif




        </div>
    </div>

    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Collections List</h3>
            </div>
            <div class="card-body p-0">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Order</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($collections as $collection)
                        <tr>
                            <td>{{ $collection->name }}</td>
                            <td>
                                @if($collection->thumbnail_image)
                                    <img src="{{ asset('storage/' . $collection->thumbnail_image) }}" width="50">
                                @endif
                            </td>
                            <td>{{ $collection->order }}</td>
                            <td>
                                <span class="badge badge-{{ $collection->is_active ? 'success' : 'danger' }}">
                                    {{ $collection->is_active ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('collections.index', ['edit' => $collection->id]) }}" class="btn btn-sm btn-info">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('collections.destroy', $collection) }}" method="POST" style="display:inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @if($collections->isEmpty())
                            <tr><td colspan="5" class="text-center">No collections found.</td></tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop
