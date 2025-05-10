<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('dealers', function (Blueprint $table) {
            $table->id();
            $table->string('dealername', 150)->nullable();
            $table->string('address1', 200)->nullable();
            $table->string('address2', 200)->nullable();
            $table->string('address3', 200)->nullable();
            $table->string('suburbs', 150)->nullable();
            $table->string('city', 150)->nullable();
            $table->string('state', 150)->nullable();
            $table->string('pincode', 25)->nullable();
            $table->string('phone', 100)->nullable();
            $table->string('fax', 50)->nullable();
            $table->string('contactnumber', 200)->nullable();
            $table->string('contactperson', 200)->nullable();
            $table->string('dealertype', 100)->nullable();
            $table->text('google_link')->nullable();
            $table->text('360degree')->nullable();
            $table->string('storecode', 255)->nullable();
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dealers');
    }
};
