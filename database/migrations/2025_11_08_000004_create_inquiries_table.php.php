<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('inquiries', function (Blueprint $table) {
            $table->id('inquiry_id');

            // ✅ Explicit foreign key reference to parts.part_id
            $table->unsignedBigInteger('part_id');
            $table->foreign('part_id')->references('part_id')->on('parts')->onDelete('cascade');

            // ✅ Match the actual primary key column in users table
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('set null');

            $table->string('whatsapp_no', 20)->nullable();
            $table->string('email', 150)->nullable();
            $table->string('name', 100)->nullable();
            $table->string('location', 100)->nullable();
            $table->text('message')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('inquiries');
    }
};
