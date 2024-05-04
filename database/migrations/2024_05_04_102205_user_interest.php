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
        Schema::create("userInterests", function (Blueprint $table) {
            $table->id('userInterestId');
            $table->unsignedBigInteger("userId");
            $table->unsignedBigInteger("interestId");
            $table->timestamps();

            $table->foreign("userId")->references("id")->on('users');
            $table->foreign("interestId")->references("interestId")->on('interests');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('userInterests');
    }
};
