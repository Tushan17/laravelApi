<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
        Schema::create('userMatches', function (Blueprint $table) {
            $table->id('userMatchId');
            $table->unsignedBigInteger('user1')->unique();
            $table->unsignedBigInteger('user2')->unique();

            $table->timestamps();

            $table->foreign("user1")->references("id")->on('users');
            $table->foreign("user2")->references("id")->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('userMatches');

    }
};
