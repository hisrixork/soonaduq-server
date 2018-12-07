<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHadithTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hadith', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_line');
            $table->text('french');
            $table->string('report');
            $table->integer('id_hadith_title');
            $table->integer('is_title');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hadith');
    }
}