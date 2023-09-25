<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSignatureTypeColumnToTemporaryWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('temporary_works', function (Blueprint $table) {
            $table->text('signature_type')->nullable();
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
            if (Schema::hasColumn('temporary_works', 'signature_type')){
                $table->dropColumn('signature_type');
            }
        });
    }
}
