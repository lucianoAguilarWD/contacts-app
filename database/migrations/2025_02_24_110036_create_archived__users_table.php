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
        Schema::create('archived__users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false);;
            $table->string('email');
            $table->unsignedTinyInteger('role')->default(1)->nullable(false);
            $table->string('image')->nullable();
            $table->string('url')->nullable();
            $table->string('phone')->nullable();
            $table->string('categories')->nullable();
            $table->string('subcategories')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('archived__users');
    }
};
