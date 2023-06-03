<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToEstimatorDesignerListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('estimator_designer_lists', function (Blueprint $table) {
            $table->enum('status', ['approved','pending','rejected'])->nullable();
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
            if (Schema::hasColumn('estimator_designer_lists', 'status')){
                $table->dropColumn('status');
            }
        });
    }
}
