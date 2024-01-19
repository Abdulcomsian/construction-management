<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class UpdateWorkStatusColumnToTemporaryWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('temporary_works', function (Blueprint $table) {
            DB::statement("ALTER TABLE `temporary_works` MODIFY `work_status` ENUM('pending', 'draft', 'publish', 'no_approval') DEFAULT 'no_approval'");
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
            //
        });
    }
}
