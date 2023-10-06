<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class AlterDraftStatusInTablePermitLoads extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('permit_loads', function (Blueprint $table) {
            DB::statement("ALTER TABLE permit_loads MODIFY COLUMN draft_status ENUM('0', '1', '2')  DEFAULT '0' ");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('permit_loads', function (Blueprint $table) {
            DB::statement("ALTER TABLE permit_loads MODIFY COLUMN draft_status ENUM('0', '1')  DEFAULT '0' ");
        });
    }
}
