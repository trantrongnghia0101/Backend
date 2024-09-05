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
            $table->id(); // Primary key
            $table->string('name');
            $table->decimal('price', 10, 2);
            $table->decimal('weight', 10, 2);
            $table->integer('quantity');
            $table->date('expiry');
            $table->string('preserve');
            $table->text('description');
            $table->string('image')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('brand_id');
            $table->string('manufacture');
            $table->string('subtitle')->nullable();
            $table->decimal('sale', 10, 2)->nullable();
            $table->timestamps();
        
            // Foreign key constraints
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('brand_id')->references('id')->on('brands');
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
