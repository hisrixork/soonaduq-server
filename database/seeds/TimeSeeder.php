<?php

use App\Models\Times;
use Illuminate\Database\Seeder;

class TimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Times::create([
            "phonetic"       => "fajr",
            "arab"       => "الفجر",
            "adjustment" => -5,
            "wait"       => 10,
        ]);
        Times::create([
            "phonetic"       => "shuruq",
            "arab"       => "الشروق",
            "adjustment" => 0,
            "wait"       => 0,
        ]);
        Times::create([
            "phonetic"       => "dhuhr",
            "arab"       => "الظهر",
            "adjustment" => 5,
            "wait"       => 10,
        ]);
        Times::create([
            "phonetic"       => "asr",
            "arab"       => "العصر",
            "adjustment" => 0,
            "wait"       => 10,
        ]);
        Times::create([
            "phonetic"       => "maghrib",
            "arab"       => "المغرب",
            "adjustment" => 5,
            "wait"       => 5,
        ]);
        Times::create([
            "phonetic"       => "isha",
            "arab"       => "العشاء",
            "adjustment" => 0,
            "wait"       => 10,
        ]);
        exec("mysql -u " . config('database.connections.mysql.username') . " -p" . config('database.connections.mysql.password') . " " . config('database.connections.mysql.database') . " < " . getcwd() . "/database/hadith.sql");
    }
}
