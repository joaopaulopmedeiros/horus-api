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

            $table->unsignedBigInteger('users_id')->nullable();
            $table->unsignedBigInteger('cvlis_id')->nullable();

            $table->foreign('users_id')->references('id')->on('users');
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
        Schema::dropIfExists('denunciations');
    }
}
