<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEstimatorDesignerListIdToDesignerQuotationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('designer_quotations', function (Blueprint $table) {
            $table->unsignedBigInteger('estimator_designer_list_id')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('designer_quotations', function (Blueprint $table) {
            $table->unsignedBigInteger('estimator_designer_list_id')->nullable()->change();
        });
    }
}
