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
        Schema::create('id_counter', function (Blueprint $table) {
            $table->string('TableName', 10)->primary();
            $table->integer('LastID');
        });

        // Insert initial data
        DB::table('id_counter')->insert([
            ['TableName' => 'user', 'LastID' => 0],
            ['TableName' => 'admin', 'LastID' => 0],
            ['TableName' => 'customer', 'LastID' => 0],
            ['TableName' => 'seller', 'LastID' => 0],
            ['TableName' => 'product', 'LastID' => 0],
            ['TableName' => 'sale', 'LastID' => 0],
            ['TableName' => 'image', 'LastID' => 0],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('id_counter');
    }
};
