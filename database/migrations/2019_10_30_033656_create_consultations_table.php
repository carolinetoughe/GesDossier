<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsultationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date');
            $table->integer('user_id')->unsigned();;
            $table->integer('patient_id')->unsigned();;
            $table->integer('service_id')->unsigned();;
            $table->Integer('taille_patient');
            $table->Integer('poids_patient');
            $table->Integer('pression_patient');
            $table->string('motif');
            $table->text('diagnostique');
            $table->timestamps();

            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');

            $table->foreign('patient_id')
            ->references('id')
            ->on('patients')
            ->onDelete('cascade');

            $table->foreign('service_id')
            ->references('id')
            ->on('services')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consultations');
    }
}
