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
    { Schema::create('categories', function (Blueprint $table) {
        $table->id();
        $table->string('category_name');
        $table->string('slug')->unique();
        $table->string('img')->nullable(); // Add the img column, allowing it to be nullable
        $table->unsignedInteger('subcategory_count')->default(0);
        $table->unsignedInteger('product_count')->default(0);
        $table->timestamps();


    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
