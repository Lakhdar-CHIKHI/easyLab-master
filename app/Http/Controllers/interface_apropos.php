<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\projetRequest;
use App\Projet;
use App\User;
use App\Equipe;
use Auth;
use App\ProjetUser;
use App\Parametre;
use Illuminate\Http\UploadedFile;
use Illuminate\support\Facades\DB;

class interface_apropos extends Controller
{
    public function index(){
        $projets = Projet::all();
        $membres = User::all();
        //$projets = Projet::orderBy('id','asc')->paginate(1);
        //$labo =  Parametre::find('1');
       // $membres = DB::table('users')->distinct('id')->orderBy('name')->get(); 

        $equipes = Equipe::all();
        
        // $membres = Projet::find($id)->users()->orderBy('name')->get();

    	return view('template.apropos' )->with([
            'membres' => $membres,
            'equipes' => $equipes,
            'projets' => $projets,
            
        ]);;
    	
    }
}
