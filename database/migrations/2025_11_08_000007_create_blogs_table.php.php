<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id('blog_id');
            $table->string('title', 200);
            $table->string('slug', 200)->unique();
            $table->longText('content');
            $table
                ->foreignId('author_id')
                ->nullable()
                ->constrained('suppliers', 'supplier_id')
                ->onDelete('set null');
            $table->enum('status', ['draft','published'])->default('draft');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
