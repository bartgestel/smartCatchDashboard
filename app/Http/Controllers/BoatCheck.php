<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Ship;
use App\Models\Haul;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class BoatCheck extends Controller
{
    public function boatCheck(){
        if(auth()->check()){
            //Get the boats of the company
            $user = Auth::id();
            $companyId = User::select('company_id')->where('id', $user)->get();
            $boats = Ship::where('company_id', $companyId[0]->company_id)->get();
            $weight = Company::select('caught_kg')->where('id', $companyId[0]->company_id)->get();
            return view('home', ['boats' => $boats, 'weight' => $weight]);
        }else{
            return redirect('/');
        }
    }

    public function getBoats(int $id){
        if(auth()->check()){
            $user = Auth::id();
            $company_id = User::select('company_id')->where('id', $user)->get();
            $boat = Ship::where("id", $id)->first();
            if($boat['company_id'] == $company_id[0]->company_id){
                $weight = 0;
                $catch = Haul::where('ship_id', $boat['id'])->orderBy('date', 'desc')->get();
                foreach ($catch as $kilo){
                    $weight = $weight+$kilo['weight'];
                }
                return view('boat', ['weight' => $weight, 'catch' => $catch, 'boat' => $boat]);
            }else{
                return redirect('/home');
            }
        }else{
            return redirect('/');
        }
    }

    public function weight(){
        $user = Auth::id();
        $company = User::select('company_id')->where('id', $user)->get();
        $boats = Ship::where('company_id', $company[0]->company_id)->get();
        $totalweight = 0;
        foreach($boats as $boat){

            $haulweight = Haul::where('ship_id', $boat->id)->get();
            foreach($haulweight as $weight){
                $totalweight = $totalweight+$weight['weight'];

            }
        }
        Company::where('id', $company[0]->company_id)->update(['caught_kg' => $totalweight]);
        return redirect('/home');
    }
}
