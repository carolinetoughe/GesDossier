<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnalyseFicheanalyseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('analyse_ficheanalyse', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('analyse_id')-> unsigned ();
            $table->integer('ficheanalyse_id')-> unsigned ();
            $table->timestamps();

            $table->foreign('analyse_id')
            ->references('id')
            ->on('analyses')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('ficheanalyse_id')
            ->references('id')
            ->on('ficheanalyses')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('analyse_ficheanalyse');
    }
}
