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
            $table->longText('description')->nullable();
            $table->timestamps();

            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('cvli_id')->nullable();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('cvli_id')->references('id')->on('cvlis');
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
