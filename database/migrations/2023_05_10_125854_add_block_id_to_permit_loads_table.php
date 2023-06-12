<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBlockIdToPermitLoadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('permit_loads', function (Blueprint $table) {
            // Check if the column already exists
                $table->unsignedBigInteger('block_id')->nullable();
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
                // Drop the column
                if (Schema::hasColumn('permit_loads', 'block_id')){
                    $table->dropColumn('block_id');
                }
        });
    }

}
