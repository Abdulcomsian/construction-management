<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoldersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('folders', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('temporary_work_id');
            $table->foreign('temporary_work_id')->references('id')->on('temporary_works');

            $table->string('list_of_attachments')->nullable();
            $table->string('reports_including_site_investigations')->nullable();
            $table->string('existing_ground_conditions')->nullable();
            $table->string('preferred_non_preferred_methods')->nullable();
            $table->string('access_limitations')->nullable();
            $table->string('back_propping')->nullable();
            $table->string('limitations_on_temporary_works_design')->nullable();
            $table->string('details_of_any_hazards')->nullable();
            $table->string('3rd_party_requirements')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('folders');
    }
}
