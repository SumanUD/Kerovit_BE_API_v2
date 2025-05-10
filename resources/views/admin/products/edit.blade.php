@extends('adminlte::page')

@section('title', 'Edit Dealer')

@section('content_header')
    <h1>Edit Product</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
        <form action="{{ route('products.update') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="card">
            <div class="card-header"><h3 class="card-title">Product Details</h3></div>
            <div class="card-body row">

                <!-- Collection -->
                <div class="form-group col-md-4">
                    <label for="collection_id">Collection</label>
                    <select id="collection_id" name="collection_id" class="form-control" required>
                        <option value="">Select Collection</option>
                        @foreach($collections as $collection)
                            <option value="{{ $collection->id }}">{{ $collection->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Category -->
                <div class="form-group col-md-4">
                    <label for="category_id">Category</label>
                    <select id="category_id" name="category_id" class="form-control" disabled required>
                        <option value="">Select Category</option>
                    </select>
                </div>

                <!-- Range -->
                <div class="form-group col-md-4">
                    <label for="range_id">Range</label>
                    <select id="range_id" name="range_id" class="form-control" disabled required>
                        <option value="">Select Range</option>
                    </select>
                </div>

                <!-- Product Code -->
                <div class="form-group col-md-4">
                    <label for="product_code">Product Code</label>
                    <input type="text" name="product_code" class="form-control" required>
                </div>

                <!-- Images -->
                <div class="form-group col-md-6">
                    <label for="thumbnail_picture">Thumbnail Picture</label>
                    <input type="file" name="thumbnail_picture" class="form-control">
                </div>

                <!-- Product Title -->
                <div class="form-group col-md-4">
                    <label for="product_title">Product Title</label>
                    <input type="text" name="product_title" class="form-control" required>
                </div>

                                <!-- Series -->
                                <div class="form-group col-md-4">
                    <label for="series">Series</label>
                    <input type="text" name="series" class="form-control">
                </div>

                
                <!-- Shape -->
                <div class="form-group col-md-4">
                    <label for="shape">Shape</label>
                    <input type="text" name="shape" class="form-control">
                </div>

                                <!-- Spray -->
                                <div class="form-group col-md-4">
                    <label for="spray">Spray</label>
                    <input type="text" name="spray" class="form-control">
                </div>

                
                <!-- Description -->
                <div class="form-group col-md-12">
                    <label for="product_description">Product Description</label>
                    <textarea name="product_description" class="form-control" rows="3"></textarea>
                </div>

                                <!-- Size -->
                                <div class="form-group col-md-4">
                    <label for="size">Size</label>
                    <input type="text" name="size" class="form-control">
                </div>

                <!-- Price -->
                <div class="form-group col-md-4">
                    <label for="price">Price</label>
                    <input type="text" name="price" class="form-control">
                </div>

                <div class="form-group col-md-6">
                    <label for="product_image">Main Product Image</label>
                    <input type="file" name="product_image" class="form-control">
                </div>

                
                <div class="form-group col-md-6">
                    <label for="diagram_image_name">Diagram Image</label>
                    <input type="file" name="diagram_image_name" class="form-control">
                </div>

                @for ($i = 1; $i <= 5; $i++)
                <div class="form-group col-md-4">
                    <label for="additional_image{{ $i }}">Additional Image {{ $i }}</label>
                    <input type="file" name="additional_image{{ $i }}" class="form-control">
                </div>
                @endfor

                                <!-- Installation and Service Parts -->
                                <div class="form-group col-md-4">
                    <label for="type">Installation and Service Parts</label>
                    <input type="text" name="installation_and_service_parts" class="form-control">
                </div>

                
                <!-- Product Features ***HAVE TO ADD*** -->
                <div class="form-group col-md-4">
                    <label for="product_url">Features Images</label>
                    <input type="file" name="feature_image" class="form-control">
                </div>

                                <!-- Order fields -->
                                <div class="form-group col-md-2">
                    <label for="series_order">Additional Information</label>
                    <input type="text" name="series_order" class="form-control">
                </div>

                <!-- Product URL -->
                <!-- <div class="form-group col-md-4">
                    <label for="product_url">Product URL</label>
                    <input type="text" name="product_url" class="form-control">
                </div> -->



                <!-- Type2 -->
                <!-- <div class="form-group col-md-4">
                    <label for="type2">Type 2</label>
                    <input type="text" name="type2" class="form-control">
                </div> -->

                <!-- <div class="form-group col-md-2">
                    <label for="product_order">Product Order</label>
                    <input type="number" name="product_order" class="form-control">
                </div> -->

                <!-- <div class="form-group col-md-6">
                    <label for="banner_img_on_internal_pages_series">Banner Image</label>
                    <input type="file" name="banner_img_on_internal_pages_series" class="form-control">
                </div> -->



                <div class="form-group col-md-12">
                    <button type="submit" class="btn btn-success">Save Product</button>
                </div>

            </div>
        </div>
    </form>
        </div>
    </div>
@stop
