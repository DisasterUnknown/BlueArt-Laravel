<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->string('salesID', 10)->primary();
            $table->string('productID', 10);
            $table->string('customerID', 10);
            $table->dateTime('salesDateTime')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->decimal('amount', 3, 0);
            $table->string('phoneNumber', 15);
            $table->text('address');
            $table->string('shippingMethod', 50);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
