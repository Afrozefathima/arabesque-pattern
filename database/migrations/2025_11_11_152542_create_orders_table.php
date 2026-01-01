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
        Schema::create('orders', function (Blueprint $table) {
    $table->id('order_id');
    $table->unsignedBigInteger('user_id')->nullable();
    $table->unsignedBigInteger('supplier_id')->nullable();
    $table->decimal('total_amount', 10, 2)->default(0);
    $table->string('status')->default('pending');
    $table->string('order_status')->default('pending');
    $table->timestamps();
    $table->string('payment_method')->nullable();

    $table->foreign('user_id')->references('user_id')->on('users')->onDelete('set null');
    $table->foreign('supplier_id')->references('supplier_id')->on('suppliers')->onDelete('set null');
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
