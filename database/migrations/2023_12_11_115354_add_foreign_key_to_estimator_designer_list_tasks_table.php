<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToEstimatorDesignerListTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('estimator_designer_list_tasks', function (Blueprint $table) {
            $table->foreign('estimator_designer_list_id')->references('id')->on('estimator_designer_lists')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('estimator_designer_list_tasks', function (Blueprint $table) {
            $table->dropForeign('estimator_designer_list_id');
        });
    }
}
