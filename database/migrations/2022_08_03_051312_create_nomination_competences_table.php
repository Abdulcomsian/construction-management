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
            $table->text('Site_establishment')->nullable();
            $table->text('Access_scaffolding')->nullable();
            $table->text('Formwork_falsework')->nullable();
            $table->text('Construction_plant')->nullable();
            $table->text('Excavation_earthworks')->nullable();
            $table->text('Structural_stability')->nullable();
            $table->text('Permanent_works')->nullable();

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
