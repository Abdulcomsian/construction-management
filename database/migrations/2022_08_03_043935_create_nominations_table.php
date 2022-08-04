<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNominationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nominations', function (Blueprint $table) {
            $table->id();
            $table->string('project')->nullable();
            $table->string('project_manager')->nullable();
            $table->string('nominated_person')->nullable();
            $table->string('nominated_person_employer')->nullable();
            $table->string('nominated_role')->nullable();
            $table->string('description_of_role')->nullable();
            $table->string('Description_limits_authority')->nullable();
            $table->string('authority_issue_permit')->nullable();

            $table->string('print_name')->nullable();
            $table->string('job_title')->nullable();
            $table->string('signature')->nullable();

            $table->string('print_name1')->nullable();
            $table->string('job_title1')->nullable();
            $table->string('signature1')->nullable();


            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');

            $table->tinyinteger('status')->default(0);
            

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
        Schema::dropIfExists('nominations');
    }
}
