<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EarthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function earth()
    {
        $movements = $this->getMovements();

        $randomMovements = [];

        $j = 4 + rand(1, 3);

        for ($i = 0; $i < $j; $i++) {
            $randomMovements[] = $movements[array_rand($movements)];
        }

        return $randomMovements;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function finalPosition(Request $request)
    {
        $validated = $this->validateData($request);

        $initial = $validated['initial'];

        $items = $validated['items'];

        dump("Initial -> " . $initial[0] . ":" . $initial[1]);        

        if ($initial[0] < 0 || $initial[0] > 2 || $initial[1] < 0 || $initial[1] > 2) {
            return $this->returnError("Invalid params", 406);
        }

        $movements = [];

        foreach ($items as $item) {

            if ($item == "Down") {
                if ($initial[0] < 2) {
                    $movements[] =  ["type" => $item, "movement" => [$initial[0] += 1, $initial[1]]];
                } elseif ($initial[0] == 2) {
                    $movements[] = ["type" => $item, "movement" => [$initial[0], $initial[1]]];
                }
            }

            if ($item == "Up") {
                if ($initial[0] > 0) {
                    $movements[] =  ["type" =>  $item, "movement" => [$initial[0] -= 1, $initial[1]]];
                } elseif ($initial[0] == 0) {
                    $movements[] = ["type" =>  $item, "movement" => [$initial[0], $initial[1]]];
                }
            }

            if ($item == "Rigth") {
                if ($initial[1] < 2) {
                    $movements[] =  ["type" =>  $item, "movement" => [$initial[0], $initial[1] += 1]];
                } elseif ($initial[1] == 2) {
                    $movements[] =  ["type" =>  $item, "movement" => [$initial[0], $initial[1]]];
                }
            }

            if ($item == "Left") {
                if ($initial[1] > 0) {
                    $movements[] =  ["type" =>  $item, "movement" => [$initial[0], $initial[1] -= 1]];
                } elseif ($initial[1] == 0) {
                    $movements[] =  ["type" =>  $item, "movement" => [$initial[0], $initial[1]]];
                }
            }
        }

        foreach ($movements as $movement) {
            dump($movement['type'] . " -> " . $movement['movement'][0] . ":" . $movement['movement'][1]);
        }

        //return $this->returnSuccess();
    }

    private function validateData(Request $request)
    {
        return  $request->validate([
            'initial' => [
                'required',
                'array',
                Rule::in([0, 1, 2]),
            ],
            'items' => [
                'required',
                'array',
                Rule::in($this->getMovements()),
            ],
        ]);
    }

    private function getMovements()
    {
        return  array("Down", "Rigth", "Left", "Up");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
