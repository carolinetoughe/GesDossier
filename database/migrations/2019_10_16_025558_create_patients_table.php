<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('dossier');
            $table->string('nom');
            $table->string('prenom');
            $table->string('sexe');
            $table->date('datenaissance');
            $table->string('adresse');
            $table->string('nationalite');
            $table->string('groupesanguin');
            $table->integer('numerotelephone');
            $table->string('nomurgence');
            $table->integer('numerourgence');
            $table->string('pieceidentite');
            $table->string('civilite');
            $table->string('image');
            $table->string('email');
            $table->string('password');
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
        Schema::dropIfExists('patients');
    }
}
