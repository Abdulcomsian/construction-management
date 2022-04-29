<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShareDrawingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('share_drawings', function (Blueprint $table) {
            $table->id();
            $table->string('email')->nullable();
            $table->unsignedBigInteger('temp_work_upload_files_id');
            $table->foreign('temp_work_upload_files_id')->references('id')->on('temp_work_upload_files');
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
        Schema::dropIfExists('share_drawings');
    }
}
