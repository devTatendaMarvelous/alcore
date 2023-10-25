<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up(): void
    {
        Schema::create('gadgets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->string('name');
            $table->string('photo')->nullable();
            $table->string('serial_number')->unique();
            $table->text('description');
            $table->string('price')->nullable();
            $table->boolean('is_forsale')->default(1);
            $table->enum('status', ['pending', 'in_progress', 'testing', 'waiting_approval', 'completed', 'collected'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gadgets');
    }
};
