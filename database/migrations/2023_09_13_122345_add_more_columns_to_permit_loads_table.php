<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMoreColumnsToPermitLoadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('permit_loads', function (Blueprint $table) {
            $table->date('date1')->nullable();
            $table->date('date')->nullable();
            $table->text('company1')->nullable();
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
        
        });
        Schema::table('permit_loads', function (Blueprint $table) {
            if (Schema::hasColumn('permit_loads', 'date1')){
                $table->dropColumn('date1');
            } 
            if (Schema::hasColumn('permit_loads', 'date')){
                $table->dropColumn('date');
            } 
            if (Schema::hasColumn('permit_loads', 'company1')){
                $table->dropColumn('company1');
            }
        });
    }
}
