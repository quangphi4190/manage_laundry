<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQlytiemsQlytiemsTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qlytiems__qlytiems_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('qlytiems_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['qlytiems_id', 'locale']);
            $table->foreign('qlytiems_id')->references('id')->on('qlytiems__qlytiems')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('qlytiems__qlytiems_translations', function (Blueprint $table) {
            $table->dropForeign(['qlytiems_id']);
        });
        Schema::dropIfExists('qlytiems__qlytiems_translations');
    }
}
