<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScopeOfDesignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scope_of_designs', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('temporary_work_id');
            $table->foreign('temporary_work_id')->references('id')->on('temporary_works');

//            $table->string('preliminary_sketches')->nullable();
            $table->string('preliminary_sketches_date')->nullable();
//            $table->string('construction_rawings')->nullable();
            $table->string('construction_rawings_date')->nullable();
//            $table->string('design_calculations')->nullable();
            $table->string('design_calculations_date')->nullable();
//            $table->string('design_check_certificate')->nullable();
            $table->string('design_check_certificate_date')->nullable();
//            $table->string('loading_criteria')->nullable();
            $table->string('loading_criteria_date')->nullable();
//            $table->string('construction_erection_sequence_information')->nullable();
            $table->string('construction_erection_sequence_information_date')->nullable();
//            $table->string('inspection_checklist')->nullable();
            $table->string('inspection_checklist_date')->nullable();
//            $table->string('monitoring_requirements')->nullable();
            $table->string('monitoring_requirements_date')->nullable();
//            $table->string('specifications')->nullable();
            $table->string('specifications_date')->nullable();
//            $table->string('design_inspection_test_plans')->nullable();
            $table->string('design_inspection_test_plans_date')->nullable();

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
        Schema::dropIfExists('scope_of_designs');
    }
}
