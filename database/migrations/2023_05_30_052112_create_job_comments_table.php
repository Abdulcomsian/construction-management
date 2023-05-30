<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("additional_information_id");
            $table->unsignedBigInteger("parent_id")->nullable();
            $table->longText("comment");
            $table->longText("file_destination")->nullable();
            $table->foreign("additional_information_id")->references("id")->on("additional_information")->cascadeOnDelete();
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
        Schema::dropIfExists('job_comments');
    }
}
