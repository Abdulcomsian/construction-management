<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnInTempWorkUploadFiles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('temp_work_upload_files', function (Blueprint $table) {
            $table->string('name')->after('file_name')->nullable();
            $table->string('design_checker_name')->after('name')->nullable();
            $table->date('date')->after('design_checker_name')->nullable();
        });
    }
 //name
 //checker name
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('temp_work_upload_files', function (Blueprint $table) {
            //
        });
    }
}
