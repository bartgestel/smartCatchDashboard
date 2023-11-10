<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ship;
use App\Models\Haul;

class BoatCheck extends Controller
{
    public function boatCheck(){
        $boats = [];
        if(auth()->check()){
            $company = auth()->user()->first()->company_id;
            $boats = Ship::where('company_id', $company)->get();
        }
        return view('home', ['boats' => $boats]);
    }

    public function getBoats(int $id){
        if(auth()->check()){
            $company_id = auth()->user()->first()->id;
            $boat = Ship::where("id", $id)->first();
            if($boat['company_id'] == $company_id){
                $weight = 0;
                $catch = Haul::where('ship_id', $boat['id'])->get();
                foreach ($catch as $kilo){
                    $weight = $weight+$kilo['weight'];
                }
                return view('boat', ['weight' => $weight, 'catch' => $catch, 'boat' => $boat]);
            }else{
                echo "test nee";
            }
        }
    }
}
