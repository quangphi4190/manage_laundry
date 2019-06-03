<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQlyloaiquanaoQlyloaiquanaoTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qlyloaiquanao__qlyloaiquanao_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('qlyloaiquanao_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['qlyloaiquanao_id', 'locale']);
            $table->foreign('qlyloaiquanao_id')->references('id')->on('qlyloaiquanao__qlyloaiquanaos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('qlyloaiquanao__qlyloaiquanao_translations', function (Blueprint $table) {
            $table->dropForeign(['qlyloaiquanao_id']);
        });
        Schema::dropIfExists('qlyloaiquanao__qlyloaiquanao_translations');
    }
}
