<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('stock', function (Blueprint $table) {
            $table->id('stock_id');
            $table
                ->foreignId('supplier_part_id')
                ->constrained('supplier_parts', 'supplier_part_id')
                ->onDelete('cascade');
            $table->integer('stock_quantity')->default(0);
            $table->integer('on_order')->default(0);
            $table->integer('sold')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('stock');
    }
};
