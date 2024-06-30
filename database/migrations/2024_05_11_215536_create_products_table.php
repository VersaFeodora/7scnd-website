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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->String('product_name');
            $table->integer('product_price');
            $table->String('product_desc')->nullable();
            $table->String('product_size');
            $table->String('product_color');
            $table->String('product_brand')->nullable();
            $table->integer('product_qty');
            $table->String('product_image')->nullable();
            $table->String('product_url')->nullable();
            $table->foreignId('category_category_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
