<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToPdfFilesHistory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pdf_files_history', function (Blueprint $table) {
            $table->tinyInteger('status')->default('1');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pdf_files_history', function (Blueprint $table) {
            if (Schema::hasColumn('pdf_files_history', 'status')){
                $table->dropColumn('status');
            }
        });
    }
}
