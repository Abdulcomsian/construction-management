<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLocationTempWorkToPermitLoadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('permit_loads', function (Blueprint $table) {
            $table->longText('location_temp_work', 1000)->nullable()->change();
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
            if (Schema::hasColumn('permit_loads', 'permit_loads')){
                $table->dropColumn('location_temp_work');
            }
        });
    }
}
