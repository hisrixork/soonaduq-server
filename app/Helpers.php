<?php

namespace App;


use App\Models\PrayTime;
use App\Models\Times;
use Carbon\Carbon;

class Helpers
{

    public static function getWait($name)
    {
        if (($t = Times::where('phonetic', strtolower($name))->first()) === null || ($t = Times::where('id', $t->id)->first()) === null)
            return strtolower($name) === 'maghrib' ? 4 : 10;
        return $t->wait;
    }

    /**
     * @param $times
     * @return Carbon|string
     */
    /*public static function nextTime($times, $t = true)
    {
        Carbon::setLocale('fr');
        $now = Carbon::now('Europe/Paris');
        $next = Carbon::now('Europe/Paris');
        $last = Carbon::now('Europe/Paris');

        foreach ($times as $name => $time) {
            if ($next->timestamp > $last->timestamp && $now->timestamp < Carbon::parse($time->date ?? $time->toDateTimeString() ?? '', 'Europe/Paris')->timestamp) {
                $n = $name;
                $next = Carbon::parse($time->date ?? $time->toDateTimeString() ?? '', 'Europe/Paris');
            }
            $last = Carbon::parse($time->date ?? $time->toDateTimeString() ?? '', 'Europe/Paris');
        }
        if ($next->timestamp === $now->timestamp) {
            $n = 'fajr';
            $next = Carbon::parse($times->fajr->date ?? Carbon::now()->toDateTimeString(), 'Europe/Paris');
        }
        return $t ? Carbon::parse($next, 'Europe/Paris') : $n;
//        return $t ? Carbon::createFromTime($now->diff($next)->h, $now->diff($next)->i, $now->diff($next)->s) : $n;
    }*/

    public static function translate($name)
    {
        if (($t = Times::where('phonetic', strtolower($name))->first()) === null)
            return "";
        return $t->arab;
    }

    public static function getLat()
    {
        return config('app.city_lat');
    }

    public static function getLon()
    {
        return config('app.city_lon');
    }

    /*public static function getAdhan()
    {

        $phonetic = [
            'takbir' => 'Allahu Akbar',
            'lahila' => 'Ash-hadu an lâ ilâha illa-l-Allah',
            'rasoul' => 'Ash-hadu anna Muhammad r-rasulu-l-Allah',
            'salah'  => 'Hayya ʿala-s-salat',
            'falah'  => 'Hayya ʿala-l-falah',
            'end'    => 'Lâ ilaha illa-l-Allah'
        ];

        $arab = [
            'takbir' => 'اللَّهُ اكْبَرُ',
            'lahila' => 'اشْهَدُ ان لآ إلَهَ إلَّا اللَّهُ',
            'rasoul' => 'اشْهَدُ أنَّ مُهَمَّدً الرَّسُولُ ال',
            'salah'  => 'حَيَّ عَلى الصَلاةِ',
            'falah'  => 'حَيَّ عَلى الفَلاحِ',
            'end'    => 'لآ إلَهَ إلَّا اللَّهُ'
        ];

        $keys = array_keys($phonetic);
        $adhan = [];

        foreach ($keys as $index => $key) {
            $adhan[] = ['phonetic' => $phonetic[$key], 'arab' => $arab[$key], 'nb' => $key === 'end' ? 1 : 2];
            if ($index === 4 && Helpers::nextTime((new PrayTime())->getPrayerTimes(Carbon::now()->timestamp, Helpers::getLat(), Helpers::getLon()), false) === 'fajr')
                $adhan[] = ['phonetic' => 'As-ṣalatu kḫayru min an-nawm', 'arab' => 'الصَّلاةُ خَيرُ مِنَ النَوم', 'nb' => 2];
            if ($index === 0 || $index === 4)
                $adhan[] = ['phonetic' => $phonetic['takbir'], 'arab' => $arab['takbir'], 'nb' => 2];
        }

        return $adhan;
    }*/

    /*public static function getAdhanDuaa()
    {

        return array(
            [
                "arab"     => "اللّهُـمَّ رَبَّ هَذِهِ الدّعْـوَةِ التّـامَّة ” ",
                "phonetic" => "‘ Allâhumma rabba hâdhihi d-da`wati t-âmmati",
                "french"   => "« Ô Seigneur, Maître de cet appel parfait"
            ],
            [
                "arab"     => "وَالصّلاةِ القَـائِمَة",
                "phonetic" => "wa s-salâti-l-qâ'imati",
                "french"   => "et de la prière que l'on va accomplir,"
            ],
            [
                "arab"     => "آتِ محَـمَّداً الوَسيـلةَ وَالْفَضـيلَة",
                "phonetic" => "Âti Muhammadan al wasîlata wa-l-fadîlata",
                "french"   => "donne à Mohammed le pouvoir d'intercéder (le Jour du Jugement) et la place d'honneur (au Paradis),"
            ],
            [
                "arab"     => "وَابْعَـثْه مَقـامـاً مَحـموداً الَّذي وَعَـدْتَه",
                "phonetic" => "wa b`ath-hu maqâman mahmûdan al-ladhî wa`adtahu.",
                "french"   => "et ressuscite-le dans la position louable que Tu lui as promise."
            ],
            [
                "arab"     => "“ [إِنَّـكَ لا تُـخْلِفُ الميـعاد]",
                "phonetic" => "[Innaka lâ tukhlifu-l-mî`âd.] ’",
                "french"   => "(Car Tu ne manques jamais à Ta promesse.) »"
            ]
        );
    }*/

    public static function my_array_index($value, $array)
    {
        $i = 0;
        foreach ($array as $raw) {
            if ($raw === $value)
                return $i;
            $i++;
        }
        return -1;

    }

    public static function getReport($values)
    {
        $reporter = [
            "b"  => "Al-Bukhari",
            "m"  => "Muslim",
            "ab" => "Abu-Dawud",
            "an" => "An-Nasa'i",
            "t"  => "At-Tirmidhi",
            "im" => "Ibn Maja",
        ];

        $report = "";
        $keys = array_keys($reporter);

        foreach ($values as $index => $value) {
            if (in_array($value, $keys)) {
                $report .= $report === "" ? $reporter[$value] : " " . ($index === count($values) - 1 ? "et" : ",") . " " . $reporter[$value];

            }
        }

        return $report;
    }


    public static function getInfoNews()
    {
        $news = [];

        return count($news) > 0 ? $news : null;
    }

}