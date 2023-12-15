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
        Schema::create('games', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('home');
            $table->foreign('home')->references('id')->on('teams');

            $table->unsignedBigInteger('away');
            $table->foreign('away')->references('id')->on('teams');

            $table->dateTime('start');
            $table->string('result');
            $table->foreignId('season_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
