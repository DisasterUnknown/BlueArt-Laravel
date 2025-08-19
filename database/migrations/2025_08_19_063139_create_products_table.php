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
        Schema::create('products', function (Blueprint $table) {
            $table->string('ProductID', 10)->primary();
            $table->string('SellerID', 10);
            $table->string('ProductName', 100);
            $table->decimal('Price',  10, 2);
            $table->decimal('Discount', 5, 2);
            $table->text('Description');
            $table->enum('Category', ['art', 'collectibles'])->default('art');
            $table->enum('Status', ['active', 'banned', 'userkick'])->default('active');
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
