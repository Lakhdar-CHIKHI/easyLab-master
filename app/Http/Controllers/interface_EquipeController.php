<?php

namespace App\Http\Controllers;
use Illuminate\support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\equipeRequest;
use App\Parametre;
use App\Equipe;
use App\User;
use Auth;

class interface_EquipeController extends Controller
{
    public function index()
    {  
    $labo = Parametre::find('1'); 
    $equipes = Equipe::all();
     // $nbr = DB::table('users')
     //            ->groupBy('equipe_id')
     //            ->count('equipe_id');

    $nbr = DB::table('users')
             ->select( DB::raw('count(*) as total,equipe_id'))
             ->groupBy('equipe_id')
             ->get();
 
        return view('template.liste_equipes')->with([
            'equipes' => $equipes,
            'nbr' => $nbr,
            'labo'=>$labo,
        ]);;
    }
}
