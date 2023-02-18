<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('our_company_settings', function (Blueprint $table) {
            $table->id();
            $table->string('firma');
            $table->string('adres');
            $table->string('kodpocztowy');
            $table->string('miasto');
            $table->bigInteger('nip');
            $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('our_company_settings');
    }
};
