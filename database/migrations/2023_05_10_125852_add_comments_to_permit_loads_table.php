<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCommentsToPermitLoadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('permit_loads', function (Blueprint $table) {
            //
            $table->longText('comments', 1000)->nullable();
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
            if (Schema::hasColumn('permit_loads', 'comments')){
                $table->dropColumn('comments');
            }
        });
    }
}
