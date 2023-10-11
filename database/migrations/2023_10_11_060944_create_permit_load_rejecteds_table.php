<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermitLoadRejectedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permit_load_rejecteds', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('permit_id')->nullable();
            $table->longText('filename')->nullable();
            $table->tinyInteger('status')->nullable();
            $table->longText('comment')->nullable();
            $table->timestamp('rejected_at')->nullable();
            $table->foreign('permit_id')->references('id')->on('permit_loads');
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
        Schema::dropIfExists('permit_load_rejecteds');
    }
}
