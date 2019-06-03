<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQlythietbiQlythietbiTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qlythietbi__qlythietbi_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('qlythietbi_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['qlythietbi_id', 'locale']);
            $table->foreign('qlythietbi_id')->references('id')->on('qlythietbi__qlythietbis')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('qlythietbi__qlythietbi_translations', function (Blueprint $table) {
            $table->dropForeign(['qlythietbi_id']);
        });
        Schema::dropIfExists('qlythietbi__qlythietbi_translations');
    }
}
