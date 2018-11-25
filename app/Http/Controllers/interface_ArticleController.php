<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Article;
use App\User;
use Auth;
use App\ProjetUser;
use App\Parametre;
use Illuminate\Http\UploadedFile;
class interface_ArticleController extends Controller
{
    //
    public function index(){
        //$projets = Projet::all();
        $articles = Article::orderBy('id','asc')->paginate(1);
        //$labo =  Parametre::find('1');
        
        // $membres = Projet::find($id)->users()->orderBy('name')->get();

    	return view('template.articles' , ['articles' => $articles]);
    	
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
