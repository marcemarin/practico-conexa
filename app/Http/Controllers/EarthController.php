<?php

namespace App\Http\Controllers;

use App\Helpers\EarthHelper;
use App\Http\Requests\EarthRequest;
use App\Services\EarthService;
use Illuminate\Http\Request;

class EarthController extends Controller
{
    public function earth()
    {
        $movements = EarthHelper::getMovements();

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

        $earthService = new EarthService($validated['initial']);

        $movements = $earthService->getProcesedMovements($validated);

        return $this->returnSuccess($movements);
    }
}
