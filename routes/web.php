<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/test', function () {
    $hs = include('../database/hadith.php');

    $a = [];
    $keys = array_keys($hs);
    foreach ($hs as $key => $ht) {
        $h = $ht['text'];
        $h = str_replace("‟", "'", $h);
        $h = str_replace("`", "'", $h);
        $h = str_replace("„", "`", $h);
        $h = str_replace("  ", " ", $h);
        $h = str_replace("Dieu", "Allah", $h);
        $h = str_replace("dieu", "Allah", $h);
        $h = str_replace("-qu’Allâh l’agrée-", "&lt;img class='rad'/&gt;", $h);
        $h = str_replace("-sallâ l-Lahû ‘aleyhi wa sallam-", "&lt;img class='saw'/&gt;", $h);
        $tmp = preg_split('/[\.]/', $h);
        $i = 0;
        foreach ($tmp as $t) {
            if (substr($t, 0, strlen(" »")) === " »")
                $tmp[$i - 1] .= " »";
            if ($t !== " »") {
                $tmp[$i] = $t . ".";
                $tmp[$i] = str_replace(" »\n", "", $t);
                $tmp[$i] = str_replace("» ", "", $tmp[$i]);
                $tmp[$i] = trim($tmp[$i]);
                $i++;
            } else {
                unset($tmp[$i]);
            }

        }
        $a[] = [
            "id_title" => \App\Helpers::my_array_index($key, $keys),
            "text"     => $tmp,
            "report"   => \App\Helpers::getReport($ht['report']),
        ];
    }


    foreach ($keys as $i => $key) {
        echo "INSERT INTO hadith_title(id, title, `next`) VALUES($i, \"$key\", 0);<br>";
    }

    echo "<br><br>";

    foreach ($a as $h) {
        $index = 0;
        echo "INSERT INTO hadith(id_hadith_title, id_line, french, report, is_title) VALUES(" . $h['id_title'] . ", " . $index++ . ", \"" . $keys[$h['id_title']] . "\", \"" . $h['report'] . "\", 1);<br>";
        foreach ($h['text'] as $t)
            if (trim($t) !== "»" && trim($t) !== '')
                echo "INSERT INTO hadith(id_hadith_title, id_line, french, report, is_title) VALUES(" . $h['id_title'] . ", " . $index++ . ", \"$t\", \"" . $h['report'] . "\", 0);<br>";
        echo "INSERT INTO hadith(id_hadith_title, id_line, french, report, is_title) VALUES(" . $h['id_title'] . ", " . $index . ", \"&lt;span class='font-italic'/&gt;Rapporté par " . $h['report'] . "&lt;/span&gt;\",\"" . $h['report'] . "\", 0);<br>";
    }


});