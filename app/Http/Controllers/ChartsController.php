<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;
use App\Parametre;
use App\Article;
use App\Projet;
use App\These;
use App\User;
use App\Equipe;

class ChartsController extends Controller
{
    function index(Request $request){
                                    $equipes2=Equipe::all();
                                    $dates=Article::select('annee')->orderBy('annee','asc')->distinct()->get();
                                    //$date=date('Y');
                                    foreach ($equipes2 as $equipe) {
                                        foreach ($dates as $date ) {
                                            $equipes[$equipe->intitule][$date->annee]=DB::table('equipes')->select('equipes.intitule','articles.titre','articles.annee')
                                        ->distinct()
                                        ->where('articles.annee','=',$date->annee)
                                        ->where('equipes.intitule','=',$equipe->intitule)
                                        ->join('users','equipes.id','=','users.equipe_id')
                                        ->join('article_user','article_user.user_id','=','users.id')
                                        ->join('articles','article_user.article_id','=','articles.id')->get()->count();

                                        }
                                        
                                    }
                   
            $equipes['date']=$dates;
            return $equipes;
    }
    function graph_projets(){
        $equipes2=Equipe::all();
        $dates=Projet::select(DB::raw('YEAR(created_at) annee'))->orderBy('annee','asc')->distinct()->get();
        //$date=date('Y');
        foreach ($equipes2 as $equipe) {
            foreach ($dates as $date ) {
                $equipes[$equipe->intitule][$date->annee]=DB::table('equipes')->select('equipes.intitule','projets.intitule','projets.created_at')
            ->distinct()
            ->where(DB::raw("YEAR(projets.created_at)"),'=',$date->annee)
            ->where('equipes.intitule','=',$equipe->intitule)
            ->join('users','equipes.id','=','users.equipe_id')
            ->join('projet_user','projet_user.user_id','=','users.id')
            ->join('projets','projet_user.projet_id','=','projets.id')->get()->count();

            }
            
        }

$equipes['date']=$dates;
return $equipes;
}
    function graph2(Request $request){
        $articles=Article::select('type')->distinct()->get();
        $dates=Article::select('annee')->orderBy('annee','asc')->distinct()->get();

        foreach ($articles as $article) {
            foreach ($dates as $date) {
                $result[$article->type][$date->annee]=DB::table('articles')->select('annee')
                ->whereNull('articles.deleted_at')
                ->where('articles.type','=',$article->type)
                ->where('articles.annee','=',$date->annee)->get()->count();
            }
            
        }
    
        return json_encode($result);
    }

    function graph3(){
        //$dates=DB::select("SELECT date_debut AS a from theses UNION SELECT date_soutenance as a FROM theses WHERE date_soutenance is NOT null");
        $dates=date('Y');
        $theses=These::all();
           /* foreach ($dates as $date) {
                $result[$date->a]=DB::table('theses')
                ->whereNull('theses.deleted_at')
                ->where('theses.date_debut','<=',$date->a)
                ->orwhere('theses.date_soutenance','>=',$date->a)->get()->count();
            }*/
            $i=0;
            
            while ($i < 10) {
                $j=0;
                $k=0;
                
                foreach ($theses as $these) {
                    if (isset($these->date_soutenance)) {
                        /*if ((date('Y',strtotime($these->date_debut))<=$dates-$i)&&((date('Y',strtotime($these->date_soutenance))>=$dates-$i))) {
                            $result['encours'][$dates-$i]=++$j;
                        } else{
                            $result['encours'][$dates-$i]=0;
                            
                        }*/
                        if ((date('Y',strtotime($these->date_soutenance))==$dates-$i)) {
                            $result['sout'][$dates-$i]=++$k;
                        }else{
                            $result['sout'][$dates-$i]=0;
                        }
                    }else{
                        if ((date('Y',strtotime($these->date_debut))<=$dates-$i)) {
                            $result['encours'][$dates-$i]=++$j;
                        }else{
                            $result['encours'][$dates-$i]=$j;
                        }
                    }
                    
                    /*$result[$dates-$i]=DB::table('theses')
                    ->whereNull('theses.deleted_at')
                    ->where(DB::raw("DATE_FORMAT(STR_TO_DATE(date_debut,'%m/%d/%Y'),'%Y')"),'<=',$dates-$i)
                    ->where(DB::raw("DATE_FORMAT(STR_TO_DATE(date_soutenance,'%m/%d/%Y'),'%Y')"),'>=',$dates-$i)->get()->count();*/
                }

                $i++;
            }
            $c=9;
            $result['date']=array($dates-$c--,$dates-$c--,$dates-$c--,$dates-$c--,$dates-$c--,$dates-$c--,$dates-$c--,$dates-$c--,$dates-$c--,$dates-$c--);
        return json_encode($result);
    }
    

    function graph_equipe(Request $request){
        $dates=date('Y');
        $membres=Equipe::find($request->id)->membres;
        $theses=array();
        
        foreach ($membres as  $membre) {
            if ($membre->these) {
                //array_push($theses, $membre->these);
                $theses[$membre->id]=$membre->these;
            }
            
        }
       
        //return json_encode($theses);
            
           $i=0;
            
            while ($i < 10) {
                $j=0;
                $k=0;
                
                foreach ($theses as $these) {
                    
                    if (isset($these->date_soutenance)) {
                        /*if ((date('Y',strtotime($these->date_debut))<=$dates-$i)&&((date('Y',strtotime($these->date_soutenance))>=$dates-$i))) {
                            $result['encours'][$dates-$i]=++$j;
                        } else{
                            $result['encours'][$dates-$i]=0;
                            
                        }*/
                        if ((date('Y',strtotime($these->date_soutenance))==$dates-$i)) {
                            $result['sout'][$dates-$i]=++$k;
                        }else{
                            $result['sout'][$dates-$i]=0;
                        }
                    }else{
                        if ((date('Y',strtotime($these->date_debut))<=$dates-$i)) {
                            $result['encours'][$dates-$i]=++$j;
                        }else{
                            $result['encours'][$dates-$i]=$j;
                        }
                    }
                    
                    /*$result[$dates-$i]=DB::table('theses')
                    ->whereNull('theses.deleted_at')
                    ->where(DB::raw("DATE_FORMAT(STR_TO_DATE(date_debut,'%m/%d/%Y'),'%Y')"),'<=',$dates-$i)
                    ->where(DB::raw("DATE_FORMAT(STR_TO_DATE(date_soutenance,'%m/%d/%Y'),'%Y')"),'>=',$dates-$i)->get()->count();*/
                }

                $i++;
            }
            $c=9;
            $result['date']=array($dates-$c--,$dates-$c--,$dates-$c--,$dates-$c--,$dates-$c--,$dates-$c--,$dates-$c--,$dates-$c--,$dates-$c--,$dates-$c--);
        return json_encode($result);
    }
    function graph_equipe2(Request $request){
        $articles=DB::select("SELECT DISTINCT(articles.id) as id1,articles.type as types from article_user inner join articles 
      on articles.id=article_user.article_id
       inner join users on article_user.user_id=users.id
       where users.equipe_id=$request->idd 
      ");
      
        $dates=Article::select('annee')->orderBy('annee','asc')->distinct()->get();

        foreach ($articles as $article) {
            foreach ($dates as $date) {
                $result[$article->types][$date->annee]=DB::table('articles')->select('annee')
                ->whereNull('articles.deleted_at')
                ->where('articles.type','=',$article->types)
                ->where('articles.annee','=',$date->annee)->get()->count();
            }
            
        }
    
        return json_encode($result);
    }
}

    
