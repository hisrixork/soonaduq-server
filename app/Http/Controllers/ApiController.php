<?php

namespace App\Http\Controllers;

use App\Helpers;
use App\Models\Hadith;
use App\Models\PrayTime;
use App\Models\Times;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{

    public function getMasjidName(Request $request, $lang)
    {
        return response()->json(["name" => ($lang === "french" ? config('app.jam_name') : config('app.jam_aname'))]);
    }

    public function getPrayers(Request $request)
    {
        $latitude = Helpers::getLat();
        $longitude = Helpers::getLon();

        $prayTime = new PrayTime(0);
        $prayTime->setDhuhrMinutes(Times::where('phonetic', 'dhuhr')->first()->adjustment);
        $prayTime->setMaghribMinutes(Times::where('phonetic', 'maghrib')->first()->adjustment);

        $n = Carbon::now('Europe/Paris');
        $n->addSeconds(20);

        $times = $this->adjustTime($prayTime->getPrayerTimes($n->timestamp, $latitude, $longitude));
        $times['isha'] = $n;

        $times = $this->adjustTime($prayTime->getPrayerTimes(Carbon::now('Europe/Paris')->timestamp, $latitude, $longitude));

        return response()->json(['prayers' => $times]);
    }


    function adjustTime($times)
    {
        foreach ($times as $name => $time) {
            $funcName = 'set' . ucfirst($name) . 'Minutes';
            if (!method_exists(new PrayTime(), $funcName)) {
                if (($a = Times::where('phonetic', strtolower($name))->first()) === null)
                    $m = 0;
                else
                    $m = $a->adjustment;
                $n = Carbon::parse($time->toDateTimeString(), 'Europe/Paris');
                $n->addMinutes($m);
                $times[$name] = $n;
            }
        }
        return $times;
    }

    public function getNextPrayer(Request $request, $t = true)
    {
        if (($times = $request->get('prayers')) === null)
            return '00:00:00';
        foreach ($times as $name => $time)
            $times[$name] = Carbon::parse($time['date'], 'Europe/Paris');
        return Helpers::nextTime($times, $t === true);
    }

    public function getAllTimes()
    {
        return response()->json(["times" => Times::all()]);
    }


    /*public function getNextTime(Request $request)
    {
        if (($times = $request->get('times')) === null)
            return '00:00:00';
        return Helpers::nextTime(json_decode(base64_decode($times)));
    }*/

    public function translateSalat(Request $request, $name)
    {
        return Helpers::translate($name);
    }

    public function getWait(Request $request, $name)
    {
        return Helpers::getWait($name);
    }

    public function getCoords(Request $request)
    {
        return response()->json(["lat" => Helpers::getLat(), "lng" => Helpers::getLon()]);
    }

    /*public function getAyah()
    {
        if (($a = DB::table('quran')->where('read', 0)->first()) === null) {
            DB::update('UPDATE quran SET `read` = 0');
            $a = DB::table('quran')->where('read', 0)->first();
        }
        DB::update('UPDATE quran SET `read` = 1 WHERE id_surah = ? AND id_verse = ?', array($a->id_surah, $a->id_verse));
        $surah = DB::table('surah')->where('id', $a->id_surah)->first();

        return response()->json(['ayah' => $a, 'surah' => $surah]);
    }*/

    public function getHadith(Request $request, $id)
    {
        if (($a = DB::table('hadith_title')->where('next', 0)->first()) === null) {
            DB::update('UPDATE hadith_title SET `next` = 0');
            $a = DB::table('hadith_title')->where('next', 0)->first();
        }

        if (($h = Hadith::where('id_line', $id)->where('id_hadith_title', $a->id)->first()) === null) {
            DB::update('UPDATE hadith_title SET `next` = 1 WHERE id = ? ', array($a->id));
            if (($a = DB::table('hadith_title')->where('next', 0)->first()) === null) {
                DB::update('UPDATE hadith_title SET `next` = 0');
            }
            $a = DB::table('hadith_title')->where('next', 0)->first();
            $h = Hadith::where('id_line', 0)->where('id_hadith_title', $a->id)->first();
        }

        return response()->json(['title' => $a->title, 'hadith' => $h]);
    }

}
