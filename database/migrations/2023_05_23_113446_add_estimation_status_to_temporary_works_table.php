<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEstimationStatusToTemporaryWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('temporary_works', function (Blueprint $table) {
            $table->enum('work_status', ['draft','pending','publish'])->default('publish')->comment('This is for when user create');
            $table->string('client_email')->nullable();
            $table->string('projname')->nullable();
            $table->string('projno')->nullable();
            $table->string('admin_designer_email')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('temporary_works', function (Blueprint $table) {
            $table->dropColumn('work_status');
            $table->dropColumn('client_email');
            $table->dropColumn('projname');
            $table->dropColumn('projno');
            $table->dropColumn('admin_designer_email');
        });
    }
}
