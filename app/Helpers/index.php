<?php

function money_format($number)
{
    return number_format($number, 0, ',', '.');
}

function money_translation($number)
{
    $number = abs($number);
    $read = array('', 'satu', 'dua', 'tiga', 'empat', 'lima', 'enam', 'tujuh', 'delapan', 'sembilan', 'sepuluh', 'sebelas');
    $translation = '';

    if ($number < 12) {
        $translation = ' ' . $read[$number];
    } elseif ($number < 20) {
        $translation = money_translation($number - 10) . ' belas';
    } elseif ($number < 100) {
        $translation = money_translation($number / 10) . ' puluh' . money_translation($number % 10);
    } elseif ($number < 200) {
        $translation = ' seratus' . money_translation($number - 100);
    } elseif ($number < 1000) {
        $translation = money_translation($number / 100) . ' ratus' . money_translation($number % 100);
    } elseif ($number < 2000) {
        $translation = ' seribu' . money_translation($number - 1000);
    } elseif ($number < 1000000) {
        $translation = money_translation($number / 1000) . ' ribu' . money_translation($number % 1000);
    } elseif ($number < 1000000000) {
        $translation = money_translation($number / 1000000) . ' juta' . money_translation($number % 1000000);
    }

    return $translation;
}

function indonesian_date($dates, $appear_today = true)
{
    $day_name  = array(
        'Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum\'at', 'Sabtu'
    );
    $month_name = array(1 =>
        'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
    );

    $year   = substr($dates, 0, 4);
    $month   = $month_name[(int) substr($dates, 5, 2)];
    $date = substr($dates, 8, 2);
    $text    = '';

    if ($appear_today) {
        $day_order = date('w', mktime(0,0,0, substr($dates, 5, 2), $date, $year));
        $day        = $day_name[$day_order];
        $text       .= "$day, $date $month $year";
    } else {
        $text       .= "$date $month $year";
    }
    
    return $text;
}
