<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDesigneruploadToTempWorkUploadFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('temp_work_upload_files', function (Blueprint $table) {
            $table->string('drawing_number')->nullable();
            $table->longText('comments')->nullable();
            $table->string('twd_name')->nullable();
            $table->string('drawing_title')->nullable();
            $table->tinyInteger('preliminary_approval')->nullable();
            $table->tinyInteger('construction')->nullable();
        });
    }

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
