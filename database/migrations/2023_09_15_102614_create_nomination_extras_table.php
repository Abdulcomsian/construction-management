<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNominationExtrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nomination_extras', function (Blueprint $table) {
            $table->id();
            $table->string('fileName')->nullable();
            $table->unsignedBigInteger('nomination_id');
            $table->foreign('nomination_id')->references('id')->on('nominations');
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
        Schema::dropIfExists('nomination_extras');
    }
}
