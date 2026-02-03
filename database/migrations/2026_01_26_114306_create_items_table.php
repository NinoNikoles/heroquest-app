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
        Schema::create('items', function (Blueprint $table) {
           $table->id();
            $table->json('name');
            $table->json('description')->nullable();
            $table->string('type');
            $table->string('sub_type')->nullable();
            $table->integer('gold_value')->default(0);
            $table->integer('attack_bonus')->default(0);
            $table->integer('defence_bonus')->default(0);
            $table->integer('move_bonus')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
