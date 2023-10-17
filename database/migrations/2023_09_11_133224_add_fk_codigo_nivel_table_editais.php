<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFkCodigoNivelTableEditais extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('editais', function (Blueprint $table) {
            $table->foreign('codigoNivel')->references('codigoNivel')->on('niveis');
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
            $table->dropForeign('posts_user_id_foreign');
        }); 
    }
}
