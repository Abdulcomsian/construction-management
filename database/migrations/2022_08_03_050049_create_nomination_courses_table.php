<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNominationCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nomination_courses', function (Blueprint $table) {
            $table->id();
            $table->string('course')->nullable();
            $table->date('date')->nullable();
            $table->string('course_certificate')->nullable();
            $table->unsignedBigInteger('nomination_id')->nullable();
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
        Schema::dropIfExists('nomination_courses');
    }
}
