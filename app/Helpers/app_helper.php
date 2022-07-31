<?php

function set_number($number)
{
    $num = intval(preg_replace("/[^0-9]/", "", $number));

    return $num;
}

function set_periode($tanggal)
{
    $periode = date('Y', strtotime($tanggal)) . '' . date('m', strtotime($tanggal));

    return $periode;
}
