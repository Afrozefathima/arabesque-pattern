<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Pail\File;

class CarController extends Controller
{
    public function index()
    {
        $jsonPath = public_path('car-data.json');

        if(!file_exists($jsonPath)) {
            abort(404, 'Car data not found');
        }

        $jsonContent = file_get_contents($jsonPath);
        $cars = json_decode($jsonContent, true);

        $makes = collect($cars)
                ->groupBy('make')
                ->map(function ($cars, $make) {
                    return [
                        'name'=>$make,
                        'img'=> $cars->first()['img']??null,
                        'count'=>$cars->count()
                    ];
                })
                ->sortBy('name')
                ->values();

        return view('find-parts-index', ['makes'=> $makes]);
    }
    public function findByMake($make)
    {
        $jsonPath = public_path('car-data.json');

        if(!file_exists($jsonPath)) {
            abort(404, 'car data not found');
        }

        $jsonContent = file_get_contents($jsonPath);
        $cars = json_decode($jsonContent, true);

        $filteredCars = collect($cars)->filter(function($car) use ($make){
            return strtolower($car['make']) === strtolower($make);
        })->values();

        if($filteredCars->isEmpty()) {
            abort(404, "No cars found for make: {$make}");
        }

        return view('find-parts',[
            'make'=>ucfirst($make),
            'cars'=>$filteredCars
        ]);
    }
}
