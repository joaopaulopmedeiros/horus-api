<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDenunciationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('denunciations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('denunciations_criteria_id')->nullable();
            $table->foreign('denunciations_criteria_id')->references('id')->on('denunciations_criteria');
            $table->longText('description')->nullable();
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
        Schema::dropIfExists('denunciations');
    }
}
