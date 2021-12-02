<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemporaryWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temporary_works', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('project_id');
            $table->foreign('project_id')->references('id')->on('projects');

            $table->date('design_issued_date')->nullable();
            $table->date('design_required_by_date')->nullable();
            $table->string('designer_company_name')->nullable();
            $table->string('designer_company_email')->nullable();
            $table->string('twc_name')->nullable();
            $table->string('twc_email')->nullable();
            $table->tinyInteger('tw_category')->nullable();
            $table->string('tw_risk_class')->nullable();
            $table->longText('description_temporary_work_required')->nullable();
            $table->string('name')->nullable();
            $table->string('job_title')->nullable();
            $table->string('company')->nullable();
            $table->string('signature')->nullable();
            $table->longText('design_requirement_text')->nullable();
            $table->integer('created_by')->nullable();
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
        Schema::dropIfExists('temporary_works');
    }
}
