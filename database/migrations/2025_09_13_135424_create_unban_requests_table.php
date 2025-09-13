<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('unban_requests', function (Blueprint $table) {
            $table->id();
            $table->string('email');          
            $table->text('message');          
            $table->enum('status', ['pending', 'dismissed', 'resolved'])->default('pending');
            $table->timestamps();             
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('unban_requests');
    }
};
