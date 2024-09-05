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
        Schema::create('payment', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('order_id');
            $table->decimal('amount', 10, 2);
            $table->string('payment_method');
            $table->string('payment_status');
            $table->timestamps();
        
            // Foreign key constraints
            $table->foreign('order_id')->references('id')->on('orders');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment');
    }
};
