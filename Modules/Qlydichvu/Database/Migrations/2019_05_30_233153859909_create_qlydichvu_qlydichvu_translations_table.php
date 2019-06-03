<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQlydichvuQlydichvuTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qlydichvu__qlydichvu_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('qlydichvu_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['qlydichvu_id', 'locale']);
            $table->foreign('qlydichvu_id')->references('id')->on('qlydichvu__qlydichvus')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('qlydichvu__qlydichvu_translations', function (Blueprint $table) {
            $table->dropForeign(['qlydichvu_id']);
        });
        Schema::dropIfExists('qlydichvu__qlydichvu_translations');
    }
}
