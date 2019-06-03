<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQlygoithangQlygoithangTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qlygoithang__qlygoithang_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('qlygoithang_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['qlygoithang_id', 'locale']);
            $table->foreign('qlygoithang_id')->references('id')->on('qlygoithang__qlygoithangs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('qlygoithang__qlygoithang_translations', function (Blueprint $table) {
            $table->dropForeign(['qlygoithang_id']);
        });
        Schema::dropIfExists('qlygoithang__qlygoithang_translations');
    }
}
