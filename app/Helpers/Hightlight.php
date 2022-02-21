<?php

namespace App\Helpers;


class Hightlight
{
    public static function show($input, $paramsSearch, $field) // name
    {
        if($paramsSearch['value'] == "") return $input;
        if($paramsSearch['field'] == "all" || $paramsSearch['field'] == $field) {
            return preg_replace("/".preg_quote($paramsSearch['value'], "/")."/i", "<span class='highlight'>$0</span>", $input);
        }
        return $input;

    }
    public static function showFrontEnd($input, $paramsSearch) // name
    {
        
        $result = $input;
        if ($paramsSearch != '') {
            $result = preg_replace("/" . preg_quote($paramsSearch, "/") . "/i", "<p class='text-warning'>$0</p>", $input);
        }
        return $result;

    }
}