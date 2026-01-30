<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::table('hero_characters', function (Blueprint $table) {
            // Wir speichern die unveränderlichen Startwerte
            $table->integer('base_body_points')->default(0);
            $table->integer('base_mind_points')->default(0);
            // Der Modifikator durch Items oder Tränke (das +/- X)
            $table->integer('body_mod')->default(0);
            $table->integer('mind_mod')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('hero_characters', function (Blueprint $table) {
            //
        });
    }
};
