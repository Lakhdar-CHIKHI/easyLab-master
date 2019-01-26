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
    public function detail_equipe($id)
    {
        $labo =  Parametre::find('1');
        $equipe = equipe::find($id);
        $membres = equipe::find($id)->membres()->orderBy('name')->get();
        $articles=DB::table('users')->select('articles.id','articles.titre','articles.resume','articles.type','articles.annee','articles.mois')
                    ->distinct()
                    ->where('users.equipe_id','=',$equipe->id)
                    ->join('article_user','users.id','=','article_user.user_id')
                    ->join('articles','articles.id','=','article_user.article_id')
                    ->get();

         $projets=DB::table('users')->select('projets.id','projets.intitule','projets.resume','projets.type')
                    ->distinct()
                    ->where('users.equipe_id','=',$equipe->id)
                    ->join('projet_user','users.id','=','projet_user.user_id')
                    ->join('projets','projets.id','=','projet_user.projet_id')
                    ->get();
       
       
        
          
        
        return view('template.detail_equipe')->with([
            'equipe' => $equipe,
            'membres'=>$membres,
            'labo'=>$labo,
            'projets'=>$projets,
            'articles'=>$articles,
            
        ]);
    } 
}
