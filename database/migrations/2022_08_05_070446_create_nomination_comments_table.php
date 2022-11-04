<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNominationCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nomination_comments', function (Blueprint $table) {
            $table->id();

            $table->string('email')->nullable();
            $table->text('comment')->nullable();
            $table->string('type')->nullable();
            $table->string('send_date')->nullable();
            $table->string('read_date')->nullable();
            $table->unsignedBigInteger('nomination_id')->nullable();
            $table->foreign('nomination_id')->references('id')->on('nominations');
            $table->unsignedBigInteger('user_id')->nullable();
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
        Schema::dropIfExists('notification_comments');
    }
}
