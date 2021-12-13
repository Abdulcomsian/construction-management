<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScaffoldingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scaffoldings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_id');
            $table->foreign('project_id')->references('id')->on('projects');

            $table->unsignedBigInteger('temporary_work_id');
            $table->foreign('temporary_work_id')->references('id')->on('temporary_works');

            $table->string('drawing_no')->nullable();
            $table->string('twc_name')->nullable();
            $table->string('permit_no')->nullable();
            $table->string('drawing_title')->nullable();
            $table->string('tws_name')->nullable();
            $table->string('location_temp_work')->nullable();
            $table->text('description_structure')->nullable();
            $table->string('ms_ra_no')->nullable();

            $table->tinyInteger('equipment_materials')->nullable();
            $table->string('equipment_materials_desc')->nullable();
            $table->tinyInteger('workmanship')->nullable();
            $table->string('workmanship_desc')->nullable();
            $table->tinyInteger('drawings_design')->nullable();
            $table->string('drawings_design_desc')->nullable();
            $table->tinyInteger('loading_limit')->nullable();
            $table->string('loading_limit_desc')->nullable();

            $table->string('job_title')->nullable();
            $table->string('company')->nullable();
            $table->string('signature')->nullable();
            $table->string('inspected_by')->nullable();
            $table->tinyInteger('Scaff_tag_signed')->nullable();
            $table->tinyInteger('carry_out_inspection')->nullable();
            $table->integer('created_by')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->string('ped_url')->nullable();
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
        Schema::dropIfExists('scaffoldings');
    }
}
