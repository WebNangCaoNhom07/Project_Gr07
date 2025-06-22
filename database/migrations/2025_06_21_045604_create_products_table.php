<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('products', function (Blueprint $table) {
        $table->id();
        $table->string('product_name');
        $table->decimal('selling_price', 10, 2)->nullable();
        $table->decimal('actual_price', 10, 2)->nullable();
        $table->float('average_rating')->nullable();
        $table->string('rating_and_review')->nullable();
        $table->string('ram')->nullable();
        $table->string('ssd')->nullable();
        $table->string('processor')->nullable();
        $table->string('operating_system')->nullable();
        $table->string('exchange_offer')->nullable();
        $table->string('display_size')->nullable();
        $table->timestamps();
    });
}



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
