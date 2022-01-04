<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttachSpeCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attach_spe_comments', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('temporary_work_id');
            $table->foreign('temporary_work_id')->references('id')->on('temporary_works');

            $table->text('list_of_attachments_comment')->nullable();
            $table->text('reports_including_site_investigations_comment')->nullable();
            $table->text('existing_ground_conditions_comment')->nullable();
            $table->text('preferred_non_preferred_methods_comment')->nullable();
            $table->text('access_limitations_comment')->nullable();
            $table->text('back_propping_comment')->nullable();
            $table->text('limitations_on_temporary_works_design_comment')->nullable();
            $table->text('details_of_any_hazards_comment')->nullable();
            $table->text('3rd_party_requirements_comment')->nullable();
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
        Schema::dropIfExists('attach_spe_comments');
    }
}
