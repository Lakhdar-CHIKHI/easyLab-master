<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Equipe;
use App\Article;
use App\User;
use Auth;
use App\ProjetUser;
use App\Parametre;
use Illuminate\Http\UploadedFile;
use Illuminate\support\Facades\DB;
//use Illuminate\Database\Eloquent\Builder;
class interface_ArticleController extends Controller
{
    //
    public function index(){

        $equipes = Equipe::all();
        $articles = Article::orderBy('id','asc')->paginate(9);
        $labo =  Parametre::find('1');

        
        // $membres = Projet::find($id)->users()->orderBy('name')->get();

    	return view('template.articles' )->with([
            'articles' => $articles,
            'equipes'=>$equipes,
            'labo'=>$labo,
        ]);
    	
    }
    public function search_article(Request $request){
        $equipes = Equipe::all();
        $articles=Article::where('titre', 'LIKE', '%'.$request->input('search').'%')->paginate(2);
        $labo =  Parametre::find('1');
        return view('template.articles')->with([
            'articles' => $articles,
            'equipes'=>$equipes,
            'labo'=>$labo,
        ]);
    }
    public function search_article_filter_groupe( $acr_groupe){
        $equipes = Equipe::all();
        $labo =  Parametre::find('1');
        
            if ($acr_groupe!='tous') {
                $articles=DB::table('users')->select('articles.id','articles.titre','articles.image','articles.resume','articles.type','articles.annee','articles.mois')
                ->distinct()
                ->where('users.equipe_id','=',$acr_groupe)
                ->join('article_user','users.id','=','article_user.user_id')
                ->join('articles','articles.id','=','article_user.article_id')
                ->paginate();
            }else {
                $articles = Article::orderBy('id','asc')->paginate(9);
            }
           
        

        return view('template.articles')->with([
            'articles' => $articles,
            'equipes'=>$equipes,
            'labo'=>$labo,
        ]);
    }
    public function search_article_filter_type($type){
        $equipes = Equipe::all();
        $labo =  Parametre::find('1');
        
            if ($type!='tous') {
                $articles=Article::where('type', '=', $type)->paginate();
            }else {
                $articles = Article::orderBy('id','asc')->paginate(9);
            }
           
        

        return view('template.articles')->with([
            'articles' => $articles,
            'equipes'=>$equipes,
            'labo'=>$labo,
        ]);
    }
    

    public function details($id)
    {
    	//$labo = Parametre::find('1');
         $article = Article::find($id);
       //  $type = 
        $membres = Article::find($id)->users()->orderBy('name')->get();
     

	 	//return view('article.details')->with([
			return view('template.detail_article')->with([
	 		'article' => $article,
	 		'membres'=>$membres,
	 		//'labo'=>$labo,
	 	]);;
    }

    
}
