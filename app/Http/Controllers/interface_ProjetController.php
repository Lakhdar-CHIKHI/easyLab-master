<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\projetRequest;
use App\Projet;
use App\Equipe;
use App\User;
use Auth;
use App\ProjetUser;
use App\Parametre;
use Illuminate\Http\UploadedFile;
use Illuminate\support\Facades\DB;


class interface_ProjetController extends Controller
{
    public function index(){
        $equipes = Equipe::all();
        $projets = Projet::orderBy('id','asc')->paginate(9);
        $labo =  Parametre::find('1');

        
        // $membres = Projet::find($id)->users()->orderBy('name')->get();

    	return view('template.projets')->with([
            'projets' => $projets,
            'equipes'=>$equipes,
            'labo'=>$labo,
        ]);
    	
    }
    public function detail_projet($id)
    {
        $labo =  Parametre::find('1');
        $projet = Projet::find($id);
        $membres = Projet::find($id)->users()->orderBy('name')->get();
        $contacts = Projet::find($id)->contacts()->orderBy('nom')->get();
        return view('template.detail_projet')->with([
            'projet' => $projet,
            'membres'=>$membres,
            'contacts'=>$contacts,
            'labo'=>$labo,
        ]);;
    } 
    public function search_projet(Request $request){
        $equipes = Equipe::all();
        $projets=Projet::where('intitule', 'LIKE', '%'.$request->input('search').'%')->paginate(2);
        $labo =  Parametre::find('1');
        return view('template.projets')->with([
            'projets' => $projets,
            'equipes'=>$equipes,
            'labo'=>$labo,
        ]);
    }
    public function search_projet_filter_groupe( $acr_groupe){
        $equipes = Equipe::all();
        $labo =  Parametre::find('1');
        
            if ($acr_groupe!='tous') {
                $projets=DB::table('users')->select('projets.id','projets.intitule','projets.image_projet','projets.resume','projets.type')
                    ->distinct()
                    ->where('users.equipe_id','=',$acr_groupe)
                    ->where('deleted_at','=',null)
                    ->join('projet_user','users.id','=','projet_user.user_id')
                    ->join('projets','projets.id','=','projet_user.projet_id')
                ->paginate();
            }else {
                $projets = Projet::orderBy('id','asc')->paginate(9);
            }
           
        

        return view('template.projets')->with([
            'projets' => $projets,
            'equipes'=>$equipes,
            'labo'=>$labo,
        ]);
    }
    public function search_projet_filter_type($type){
        $equipes = Equipe::all();
        $labo =  Parametre::find('1');
        
            if ($type!='tous') {
                $projets=Projet::where('type', '=', $type)->paginate();
            }else {
                $projets = Projet::orderBy('id','asc')->paginate(9);
            }
           
        

        return view('template.projets')->with([
            'projets' => $projets,
            'equipes'=>$equipes,
            'labo'=>$labo,
        ]);
    }

}
