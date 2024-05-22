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
    { Schema::create('sub_categories', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->unsignedBigInteger('category_id');
        $table->unsignedInteger('product_count')->default(0);
        $table->string('slug')->unique();
        $table->timestamps();

        // Ensure InnoDB engine
        $table->engine = 'InnoDB';

        // Define foreign key constraint
        $table->foreign('category_id')
              ->references('id')
              ->on('categories')
              ->onDelete('cascade');
   

    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_categories');
    }
};
