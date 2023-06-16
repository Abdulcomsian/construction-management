<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnInTemporaryWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('temporary_works', function (Blueprint $table) {
            $table->longText("projaddress")->nullable()->after("project_id");
            $table->date("date")->nullable()->after("projaddress");
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
            if (Schema::hasColumn('temporary_works', 'projaddress')){
            $table->dropColumn('projaddress');
        }
        if (Schema::hasColumn('temporary_works', 'date')){
            $table->dropColumn('date');
        }
        });

    }
}
