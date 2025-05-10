@extends('adminlte::page')

@section('title', 'Catalogue Page CMS')

@section('content_header')
    <h1>About Page CMS</h1>
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
                @if(isset($catalogue->banner_image))
                    <img src="{{ asset('storage/' . $catalogue->banner_image) }}" class="img-fluid mt-2" style="max-height: 200px;">
                @endif
            </div>

            {{-- Banner Description --}}
            <div class="form-group col-md-12">
                <label for="banner_description">Banner Description</label>
                <textarea name="banner_description" id="banner_description" class="form-control" rows="4">{{ old('banner_description', $catalogue->banner_description ?? '') }}</textarea>
            </div>

            {{-- Below Banner Content --}}
            <div class="form-group col-md-12">
                <label for="below_banner_content">Below Banner Content</label>
                <textarea name="below_banner_content" id="below_banner_content" class="form-control" rows="4">{{ old('below_banner_content', $catalogue->below_banner_content ?? '') }}</textarea>
            </div>

            {{-- Director Image --}}
            <div class="form-group col-md-6">
                <label for="director_image">Director Image</label>
                <input type="file" name="director_image" class="form-control">
                @if(isset($catalogue->director_image))
                    <img src="{{ asset('storage/' . $catalogue->director_image) }}" class="img-fluid mt-2" style="max-height: 200px;">
                @endif
            </div>

            {{-- Director Description --}}
            <div class="form-group col-md-12">
                <label for="director_description">Director Description</label>
                <textarea name="director_description" id="director_description" class="form-control" rows="4">{{ old('director_description', $catalogue->director_description ?? '') }}</textarea>
            </div>

            {{-- Manufacturing Items --}}
            <div class="col-md-12">
                <label>Manufacturing Items</label>
                <div id="manufacturing-section">
                    @if(old('manufacturing') || isset($catalogue->manufacturing))
                        @foreach(old('manufacturing', $catalogue->manufacturing ?? [ ['name'=>'', 'description'=>''] ]) as $index => $item)
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <input type="file" name="manufacturing[{{ $index }}][image]" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <input type="text" name="manufacturing[{{ $index }}][name]" class="form-control" placeholder="Name" value="{{ $item['name'] ?? '' }}">
                                </div>
                                <div class="col-md-4">
                                    <input type="text" name="manufacturing[{{ $index }}][description]" class="form-control" placeholder="Description" value="{{ $item['description'] ?? '' }}">
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                <button type="button" id="add-manufacturing" class="btn btn-sm btn-success">+ Add Manufacturing Item</button>
            </div>

            {{-- Certification Images --}}
            <div class="form-group col-md-12 mt-4">
                <label for="certification_images[]">Certification Images</label>
                <input type="file" name="certification_images[]" class="form-control" multiple>
                @if(isset($catalogue->certification_images))
                    <div class="row mt-2">
                        @foreach($catalogue->certification_images as $img)
                            <div class="col-md-2">
                                <img src="{{ asset('storage/' . $img) }}" class="img-fluid" style="max-height: 100px;">
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>

        <div class="form-group mt-4">
            <button type="submit" class="btn btn-primary">{{ isset($catalogue) ? 'Update' : 'Save' }}</button>
        </div>
    </form>
@stop

@section('js')
<script src="https://cdn.ckeditor.com/4.20.2/standard/ckeditor.js"></script>

<script>
    document.getElementById('add-manufacturing').addEventListener('click', function () {
        let index = document.querySelectorAll('#manufacturing-section .row').length;
        const html = `
            <div class="row mb-3">
                <div class="col-md-4">
                    <input type="file" name="manufacturing[${index}][image]" class="form-control">
                </div>
                <div class="col-md-4">
                    <input type="text" name="manufacturing[${index}][name]" class="form-control" placeholder="Name">
                </div>
                <div class="col-md-4">
                    <input type="text" name="manufacturing[${index}][description]" class="form-control" placeholder="Description">
                </div>
            </div>`;
        document.getElementById('manufacturing-section').insertAdjacentHTML('beforeend', html);
    });

    // Initialize CKEditor for the textareas
    CKEDITOR.replace('banner_description');
    CKEDITOR.replace('below_banner_content');
    CKEDITOR.replace('director_description');
</script>
@stop
