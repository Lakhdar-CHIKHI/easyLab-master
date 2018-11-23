<?php

namespace App\Http\Controllers;
use App\Http\Requests\projetRequest;
use App\Projet;
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

    public function detail_projet($id)
    {
        $labo =  Parametre::find('1');
        $projet = Projet::find($id);
        $membres = Projet::find($id)->users()->orderBy('name')->get();

        return view('template.detail_projet')->with([
            'projet' => $projet,
            'membres'=>$membres,
            'labo'=>$labo,
        ]);;
    } 


    public function chercher(Request $request)
    {   
        if (Input::get ( 'nom2' ) || Input::get( 'nom2' )=="") {
            //echo Input::get ( 'nom2' );
            $type_pub = Input::get ( 'type_pub' );
            $type_pub_detail = Input::get ( 'type_pub_detail' );
            $nom = Input::get ( 'nom2' );
            
            if ($type_pub =="Projets") {
                $projets = Projet::where('type','LIKE','%'.$type_pub_detail.'%')->Where('intitule','LIKE','%'.$nom.'%')->paginate(1);
            //$projets->setPath('custom/url');
                $projets->appends(array('choix_pub'=>Input::get('type_pub'),'choix_pub_detail'=>Input::get('type_pub_detail'),'nom'=>Input::get('nom2')));
               /*  return view('template.projets')->with([
                'projets' => $projets,
            ]); */
            return View('template.projets')->with('projets',$projets);
                
            }
        }
        if (Input::get( 'nom' ) || Input::get( 'nom' )=="") {
            $type_pub = Input::get ( 'choix_pub' );
            $type_pub_detail = Input::get ( 'choix_pub_detail' );
            $nom = Input::get ( 'nom' );
        if ($type_pub =="Projets") {
            $projets = Projet::where('type','LIKE','%'.$type_pub_detail.'%')->Where('intitule','LIKE','%'.$nom.'%')->paginate(1);
        //$projets->setPath('custom/url');
            $projets->appends(array('type_pub'=>Input::get('choix_pub'),'type_pub_detail'=>Input::get('choix_pub_detail'),'nom2'=>Input::get('nom')));
           /*  return view('template.projets')->with([
            'projets' => $projets,
        ]); */
        return View('template.projets')->with('projets',$projets);
            
        }}
}

}
