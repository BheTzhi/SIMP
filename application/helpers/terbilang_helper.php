<?php if (!defined("BASEPATH")) exit("No direct script access allowed");

function pembulatan($uang)
{
    $puluhan = substr($uang, -2);

    if ($puluhan < 01)
        $akhir = $uang - $puluhan;
    else
        $akhir = $uang + (100 - $puluhan);
    return $akhir;
}

if (!function_exists('number_to_words')) {

    function number_to_words($number)
    {

        $before_comma = trim(to_word($number));

        return ucwords($before_comma . ' rupiah');
    }

    function to_word($n)
    {
        $words = "";
        $angka = [
            '',
            'satu',
            'dua',
            'tiga',
            'empat',
            'lima',
            'enam',
            'tujuh',
            'delapan',
            'sembilan',
            'sepuluh',
            'sebelas',
        ];

        if ($n < 12)
            return " " . $angka[$n];
        elseif ($n < 20)
            return to_word($n - 10) . " belas";
        elseif ($n < 100)
            return to_word($n / 10) . " puluh" . to_word($n % 10);
        elseif ($n < 200)
            return "seratus" . to_word($n - 100);
        elseif ($n < 1000)
            return to_word($n / 100) . " ratus" . to_word($n % 100);
        elseif ($n < 2000)
            return "seribu" . to_word($n - 1000);
        elseif ($n < 1000000)
            return to_word($n / 1000) . " ribu" . to_word($n % 1000);
        elseif ($n < 1000000000)
            return to_word($n / 1000000) . " juta" . to_word($n % 1000000);
    }
}

function getAmper($x)
{
    switch ($x) {
        case 450:
            return '2A';
            break;
        case 900:
            return '4A';
            break;
        case 1300:
            return '6A';
            break;
        case 2200:
            return '10A';
            break;
        case 3500:
            return '16A';
            break;
        case 4400:
            return '20A';
            break;
        case 5500:
            return '25A';
            break;
        case 6600:
            return '32A';
            break;
        case 7700:
            return '40A';
            break;
        case 10600:
            return '3 X 16A';
            break;
        case 13200:
            return '3 X 20A';
            break;
        case 16500:
            return '3 X 25A';
            break;
        case 23000:
            return '3 X 35A';
            break;
        case 33000:
            return '3 X 50A';
            break;
    }
}

function getLantai($lantai)
{
    switch ($lantai) {
        case 0:
            return 'Dasar';
            break;
        case 1:
            return 'Satu';
            break;
    }
}

function getStatus($status)
{
    switch ($status) {
        case 0:
            return 'Belum Lunas';
            break;
        case 1:
            return 'Lunas';
            break;
    }
}

function getLinks($link, $kios, $blok)
{
    $ci = get_instance();

    switch ($link) {
        case $ci->uri->segment('2') == true;
            return '<div class="row"><a href=" base_url() ">Dashboard</a> &nbsp;/&nbsp; <a href=" base_url(air) "> air</a> &nbsp;/&nbsp;  $ci->uri->segment(2);  </div>';
            break;
        case $ci->uri->segment('3') == true:
            return '<div class="row"><a href="' . base_url() . '">Dashboard</a> &nbsp;/&nbsp; <a href="' . base_url("air") . '"> air</a> &nbsp;/&nbsp; <a href="' . base_url("air/" . $ci->uri->segment(2)) . '"> ' . $ci->uri->segment(2) . ' </a> &nbsp;/&nbsp; Blok ' . $blok . ' </div>';
            break;
        case $ci->uri->segment('4') == true:
            return '<div class="row"><a href="' . base_url() . '">Dashboard</a> &nbsp;/&nbsp; <a href="' . base_url("air") . '"> air</a> &nbsp;/&nbsp; <a href="' . base_url("air/" . $ci->uri->segment(2)) . '"> ' . $ci->uri->segment(2) . ' </a> &nbsp;/&nbsp; <a href="' . base_url("air/" . $ci->uri->segment(2) . "/" . $ci->uri->segment(3)) . '"> Blok ' . $blok . '</a> &nbsp;/&nbsp; Nomor ' . $kios . ' </div>';
            break;
        case $ci->uri->segment('5') == 'edit':
            return '<div class="row"><a href="' . base_url() . '">Dashboard</a> &nbsp;/&nbsp; <a href=" ' . base_url("air") . ' "> air</a> &nbsp;/&nbsp; <a href="' . base_url("air/" . $ci->uri->segment(2)) . '">  ' . $ci->uri->segment(2) . '</a> &nbsp;/&nbsp; <a href=" ' . base_url("air/" . $ci->uri->segment(2) . "/" . $ci->uri->segment(3)) . '"> Blok  ' . $blok . ' </a> &nbsp;/&nbsp; <a href="' . base_url("air/" . $ci->uri->segment(2) . "/" . $ci->uri->segment(3) . "/" . $ci->uri->segment(4)) . ' "> Nomor  ' . $kios . ' </a> &nbsp;/&nbsp;  ' . $ci->uri->segment(5) . '  </div>';
            break;
    }
}

function tgl_indo($tanggal)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return $bulan[(int)$pecahkan[0]] . ' - ' . $pecahkan[1];
}

function getUtilityCode($value)
{
    switch ($value) {
        case '001';
            return 'MD';
            break;
        case '002';
            return 'PD';
            break;
        case '003';
            return 'GD';
            break;
        case '004';
            return 'KP';
            break;
        case '005';
            return 'MS';
            break;
    }
}
function getUtility($value)
{
    switch ($value) {
        case '001';
            return 'Masjid';
            break;
        case '002';
            return 'PD Pasar';
            break;
        case '003';
            return 'Gudang ME';
            break;
        case '004';
            return 'Gudang Cleaning';
            break;
        case '005';
            return 'Ruang ME';
            break;
    }
}

function kwt($value)
{
    $kwt = substr($value, 0, 2);
    return $kwt;
}
