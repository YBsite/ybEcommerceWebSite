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
        Schema::create('shipping_infos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');

            $table->unsignedBigInteger('cart_id')->nullable(); // Adding cart_id column

            $table->string('phone_number');
            $table->string('city_name');
            $table->string('postal_code');
            $table->timestamps();

            // Adding foreign key constraint for user_id
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            // Adding foreign key constraint for cart_id
            $table->foreign('cart_id')->references('id')->on('carts')->onDelete('cascade')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipping_infos');
    }
};
