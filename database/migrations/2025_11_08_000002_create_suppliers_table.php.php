<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id('supplier_id');
            $table->string('company_name', 150);
            $table->string('contact_person', 100)->nullable();
            $table->string('email', 150)->unique();
            $table->string('phone', 20)->nullable();
            $table->string('password_hash', 255);
            $table->string('location', 100)->nullable();
            $table->enum('status', ['pending','verified','rejected'])->default('pending');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('suppliers');
    }
};
