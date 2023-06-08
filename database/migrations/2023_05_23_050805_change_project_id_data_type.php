<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeProjectIdDataType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('temporary_works', function (Blueprint $table) {
            $table->unsignedBigInteger('project_id')->nullable()->change();
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
            $table->unsignedBigInteger('project_id')->nullable()->change();
        });
    }
}