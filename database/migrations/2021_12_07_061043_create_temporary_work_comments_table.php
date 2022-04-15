<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemporaryWorkCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temporary_work_comments', function (Blueprint $table) {
            $table->id();
            $table->text('comment')->nullable();
            $table->text('replay')->nullable();
            $table->string('reply_image')->nullable();
            $table->string('image')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('temporary_work_id')->nullable();
            $table->string('reply_date')->nullable();
            $table->foreign('temporary_work_id')->references('id')->on('temporary_works');
            $table->string('type')->default('normal');
            $table->tinyInteger('status')->default(0);

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
        Schema::dropIfExists('temporary_work_comments');
    }
}
