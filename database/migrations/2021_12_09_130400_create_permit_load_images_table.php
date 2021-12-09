<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermitLoadImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permit_load_images', function (Blueprint $table) {
            $table->id();
            $table->string('fileName')->nullable();

            $table->unsignedBigInteger('permit_load_id');
            $table->foreign('permit_load_id')->references('id')->on('permit_loads');

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
        Schema::dropIfExists('permit_load_images');
    }
}
