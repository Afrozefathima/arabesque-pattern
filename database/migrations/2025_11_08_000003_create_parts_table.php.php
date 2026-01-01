<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('parts', function (Blueprint $table) {
            $table->id('part_id');
            $table->string('make', 100);
            $table->string('model', 100);
            $table->string('year_range', 20)->nullable();
            $table->string('part_name', 150);
            $table->string('part_number', 100)->nullable();
            $table->string('category', 100)->nullable();
            $table->string('subcategory', 100)->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('parts');
    }
};
