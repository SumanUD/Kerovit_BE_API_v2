<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Collection;
use App\Models\Category;
use App\Models\Range;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
class ProductController extends Controller
{
    // Display the product creation form
    public function create()
    {
        $collections = Collection::all(); // Get all collections
        return view('admin.products.create', compact('collections'));
    }

    
    public function aboutcreate()
    {
        $collections = Collection::all(); // Get all collections
        return view('admin.products.aboutcreate', compact('collections'));
    }

    public function careercreate()
    {
        $collections = Collection::all(); // Get all collections
        return view('admin.products.careercreate', compact('collections'));
    }

    public function catacreate()
    {
        $collections = Collection::all(); // Get all collections
        return view('admin.products.catacreate', compact('collections'));
    }

    public function blogcreate()
    {
        $collections = Collection::all(); // Get all collections
        return view('admin.products.blogcreate', compact('collections'));
    }





    // Store the new product
    public function store(Request $request)
    {
        $request->validate([
            'collection_id' => 'required|exists:collections,id',
            'category_id' => 'required|exists:categories,id',
            'range_id' => 'required|exists:ranges,id',
            'product_code' => 'required|unique:products',
            'product_title' => 'required',
            'price' => 'nullable|numeric',
        ]);
    
        $productData = $request->only([
            'collection_id',
            'category_id',
            'range_id',
            'product_code',
            'product_title',
            'shape',
            'spray',
            'category_name',
            'product_description',
            'ranges',
            'size',
            'price',
        ]);
    
        if ($request->hasFile('thumbnail_picture')) {
            $productData['thumbnail_picture'] = $request->file('thumbnail_picture')->store('images/products');
        }
    
        if ($request->hasFile('product_image')) {
            $productData['product_image'] = $request->file('product_image')->store('images/products');
        }
    
        Product::create($productData);
    
        return redirect()->route('products.index')->with('success', 'Product created successfully!');
    }
    


    // Update the product
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $collections = Collection::all();
        $categories = Category::all();
        $ranges = Range::all();
    
        return view('admin.products.edit', compact('product', 'collections', 'categories', 'ranges'));
    }
    
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully!');
    }

    public function getCategories(Collection $collection)
    {
        $categories = Category::with('collection')->orderBy('order')->get();    
        return response()->json([
            'categories' => $categories->map(fn($category) => [
                'id' => $category->id,
                'name' => $category->name,
                'order' => $category->order,
            ])
        ]);
    }

    public function getRanges($categoryId)
    {
        $category = Category::find($categoryId);
    
        if (!$category) {
            return response()->json(['message' => 'Category not found'], 404);
        }
    
        $ranges = $category->ranges()->orderBy('order')->get();
    
        return response()->json([
            'ranges' => $ranges->map(fn($range) => [
                'id' => $range->id,
                'name' => $range->name,
                'order' => $range->order,
            ])
        ]);
    }


    public function getData(Request $request)
{
    return datatables(Product::query())->make(true);
}


public function showData()
{
    return view('admin.products.index');
}

public function getAllProductsJson()
{
    $products = Product::all();

    // dd($products);

    return response()->json([
        'status' => 'success',
        'products' => $products->map(function ($product) {
            return [
                'id' => $product->id,
                'collection' => $product->collection ?? null,
                'category' => $product->category ?? null,
                'range' => $product->range->name ?? null,
                'product_code' => $product->product_code,
                'product_title' => $product->product_title,
                'shape' => $product->shape, 
                'spray' => $product->spray,
                'category_name' => $product->category_name,
                'product_description' => $product->product_description,
                'ranges' => $product->ranges,
                'size' => $product->size,
                'price' => $product->price,
                'thumbnail_picture_url' => $product->thumbnail_picture ? asset('storage/AllImages/' . $product->thumbnail_picture.'.png') : null,
                'product_image_url' => $product->product_image ? asset('storage/AllImages/' . $product->product_image.'.png') : null,
                // 'created_at' => $product->created_at->toDateTimeString(),
                // 'updated_at' => $product->updated_at->toDateTimeString(),
            ];
        }),
    ]);
}


    
}
