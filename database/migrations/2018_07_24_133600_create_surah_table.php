<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        exec("mysql -u " . config('database.connections.mysql.username') . " -p" . config('database.connections.mysql.password') . " " . config('database.connections.mysql.database') . " < " . getcwd() . "/database/surah.sql");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('surah');
    }
}
