<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScaffoldLoadImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scaffold_load_images', function (Blueprint $table) {
           $table->id();
            $table->string('fileName')->nullable();

            $table->unsignedBigInteger('scaffolding_id');
            $table->foreign('scaffolding_id')->references('id')->on('scaffoldings');

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
        Schema::dropIfExists('scaffold_load_images');
    }
}
