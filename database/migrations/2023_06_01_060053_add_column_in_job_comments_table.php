<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnInJobCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('job_comments', function (Blueprint $table) {
            $table->unsignedBigInteger("notified")->default(0)->after('file_destination');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('job_comments', function (Blueprint $table) {
            if (Schema::hasColumn('job_comments', 'notified')){
                $table->dropColumn('notified');
            }
        });
    }
}
