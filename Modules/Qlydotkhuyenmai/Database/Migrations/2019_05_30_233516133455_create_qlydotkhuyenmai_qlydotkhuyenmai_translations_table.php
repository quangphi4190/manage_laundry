<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQlydotkhuyenmaiQlydotkhuyenmaiTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qlydotkhuyenmai__qlydotkhuyenmai_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('qlydotkhuyenmai_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['qlydotkhuyenmai_id', 'locale']);
            $table->foreign('qlydotkhuyenmai_id')->references('id')->on('qlydotkhuyenmai__qlydotkhuyenmais')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('qlydotkhuyenmai__qlydotkhuyenmai_translations', function (Blueprint $table) {
            $table->dropForeign(['qlydotkhuyenmai_id']);
        });
        Schema::dropIfExists('qlydotkhuyenmai__qlydotkhuyenmai_translations');
    }
}
