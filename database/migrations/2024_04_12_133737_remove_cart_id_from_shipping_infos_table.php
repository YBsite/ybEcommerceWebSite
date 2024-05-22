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
    {Schema::table('shipping_infos', function (Blueprint $table) {
        // Drop foreign key constraint before dropping the column
        $table->dropForeign(['cart_id']);
        $table->dropColumn('cart_id');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
{
    Schema::table('shipping_infos', function (Blueprint $table) {
        // Re-add the column and foreign key constraint if migration is rolled back
        $table->unsignedBigInteger('cart_id')->nullable()->after('user_id');
        $table->foreign('cart_id')->references('id')->on('carts')->onDelete('cascade')->nullable();
    });
}
};
