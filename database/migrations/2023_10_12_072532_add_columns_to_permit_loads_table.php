<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToPermitLoadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('permit_loads', function (Blueprint $table) {
            $table->enum('signature_type',['draw','name_sign','upload'])->nullable();
            $table->enum('signature_type1',['draw','name_sign'])->nullable();
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
            if(Scheme::hasColumn('permit_loads','signature_type')){
                $table->dropColumn('signature_type');
            }
            if(Scheme::hasColumn('permit_loads','signature_type1')){
                $table->dropColumn('signature_type1');
            }
        });
    }
}
