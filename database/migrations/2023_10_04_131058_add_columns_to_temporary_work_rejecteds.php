<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToTemporaryWorkRejecteds extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('temporary_work_rejecteds', function (Blueprint $table) {
            $table->string('twc_id_no')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('temporary_work_rejecteds', function (Blueprint $table) {
            if(Scheme::hasColumn('temporary_work_rejecteds','twc_id_no')){
                $table->dropColumn('twc_id_no');
            }
        });
    }
}
