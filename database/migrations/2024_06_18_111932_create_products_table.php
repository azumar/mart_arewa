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
            $table->integer('sub_category_id');
            $table->string('product_code');
            $table->string('product_name');
            $table->string('shop_id');
            $table->string('short_description')->nullable();
            $table->string('long_description')->nullable();
            $table->string('product_slug')->nullable();
            $table->integer('product_qty');
            $table->double('product_price');
            $table->string('product_status');
            $table->string('product_image')->nullable();

            $table->timestamps();
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
