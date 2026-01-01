<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('supplier_parts', function (Blueprint $table) {
            $table->id('supplier_part_id');

            // ✅ Explicitly define FK to suppliers.supplier_id
            $table->unsignedBigInteger('supplier_id');
            $table->foreign('supplier_id')->references('supplier_id')->on('suppliers')->onDelete('cascade');

            // ✅ Explicitly define FK to parts.part_id (since your parts table uses part_id)
            $table->unsignedBigInteger('part_id');
            $table->foreign('part_id')->references('part_id')->on('parts')->onDelete('cascade');

            $table->decimal('price', 10, 2)->nullable();
            $table->enum('condition', ['new','used','refurbished'])->default('new');
            $table->enum('verification_status', ['pending','approved','rejected'])->default('pending');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('supplier_parts');
    }
};
