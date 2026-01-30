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
        Schema::create('hero_characters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('lobby_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('class');
            $table->integer('base_body_points')->default(0);
            $table->integer('body_mod')->default(0);
            $table->integer('body_points')->default(0);
            $table->integer('base_mind_points')->default(0);
            $table->integer('mind_mod')->default(0);
            $table->integer('mind_points')->default(0);
            $table->integer('attack_dice')->default(1);
            $table->integer('defence_dice')->default(1);
            $table->integer('movement_dice')->default(1);
            $table->integer('gold')->default(0);
            $table->integer('weapons')->nullable();
            $table->integer('armor')->nullable();
            $table->integer('artifacts')->nullable();
            $table->integer('potions')->nullable();
            $table->integer('inventory')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    
    public function down(): void
    {
        Schema::dropIfExists('hero_characters');
    }
};
