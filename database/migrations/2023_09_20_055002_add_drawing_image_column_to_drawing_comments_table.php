<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDrawingImageColumnToDrawingCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('drawing_comments', function (Blueprint $table) {
            $table->text('drawing_image')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('drawing_comments', function (Blueprint $table) {
            if (Schema::hasColumn('drawing_comments', 'drawing_image')){
                $table->dropColumn('drawing_image');
            }
        });
    }
}
