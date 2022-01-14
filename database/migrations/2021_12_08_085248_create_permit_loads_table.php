<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermitLoadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permit_loads', function (Blueprint $table) {
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
            $table->tinyInteger('equipment_metrial')->nullable();
            $table->tinyInteger('Workmanship')->nullable();
            $table->tinyInteger('drawings_design')->nullable();
            $table->tinyInteger('loading_limitations')->nullable();
            $table->tinyInteger('works_coordinator')->nullable();
            $table->text('description_approval_temp_works')->nullable();

            $table->tinyInteger('principle_contractor')->nullable();
            $table->string('name')->nullable();
            $table->string('name1')->nullable();
            $table->string('job_title')->nullable();
            $table->string('job_title1')->nullable();
            $table->string('company')->nullable();
            $table->string('signature')->nullable();
            $table->string('signature1')->nullable();
            $table->integer('created_by')->nullable();
            $table->string('ped_url')->nullable();
            $table->string('mix_design_detail')->nullable();
            $table->string('unique_ref_no')->nullable();
            $table->string('age_cube')->nullable();
            $table->string('compressive_strength')->nullable();
            $table->string('method_curing')->nullable();
            $table->string('twc_control_pts')->nullable();
            $table->string('back_propping')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->string('type')->nullable();
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
        Schema::dropIfExists('permit_loads');
    }
}
