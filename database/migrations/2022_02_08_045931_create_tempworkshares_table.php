<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTempworksharesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tempworkshares', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('temporary_work_id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('temporary_work_id')->references('id')->on('temporary_works');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('tempworkshares');
    }
}
