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
        Schema::create('haghighi_hoghooghis', function (Blueprint $table) {
            $table->id();
            $table->date("rec_date");
            $table->string("ins_code");
            $table->bigInteger("buy_i_volume");
            $table->bigInteger("buy_n_volume");
            $table->bigInteger("buy_i_value");
            $table->bigInteger("buy_n_value");
            $table->bigInteger("buy_n_count");
            $table->bigInteger("sell_i_volume");
            $table->bigInteger("buy_i_count");
            $table->bigInteger("sell_n_volume");
            $table->bigInteger("sell_i_value");
            $table->bigInteger("sell_n_value");
            $table->bigInteger("sell_n_count");
            $table->bigInteger("sell_i_count");

            // $table->foreign("ins_code")->references("ins_code")->on("funds_data");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('haghighi_hoghooghis');
    }
};
