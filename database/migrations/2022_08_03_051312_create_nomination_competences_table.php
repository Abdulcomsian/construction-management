<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNominationCompetencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nomination_competences', function (Blueprint $table) {
            $table->id();
            $table->string('Site_establishment')->nullable();
            $table->string('Access_scaffolding')->nullable();
            $table->string('Formwork_falsework')->nullable();
            $table->string('Construction_plant')->nullable();
            $table->string('Excavation_earthworks')->nullable();
            $table->string('Structural_stability')->nullable();
            $table->string('Permanent_works')->nullable();

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
        Schema::dropIfExists('nomination_competences');
    }
}
