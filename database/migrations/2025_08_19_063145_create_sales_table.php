<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('customerID'); 
            $table->dateTime('salesDateTime')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->decimal('amount', 10, 2);
            $table->string('phoneNumber', 15);
            $table->text('address');
            $table->string('shippingMethod', 50);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
