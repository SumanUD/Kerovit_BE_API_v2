@extends('adminlte::page')

@section('title', 'Catalogue Page CMS')

@section('content_header')
    <h1>Catalogue Page CMS</h1>
@stop

@section('content')
    <form action="" method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($catalogue))
            @method('PUT')
        @endif

        <div class="row">
            {{-- Banner Image --}}
            <div class="form-group col-md-6">
                <label for="banner_image">Banner Image</label>
                <input type="file" name="banner_image" class="form-control">
                @if(isset($catalogue) && $catalogue->banner_image)
                    <img src="{{ asset('storage/' . $catalogue->banner_image) }}" alt="Banner Image" class="img-fluid mt-2" style="max-height: 200px;">
                @endif
            </div>

            {{-- Description --}}
            <div class="form-group col-md-12 mt-3">
                <label for="description">Description</label>
                <textarea name="description" class="form-control" rows="4">{{ old('description', $catalogue->description ?? '') }}</textarea>
            </div>

            {{-- Catalogue Image 1 --}}
            <div class="form-group col-md-6 mt-3">
                <label for="catalogue_image_1">Catalogue Image 1</label>
                <input type="file" name="catalogue_image_1" class="form-control">
                @if(isset($catalogue) && $catalogue->catalogue_image_1)
                    <img src="{{ asset('storage/' . $catalogue->catalogue_image_1) }}" alt="Catalogue Image 1" class="img-fluid mt-2" style="max-height: 200px;">
                @endif
            </div>

            {{-- Catalogue Image 2 --}}
            <div class="form-group col-md-6 mt-3">
                <label for="catalogue_image_2">Catalogue Image 2</label>
                <input type="file" name="catalogue_image_2" class="form-control">
                @if(isset($catalogue) && $catalogue->catalogue_image_2)
                    <img src="{{ asset('storage/' . $catalogue->catalogue_image_2) }}" alt="Catalogue Image 2" class="img-fluid mt-2" style="max-height: 200px;">
                @endif
            </div>

            {{-- Catalogue PDF 1 --}}
            <div class="form-group col-md-6 mt-3">
                <label for="catalogue_pdf_1">Catalogue PDF 1</label>
                <input type="file" name="catalogue_pdf_1" class="form-control">
                @if(isset($catalogue) && $catalogue->catalogue_pdf_1)
                    <a href="{{ asset('storage/' . $catalogue->catalogue_pdf_1) }}" target="_blank" class="d-block mt-2">View PDF 1</a>
                @endif
            </div>

            {{-- Catalogue PDF 2 --}}
            <div class="form-group col-md-6 mt-3">
                <label for="catalogue_pdf_2">Catalogue PDF 2</label>
                <input type="file" name="catalogue_pdf_2" class="form-control">
                @if(isset($catalogue) && $catalogue->catalogue_pdf_2)
                    <a href="{{ asset('storage/' . $catalogue->catalogue_pdf_2) }}" target="_blank" class="d-block mt-2">View PDF 2</a>
                @endif
            </div>
        </div>

        <div class="form-group mt-4">
            <button type="submit" class="btn btn-primary">{{ isset($catalogue) ? 'Update' : 'Save' }}</button>
        </div>
    </form>
@stop
