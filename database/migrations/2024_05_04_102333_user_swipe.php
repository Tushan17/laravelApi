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
        Schema::create('userSwipes', function (Blueprint $table) {
            $table->id('userSwipeId');
            $table->unsignedBigInteger('userswipes')->unique();
            $table->unsignedBigInteger('onuser')->unique();
            $table->boolean('swipestatus');
            $table->timestamps();

            $table->foreign("userswipes")->references("id")->on('users');
            $table->foreign("onuser")->references("id")->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('userSwipes');

    }
};
