<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEditaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('editais', function (Blueprint $table) {
            $table->increments('codigoEdital');
            $table->integer('codigoCurso');
            $table->char('nivelEdital', 2);
            $table->string('linkEdital');
            $table->timestamp('dataInicioEdital');
            $table->timestamp('dataFinalEdital');
            $table->timestamps();
            $table->integer('codigoPessoaAlteracao');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('editais');
    }
}
