<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCvlisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cvlis', function (Blueprint $table) {
            $table->id();
            $table->float('latitude', 12, 10);
            $table->float('longitude', 12, 10);
            $table->float('stars', 3, 2)->default(1);
            $table->timestamps();

            $table->unsignedBigInteger('cvlis_types_id');
            $table->foreign('cvlis_id')->references('id')->on('cvlis_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cvlis');
    }
}
