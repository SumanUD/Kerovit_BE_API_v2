@extends('adminlte::page')

@section('title', 'Ranges Management')

@section('content_header')
    <h1>Ranges Management</h1>
@stop

@section('content')
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ isset($editRange) ? 'Edit' : 'Add' }} Range</h3>
            </div>

            {{-- Validation Errors --}}
            @if ($errors->any())
                <div class="alert alert-danger mx-3 mt-3">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- CREATE FORM --}}
            @if(!isset($editRange))
            <form action="{{ route('admin.ranges.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    {{-- Collection --}}
                    <div class="form-group">
                        <label>Collection *</label>
                        <select name="collection_id" id="collection_id" class="form-control @error('category_id') is-invalid @enderror" required>
                            <option value="">Select Collection</option>
                            @foreach($collections as $collection)
                                <option value="{{ $collection->id }}" {{ old('collection_id') == $collection->id ? 'selected' : '' }}>
                                    {{ $collection->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Category --}}
                    <div class="form-group">
                        <label>Category *</label>
                        <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror" required>
                            <option value="">Select Category</option>
                            @foreach($categoriesForCollection as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Name --}}
                    <div class="form-group">
                        <label>Name *</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                        @error('name')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Description *</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                    </div>

                    {{-- Thumbnail Image --}}
                    <div class="form-group">
                        <label>Thumbnail Image</label>
                        <input type="file" name="thumbnail_image" class="form-control-file @error('thumbnail_image') is-invalid @enderror">
                        @error('thumbnail_image')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Order --}}
                    <div class="form-group">
                        <label>Order</label>
                        <input type="number" name="order" class="form-control @error('order') is-invalid @enderror" value="{{ old('order', 0) }}">
                        @error('order')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Status --}}
                    <div class="form-group">
                        <input type="hidden" name="is_active" value="0">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="is_active_create" name="is_active" value="1" {{ old('is_active') ? 'checked' : '' }}>
                            <label class="custom-control-label" for="is_active_create">Active</label>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-success">Create</button>
                </div>
            </form>
            @endif

            {{-- UPDATE FORM --}}
            @if(isset($editRange))
            <form action="{{ route('admin.ranges.update', $editRange->id) }}" method="POST" enctype="multipart/form-data">
                @csrf @method('PUT')
                <div class="card-body">
                    {{-- Collection --}}
                    <div class="form-group">
                        <label>Collection *</label>
                        <select name="collection_id" id="collection_id_edit" class="form-control @error('category_id') is-invalid @enderror" required>
                            <option value="">Select Collection</option>
                            @foreach($collections as $collection)
                                <option value="{{ $collection->id }}" {{ old('collection_id', $editRange->category->collection_id) == $collection->id ? 'selected' : '' }}>
                                    {{ $collection->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Category --}}
                    <div class="form-group">
                        <label>Category *</label>
                        <select name="category_id" id="category_id_edit" class="form-control @error('category_id') is-invalid @enderror" required>
                            <option value="">Select Category</option>
                            @foreach($categoriesForCollection as $category)
                                <option value="{{ $category->id }}" {{ old('category_id', $editRange->category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Name --}}
                    <div class="form-group">
                        <label>Name *</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $editRange->name) }}" required>
                        @error('name')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Thumbnail Image --}}
                    <div class="form-group">
                        <label>Thumbnail Image</label>
                        <input type="file" name="thumbnail_image" class="form-control-file @error('thumbnail_image') is-invalid @enderror">
                        @if($editRange->thumbnail_image)
                            <img src="{{ asset('storage/' . $editRange->thumbnail_image) }}" width="100" class="mt-2">
                        @endif
                        @error('thumbnail_image')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Order --}}
                    <div class="form-group">
                        <label>Order</label>
                        <input type="number" name="order" class="form-control @error('order') is-invalid @enderror" value="{{ old('order', $editRange->order) }}">
                        @error('order')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Status --}}
                    <div class="form-group">
                        <input type="hidden" name="is_active" value="0">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="is_active_edit" name="is_active" value="1" {{ old('is_active', $editRange->is_active) ? 'checked' : '' }}>
                            <label class="custom-control-label" for="is_active_edit">Active</label>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('admin.ranges.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
            @endif
        </div>
    </div>

    <div class="col-md-6">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Ranges List</h3>
        </div>
        <div class="card-body p-0">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Collection</th>
                        <th>Category</th>
                        <th>Range Name</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($ranges as $range)
                    <tr>
                        <td>{{ $range->category->collection->name ?? '-' }}</td>
                        <td>{{ $range->category->name ?? '-' }}</td>
                        <td>{{ $range->name }}</td>
                        <td>
                            <span class="badge badge-{{ $range->is_active ? 'success' : 'danger' }}">
                                {{ $range->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('admin.ranges.index', ['edit' => $range->id]) }}" class="btn btn-sm btn-info">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.ranges.destroy', $range->id) }}" method="POST" style="display:inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                        <tr><td colspan="5" class="text-center">No ranges found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>

@endsection

@push('js')
<script>
    $(document).ready(function() {
        $('#collection_id, #collection_id_edit').on('change', function() {
            var collectionId = $(this).val();

            // Reset the category dropdown
            $('#category_id, #category_id_edit').empty().append('<option value="">Select Category</option>');

            if (collectionId) {
                // Make AJAX request to fetch categories based on selected collection
                $.ajax({
                    url: '{{ route('admin.ranges.getCategoriesByCollection') }}',
                    method: 'GET',
                    data: { collection_id: collectionId },
                    success: function(response) {
                        if (response.length > 0) {
                            response.forEach(function(category) {
                                $('#category_id, #category_id_edit').append(
                                    $('<option>', {
                                        value: category.id,
                                        text: category.name
                                    })
                                );
                            });
                        }
                    }
                });
            }
        });
    });
</script>
@endpush
