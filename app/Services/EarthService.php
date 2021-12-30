<?php

namespace App\Services;


class EarthService
{
    public static function getMovements()
    {
        return  array("Down", "Rigth", "Left", "Up");
    }
}
