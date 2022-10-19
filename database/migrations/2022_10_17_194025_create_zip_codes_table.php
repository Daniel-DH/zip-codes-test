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
        Schema::create('zip_codes', function (Blueprint $table) {
            $table->id('zip_code');
            $table->string('locality');

            $table->unsignedBigInteger('federal_entity_key');

            $table->unsignedBigInteger('municipality_key');
            $table->timestamps();

        });

        Schema::table('zip_codes', function($table)
        {
            $table->foreign('federal_entity_key')->references('key')->on('federal_entity');

            $table->foreign('municipality_key')->references('key')->on('municipality');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('zip_codes');
    }
};
