<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNominationQualificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nomination_qualifications', function (Blueprint $table) {
            $table->id();

            $table->string('qualification')->nullable();
            $table->date('date')->nullable();

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
        Schema::dropIfExists('nomination_qualifications');
    }
}
