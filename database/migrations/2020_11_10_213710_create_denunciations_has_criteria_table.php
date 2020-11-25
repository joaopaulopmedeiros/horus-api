<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDenunciationsHasCriteriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('denunciations_has_criteria', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('denunciation_id');
            $table->foreign('denunciation_id')->references('id')->on('denunciations');
            $table->unsignedBigInteger('denunciation_criteria_id');
            $table->foreign('denunciation_criteria_id')->references('id')->on('denunciations_criteria');

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
        Schema::dropIfExists('denunciations_has_criteria');
    }
}
