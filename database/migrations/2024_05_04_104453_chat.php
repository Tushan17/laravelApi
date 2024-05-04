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
        Schema::create('chats', function (Blueprint $table) {
            $table->id();
            $table->string('message');
            $table->timestamps();
            $table->unsignedBigInteger('UMId');

            $table->foreign("UMId")->references("userMatchId")->on('userMatches');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('chats');

    }
};
