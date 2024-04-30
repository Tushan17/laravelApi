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
        Schema::create("userroles", function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("roleid");
            $table->unsignedBigInteger("userid");
            $table->timestamps();

            $table->foreign("roleid")->references("roleid")->on("roles");
            $table->foreign("userid")->references("id")->on("users");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('userroles');
    }
};
