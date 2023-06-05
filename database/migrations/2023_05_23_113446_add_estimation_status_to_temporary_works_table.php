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
            if (Schema::hasColumn('temporary_works', 'work_status')){
                $table->dropColumn('work_status');
            }
            if (Schema::hasColumn('temporary_works', 'client_email')){
                $table->dropColumn('client_email');
            }
            if (Schema::hasColumn('temporary_works', 'projname')){
                $table->dropColumn('projname');
            }
            if (Schema::hasColumn('temporary_works', 'projno')){
                $table->dropColumn('projno');
            }
            if (Schema::hasColumn('temporary_works', 'admin_designer_email')){
                $table->dropColumn('admin_designer_email');
            }
        });
    }
}
