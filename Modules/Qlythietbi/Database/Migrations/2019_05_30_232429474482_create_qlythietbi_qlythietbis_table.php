<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQlythietbiQlythietbisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qlythietbi__qlythietbis', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');           
            $table->string('name');
            $table->text('description');
            $table->integer('status');
            $table->string('model');
            $table->string('noisanxuat');
            $table->string('congsuat');
            $table->string('duongkinhlong');
            $table->string('dosaulong');
            $table->string('tocdogiac');
            $table->string('tocdovat');
            $table->string('congsuatbom');
            $table->string('dongco');
            $table->string('kichthuoc');
            $table->string('trongluong');
            $table->string('dienap');
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
        Schema::dropIfExists('qlythietbi__qlythietbis');
    }
}
