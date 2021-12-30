<?php

namespace App\Http\Controllers;

use App\Http\Requests\EarthRequest;
use App\Services\EarthService;
use Illuminate\Http\Request;

class EarthController extends Controller
{
    protected $initial;

    public function __construct(Request $request)
    {
        $this->initial = $request->initial;
    }

    public function earth()
    {
        $movements = EarthService::getMovements();

        $randomMovements = [];

        $j = 4 + rand(1, 3);

        for ($i = 0; $i < $j; $i++) {
            $randomMovements[] = $movements[array_rand($movements)];
        }

        return $randomMovements;
    }

    public function finalPosition(EarthRequest $request)
    {
        $validated = $request->validated();

        $movements = $this->getProcesedMovements($validated);

        return $this->returnSuccess($movements);
    }

    private function getProcesedMovements($validated)
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
