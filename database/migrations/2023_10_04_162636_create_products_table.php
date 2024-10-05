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
            $table->integer('category_id');
            $table->integer('sub_id')->nullable();
            $table->integer('status')->default(0);
            $table->integer('site_id')->nullable();
            $table->string('product_name');
            $table->string('product_qty');
            $table->string('product_price');
            $table->string('product_img');
            $table->string('product_img2')->nullable();
            $table->text('product_message');
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
