@extends('adminlte::page')

@section('title', 'Create Blog Post')

@section('content_header')
    <h1>Create Blog Post</h1>
@stop

@section('content')
    <form action="" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">

        <div class="form-group col-md-6">
                <label for="blog_image">Latest Post page description</label>
                <input type="text" name="latest_post_desp" class="form-control">
            </div>


            {{-- Blog Image --}}
            <div class="form-group col-md-6">
                <label for="blog_image">Blog Image</label>
                <input type="file" name="blog_image" class="form-control">
            </div>

            {{-- Blog Title --}}
            <div class="form-group col-md-12">
                <label for="blog_title">Blog Title</label>
                <input type="text" name="blog_title" class="form-control" placeholder="Enter Blog Title" value="{{ old('blog_title') }}">
            </div>

            {{-- Blog Description (with CKEditor) --}}
            <div class="form-group col-md-12">
                <label for="blog_description">Blog Description</label>
                <textarea name="blog_description" id="blog_description" class="form-control" rows="6">{{ old('blog_description') }}</textarea>
            </div>
        </div>

        <div class="form-group mt-4">
            <button type="submit" class="btn btn-primary">Save Blog Post</button>
        </div>
    </form>
@stop

@section('js')
<script src="https://cdn.ckeditor.com/4.20.2/standard/ckeditor.js"></script>

<script>
    // Initialize CKEditor for blog description with image upload support
    CKEDITOR.replace('blog_description')

</script>
@stop
