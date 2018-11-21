<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\projetRequest;
use App\Projet;
use App\User;
use Auth;
use App\ProjetUser;
use App\Parametre;
use Illuminate\Http\UploadedFile;

class interface_AccueilController extends Controller
{
    public function index(){
        $projets = Projet::all();
        //$projets = Projet::orderBy('id','asc')->paginate(1);
        $labo =  Parametre::find('1');
        $membres = User::all();
        
        // $membres = Projet::find($id)->users()->orderBy('name')->get();

        return view('template.accueil' )->with(['projets' => $projets ,
                                                'labo'=>$labo,
                                                'membres'=>$membres,
                                                ]);
    	
    }
}
