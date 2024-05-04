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
        Schema::create('userCategory', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('categoryId');

            $table->foreign("categoryId")->references("categoriesId")->on('categories');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('userCategory');

    }
};
