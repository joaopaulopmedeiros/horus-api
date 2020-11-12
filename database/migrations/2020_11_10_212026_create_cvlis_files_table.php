<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCvlisFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cvlis_files', function (Blueprint $table) {
            $table->id();
            $table->string('path');
            $table->timestamps();

            $table->unsignedBigInteger('cvlis_id');
            $table->foreign('cvlis_id')->references('id')->on('cvlis');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cvlis_files');
    }
}
