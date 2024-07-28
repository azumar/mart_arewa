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
        Schema::create('sellers', function (Blueprint $table) {
            $table->id();
            $table->string('seller_code')->nullable();
            $table->string('seller_name');
            $table->string('seller_address');
            $table->string('seller_contact');
            $table->string('seller_email');
            $table->string('seller_password');
            $table->string('seller_password_confirm');
            $table->string('seller_approved')->nullable();
            $table->string('seller_slug')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sellers');
    }
};
