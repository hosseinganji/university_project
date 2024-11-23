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
        Schema::create('ins_codes', function (Blueprint $table) {
            $table->id();

            $table->string("insCode");
            $table->string("LVal18AFC");
            $table->string("LSoc30");
            $table->string("LVal30");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ins_codes');
    }
};
