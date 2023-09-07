<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMinimumConcreteToPermitLoadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('permit_loads', function (Blueprint $table) {
            $table->integer('minimum_concrete')->after('description_approval_temp_works')->nullable();
            $table->text('description_minimum_concrete')->after('minimum_concrete')->nullable();
            $table->string('file_minimum_concrete')->after('description_minimum_concrete')->nullable();
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
            if (Schema::hasColumn('permit_loads', 'minimum_concrete')){
                $table->dropColumn('minimum_concrete');
            }
            if (Schema::hasColumn('permit_loads', 'description_minimum_concrete')){
                $table->dropColumn('description_minimum_concrete');
            }
            if (Schema::hasColumn('permit_loads', 'file_minimum_concrete')){
                $table->dropColumn('file_minimum_concrete');
            }
        });
    }
}
