<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddChanestringtotextToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('nominations', function (Blueprint $table) {
            $table->text('description_of_role')->nullable();
            $table->text('Description_limits_authority')->nullable();
            $table->text('authority_issue_permit')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('nominations', function (Blueprint $table) {
            //
        });
    }
}
