<?php

namespace App\Http\Controllers;
use App\Http\Requests\projetRequest;
use App\Projet;
use App\Article;
use App\ProjetUser;
use Illuminate\Support\Facades\Input;




use Illuminate\Support\Facades\Hash;
use Illuminate\support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Http\Requests\userRequest;
use App\Http\Requests\userEditRequest;
use App\Parametre;
use App\User;
use App\Equipe;
use App\Role;
use Auth;



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

    public function details($id)
    {
        $membre = User::find($id);
        $equipes = Equipe::all();
        $roles = Role::all();
        $labo = Parametre::find('1');


        return view('template.profil_member')->with([
            'membre' => $membre,
            'equipes' => $equipes,
            'roles' => $roles,
            'labo'=>$labo,
            
        ]);;
    } 

    



    

    




}
