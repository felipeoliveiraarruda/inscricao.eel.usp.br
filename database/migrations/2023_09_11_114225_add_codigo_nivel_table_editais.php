<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCodigoNivelTableEditais extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('editais', function (Blueprint $table) {
            $table->unsignedBigInteger('codigoNivel')
                  ->after('codigoCurso');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('editais', function (Blueprint $table) {
            $table->dropColumn('codigoNivel');
        }); 
    }
}
