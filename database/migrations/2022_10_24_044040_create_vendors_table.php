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
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->string('name',255);
            $table->string('website',255)->nullable();
            $table->string('mobile', 64);
            $table->string('email',255)->nullable();
            $table->longText('address',255)->nullable();
            $table->string('type',64)->nullable();
            $table->string('spoc_mobile',64)->nullable();
            $table->string('spoc_email',255)->nullable();
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
        Schema::dropIfExists('vendors');
    }
};
