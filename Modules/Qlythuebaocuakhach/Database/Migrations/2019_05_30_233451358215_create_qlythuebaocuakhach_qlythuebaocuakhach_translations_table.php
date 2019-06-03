<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQlythuebaocuakhachQlythuebaocuakhachTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qlythuebaocuakhach__qlythuebaocuakhach_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('qlythuebaocuakhach_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['qlythuebaocuakhach_id', 'locale']);
            $table->foreign('qlythuebaocuakhach_id')->references('id')->on('qlythuebaocuakhach__qlythuebaocuakhaches')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('qlythuebaocuakhach__qlythuebaocuakhach_translations', function (Blueprint $table) {
            $table->dropForeign(['qlythuebaocuakhach_id']);
        });
        Schema::dropIfExists('qlythuebaocuakhach__qlythuebaocuakhach_translations');
    }
}
