<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTypeToEstimatorDesignerListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('estimator_designer_lists', function (Blueprint $table) {
             $table->enum('type',['Designer', 'Supplier', 'Admin Designer'])->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('estimator_designer_lists', function (Blueprint $table) {
            //
        });
    }
}
