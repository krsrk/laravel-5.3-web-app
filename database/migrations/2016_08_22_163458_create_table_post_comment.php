<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePostComment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_comment', function (Blueprint $table) {
            $table->increments('id'); //Llave primaria auto incrementabla tipo INT
            $table->integer('post_id'); // llave foranea: id del post, relacion 1->N
            $table->string('comment'); //comentatrio de la publicacion
            $table->timestamps(); //Fechas de creacion y actualizacion
            $table->integer('status')->default(1)->comment("Estatus del comentario 1= activo, 0= borrado"); //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('post_comment');
    }
}
