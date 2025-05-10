<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $primaryKey = 'product_id';

    public $timestamps = false;

    protected $fillable = [
        'product_code',
        'thumbnail_picture',
        'product_title',
        'Series', // Series is Range
        'shape',
        'spray',
        'category_name',
        'product_description',
        'ranges',
        'size',
        'price',
        'product_image',
        'diagram_image_name',
        'additional_image1',
        'additional_image2',
        'additional_image3',
        'additional_image4',
        'additional_image5',
        'installation_service_parts',
        'feature_image',
        'additional_information'
    ];

    protected $casts = [
        'price' => 'float',
    ];

    public function getProductImageUrlAttribute()
    {
        return asset('storage/products/' . $this->product_image);
    }

}
