<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDrawingCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drawing_comments', function (Blueprint $table) {
            $table->id();
            $table->text('drawing_comment')->nullable();
            $table->text('drawing_reply')->nullable();
            $table->text('reply_date')->nullable();
            $table->text('reply_image')->nullable();
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
        Schema::dropIfExists('drawing_comments');
    }
}
