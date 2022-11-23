<?php
// https://www.youtube.com/watch?v=uh-BD0ll1uI

namespace App\Helpers;

class Helper
{
    public static function IDGenerator($model, $tblrow, $length = 4, $prefix)
    {
        $data = $model::orderBy('id', 'desc')->first(); # get last inserted data
        if (!$data) {
            $_length = $length;
            $last_number = '';
        } else {
            $code = (int)(substr($data->$tblrow, strlen($prefix) + 1)); # get number
            $_last_number = ($code / 1) * 1;
            $increment_last_number = $_last_number + 1;
            $last_number_length = strlen($increment_last_number);
            $_length = $length - $last_number_length;
            $last_number = $increment_last_number;
        }
        $zeros = '';
        for ($i = 0; $i < $_length; $i++) {
            $zeros .= "0";
        }
        return $prefix . '-' . $zeros . $last_number;
    }
}