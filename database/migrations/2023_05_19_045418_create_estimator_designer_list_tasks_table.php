<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstimatorDesignerListTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estimator_designer_list_tasks', function (Blueprint $table) {
            $table->id();
            $table->date('date')->nullable();
            $table->time('hours')->nullable();
            $table->longText('task')->nullable();
            $table->unsignedBigInteger('estimator_designer_list_id')->nullable();
            $table->foreign('estimator_designer_list_id')->references('id')->on('estimator_designer_lists')->onDelete('cascade');
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
        Schema::dropIfExists('estimator_designer_list_tasks');
    }
}
