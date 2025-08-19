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
            $table->string('SalesID', 10)->primary();
            $table->string('ProductID', 10);
            $table->string('CustomerID', 10);
            $table->dateTime('SalesDateTime')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->decimal('Amount', 3, 0);
            $table->string('PhoneNumber', 15);
            $table->text('Address');
            $table->string('ShippingMethod', 50);
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
