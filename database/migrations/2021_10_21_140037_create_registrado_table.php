<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistradoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrado', function (Blueprint $table) {
            $table->integer('curso_id')->unsigned();
            $table->foreign('curso_id')->references('id_curso')->on('curso')->onDelete('cascade');
            $table->integer('estu_id')->unsigned();
            $table->foreign('estu_id')->references('id_estu')->on('estudiante')->onDelete('cascade');
            $table->integer('gest_id')->unsigned();
            $table->foreign('gest_id')->references('id_gest')->on('gestion')->onDelete('cascade');
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
        Schema::dropIfExists('registrado');
    }
}
