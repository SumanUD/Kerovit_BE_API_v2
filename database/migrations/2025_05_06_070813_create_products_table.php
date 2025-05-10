<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('product_id');
            $table->string('product_code')->nullable();
            $table->string('thumbnail_picture', 150)->default('no-image.jpg');
            $table->string('product_title')->nullable();
            $table->string('Series')->nullable(); // Also referred to as Range
            $table->string('shape')->nullable();
            $table->string('spray')->nullable();
            $table->string('category_name')->nullable();
            $table->text('product_description')->nullable();
            $table->string('ranges')->nullable();
            $table->string('size')->nullable();
            $table->double('price')->nullable();
            $table->string('product_image')->nullable();
            $table->string('diagram_image_name')->nullable();
            $table->string('additional_image1')->nullable();
            $table->string('additional_image2')->nullable();
            $table->string('additional_image3')->nullable();
            $table->string('additional_image4')->nullable();
            $table->string('additional_image5')->nullable();
            $table->string('installation_service_parts')->nullable();
            $table->string('feature_image', 150)->default('no-feature-image.jpg');
            $table->string('additional_information')->nullable();
            $table->primary('product_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
