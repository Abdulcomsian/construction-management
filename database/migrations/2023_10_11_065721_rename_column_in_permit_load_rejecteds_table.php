<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameColumnInPermitLoadRejectedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('permit_load_rejecteds', function (Blueprint $table) {
            $table->renameColumn('permit_id', 'permit_load_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('permit_load_rejecteds', function (Blueprint $table) {
            $table->renameColumn('permit_load_id', 'permit_id');
        });
    }
}
