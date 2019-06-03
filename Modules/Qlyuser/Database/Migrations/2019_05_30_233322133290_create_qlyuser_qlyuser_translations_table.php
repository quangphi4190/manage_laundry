<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQlyuserQlyuserTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qlyuser__qlyuser_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('qlyuser_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['qlyuser_id', 'locale']);
            $table->foreign('qlyuser_id')->references('id')->on('qlyuser__qlyusers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('qlyuser__qlyuser_translations', function (Blueprint $table) {
            $table->dropForeign(['qlyuser_id']);
        });
        Schema::dropIfExists('qlyuser__qlyuser_translations');
    }
}
