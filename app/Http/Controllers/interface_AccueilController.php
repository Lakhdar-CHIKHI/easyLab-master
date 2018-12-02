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
                
            }else  if ($type_pub =="Articles") {
                $articles = Article::where('type','LIKE','%'.$type_pub_detail.'%')->Where('titre','LIKE','%'.$nom.'%')->paginate(1);
            //$projets->setPath('custom/url');
                $articles->appends(array('choix_pub'=>Input::get('type_pub'),'choix_pub_detail'=>Input::get('type_pub_detail'),'nom'=>Input::get('nom2')));
               /*  return view('template.projets')->with([
                'projets' => $projets,
            ]); */
            return View('template.articles')->with('articles',$articles);
                
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
                        
                    }else if ($type_pub =="Articles") {
                        $articles = Article::where('type','LIKE','%'.$type_pub_detail.'%')->Where('titre','LIKE','%'.$nom.'%')->paginate(1);
                    //$projets->setPath('custom/url');
                        $articles->appends(array('type_pub'=>Input::get('choix_pub'),'type_pub_detail'=>Input::get('choix_pub_detail'),'nom2'=>Input::get('nom')));
                    /*  return view('template.projets')->with([
                        'projets' => $projets,
                    ]); */
                    return View('template.articles')->with('articles',$articles);
                        
                    }
    }
}

    public function detail_equipe($id)
    {
        $labo =  Parametre::find('1');
        $equipe = equipe::find($id);
        $membres = equipe::find($id)->membres()->orderBy('name')->get();
        $projets = [];
        $articles = [];
        foreach ($membres as $membre){
            $tmp =$membre->projets()->orderBy('intitule')->get();
            foreach ($tmp as $projet) {
                array_push($projets,$projet);
            }
            }
           
        foreach ($membres as $membre){
            $tmp =$membre->articles()->orderBy('titre')->get();
            foreach ($tmp as $article) {
               /* $objet = [];
                $objet['id']=$article->id;
                $objet['type']=$article->type;
                $objet['titre']=$article->titre;
                $objet['resume']=$article->resume;
                $articles[$i++]=$objet;
                */
                array_push($articles,$article);
            }
          }
        
          
          //$articles = array_unique($articles,SORT_REGULAR);
          //$articles = (array) $articles;
          //var_dump($articles);
          
        
        return view('template.detail_equipe')->with([
            'equipe' => $equipe,
            'membres'=>$membres,
            'labo'=>$labo,
            'projets'=>$projets,
            'articles'=>$articles,
        ]);;
    } 




}
