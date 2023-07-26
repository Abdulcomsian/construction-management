<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserTypeToChangeEmailHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('change_email_histories', function (Blueprint $table) {
            $table->string('user_type')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('change_email_histories', function (Blueprint $table) {
            if (Schema::hasColumn('change_email_histories', 'user_type')){
                $table->dropColumn('user_type');
            }
        });
    }
}
