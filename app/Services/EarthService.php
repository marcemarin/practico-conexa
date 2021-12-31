<?php

namespace App\Services;

class EarthService
{
    private $initial;

    public function __construct($initial)
    {
        $this->initial = $initial;
    }

    public function getProcesedMovements($validated)
    {
        return  array_map(function ($item) {
            return ["type" => $item, "movement" => match ($item) {
                "Down" => $this->initial[0] == 2 ? $this->initial : [$this->initial[0] += 1, $this->initial[1]],
                "Up" => $this->initial[0] == 0 ? $this->initial : [$this->initial[0] -= 1, $this->initial[1]],
                "Rigth" => $this->initial[1] == 2 ? $this->initial : [$this->initial[0], $this->initial[1] += 1],
                "Left" => $this->initial[1] == 0 ?  $this->initial : [$this->initial[0], $this->initial[1] -= 1]
            }];
        }, $validated['items']);
    }
}
