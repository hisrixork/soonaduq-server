<?php

use Illuminate\Database\Seeder;

class HadithSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        exec("mysql -u " . config('database.connections.mysql.username') . " -p" . config('database.connections.mysql.password') . " " . config('database.connections.mysql.database') . " < " . getcwd() . "/database/hadith.sql");
    }
}
