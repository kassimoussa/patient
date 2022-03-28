<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->bigInteger('id_patient')->nullable();
            $table->string('medecin')->nullable();
            $table->text('motif')->nullable();
            $table->text('resultats_clinique')->nullable();
            $table->text('resultats_paraclinique')->nullable();
            $table->text('diagnostiques')->nullable();
            $table->text('traitements')->nullable();
            $table->timestamp('date_consult')->nullable();
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
        Schema::dropIfExists('consultations');
    }
}
