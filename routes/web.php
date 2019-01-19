<?php
use App\User;
use App\These;
use App\Projet;
use App\Article;
use App\Cntact;
use App\Partenaire;
use App\Stage;
use App\Equipe;
use App\Parametre;
use Illuminate\Support\Facades\Input;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});
//===================================== Routes des intefaces ===================================

Route::get('/template/accueil', 'interface_AccueilController@index');
/*
Route::get('/template/accueil', function () {
    return view('template.accueil');
});*/
Route::get('/template/actualites', function () {
    return view('template.actualites');
});
/*
Route::get('/template/apropos', function () {
    return view('template.apropos');
});*/

Route::get('/template/apropos', 'interface_apropos@index');
/*Route::get('/template/liste_equipes', function () {
    return view('template.liste_equipes');
});*/
Route::get('/template/liste_equipes','interface_EquipeController@index');

/*
Route::get('/template/projets', function () {
    return view('template.projets');
});*/
Route::get('/template/projets','interface_ProjetController@index');

Route::get('/template/profil_equipe', function () {
    return view('template.profil_equipe');
});
Route::get('template/{id}/profil_member', 'interface_AccueilController@details');
/*
Route::get('/template/profil_member', function () {
    return view('template.profil_member');
});*/
Route::get('/template/contact', function () {
    return view('template.contact');
});
Route::get('/template/detail_actualite', function () {
    return view('template.detail_actualite');
});

Route::get('template/{id}/detail_projet', 'interface_AccueilController@detail_projet');
/*Route::get('/template/detail_projet', function () {
    return view('template.detail_projet');
});*/

Route::get('template/{id}/detail_equipe', 'interface_AccueilController@detail_equipe');
/*Route::get('/template/detail_projet', function () {
    return view('template.detail_projet');
});*/


/*    partenaires        */

Route::get('partenaires','PartenaireController@index');
Route::get('partenaires/create','PartenaireController@create');
Route::post('partenaires','PartenaireController@store');
Route::get('partenaires/{id}/details','PartenaireController@details');
Route::put('partenaires/{id}','PartenaireController@update');
Route::delete('partenaires/{id}','PartenaireController@destroy');

/*      contacts      */

Route::get('contacts','ContactController@index');
Route::get('contacts/create','ContactController@create');
Route::post('contacts','ContactController@store');
Route::get('contacts/{id}/details','ContactController@details');
Route::get('trombinoscopecontacts','ContactController@trombi');
Route::get('contacts/{id}/edit','ContactController@edit');
Route::put('contacts/{id}','ContactController@update');
Route::delete('contacts/{id}','ContactController@destroy');


/*  Stage      */

Route::get('stages','StageController@index');
Route::get('stages/create','StageController@create');
Route::post('stages/date','StageController@selectmembre');
Route::post('stages','StageController@store');
Route::get('stages/{id}/details','StageController@details');
Route::get('stages/{id}/edit','StageController@edit');
Route::put('stages/{id}','StageController@update');
Route::delete('stages/{id}','StageController@destroy');
/* dans create */

Route::get('projets/createpop','ContactController@createpop');
Route::post('projets/storepop','ContactController@storepop');
Route::post('projets/storepopP','PartenaireController@storepopP');

Route::get('articles/createpop','ContactController@createpop');
Route::post('articles/storepop','ContactController@storepop');
Route::post('articles/storepopP','PartenaireController@storepopP');

Route::get('stages/createpop','ContactController@createpop');
Route::post('stages/storepop','ContactController@storepop');
Route::post('stages/storepopP','PartenaireController@storepopP');


Route::post('contacts/storepopP','PartenaireController@storepopP');
/*    dans edit  */
Route::get('projets/{id}/createpop','ContactController@createpop');
Route::post('projets/{id}/storepop','ContactController@storepop');
Route::post('projets/{id}/storepopP','PartenaireController@storepopP');

Route::get('articles/{id}/createpop','ContactController@createpop');
Route::post('articles/{id}/storepop','ContactController@storepop');
Route::post('articles/{id}/storepopP','PartenaireController@storepopP');

Route::get('stages/{id}/createpop','ContactController@createpop');
Route::post('stages/{id}/storepop','ContactController@storepop');
Route::post('stages/{id}/storepopP','PartenaireController@storepopP');

Route::post('stages/{id}/date','StageController@selectmembre');
Route::post('contacts/{id}/storepopP','PartenaireController@storepopP');











//======================================= FIN ==================================================



Route::get('dashboard','dashController@index');
Route::get('parametre','ParametreController@create');
Route::post('parametre','ParametreController@store');

Route::get('theses','TheseController@index');
Route::get('theses/create','TheseController@create');
Route::post('theses','TheseController@store')->middleware('thesecond');
Route::get('theses/{id}/details','TheseController@details');
Route::get('theses/{id}/edit','TheseController@edit');
Route::put('theses/{id}','TheseController@update');
Route::delete('theses/{id}','TheseController@destroy');

Route::get('articles','ArticleController@index');
Route::get('articles/create','ArticleController@create');
Route::post('articles','ArticleController@store');
Route::get('articles/{id}/details','ArticleController@details');
Route::get('articles/{id}/edit','ArticleController@edit');
Route::put('articles/{id}','ArticleController@update');
Route::delete('articles/{id}','ArticleController@destroy');

Route::get('membres','UserController@index');
Route::get('membres/create','UserController@create');
Route::post('membres','UserController@store');
Route::get('membres/{id}/details','UserController@details');
Route::get('trombinoscope','UserController@trombi');
Route::get('membres/{id}/edit','UserController@edit');
Route::put('membres/{id}','UserController@update');
Route::delete('membres/{id}','UserController@destroy');


Route::get('test','EquipeController@index');

Route::get('equipes','EquipeController@index');
Route::get('equipes/create','EquipeController@create');
Route::post('equipes','EquipeController@store');
Route::get('equipes/{id}/details','EquipeController@details');
Route::put('equipes/{id}','EquipeController@update');
Route::delete('equipes/{id}','EquipeController@destroy');

Route::get('projets','ProjetController@index');
Route::get('projets/create','ProjetController@create');
Route::post('projets','ProjetController@store');
Route::get('projets/{id}/details','ProjetController@details');
Route::get('projets/{id}/edit','ProjetController@edit');
Route::put('projets/{id}','ProjetController@update');
Route::delete('projets/{id}','ProjetController@destroy');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/statistics',function(){

	$year = date('Y');
	 $a1 = DB::table('articles')->distinct('id')->where('annee',$year)->count();
	 $a2 = DB::table('articles')->distinct('id')->where('annee',$year-1)->count();
	 $a3 = DB::table('articles')->distinct('id')->where('annee',$year-2)->count();
	 $a4 = DB::table('articles')->distinct('id')->where('annee',$year-3)->count();
	 $a5 = DB::table('articles')->distinct('id')->where('annee',$year-4)->count();
	 $a6 = DB::table('articles')->distinct('id')->where('annee',$year-5)->count();
	 $a7 = DB::table('articles')->distinct('id')->where('annee',$year-6)->count();

	 $b1 = DB::table('theses')->where(DB::raw("DATE_FORMAT(STR_TO_DATE(date_debut,'%m/%d/%Y'),'%Y')"),$year)->count();
	 $b2 = DB::table('theses')->where(DB::raw("DATE_FORMAT(STR_TO_DATE(date_debut,'%m/%d/%Y'),'%Y')"),$year-1)->count();
	 $b3 = DB::table('theses')->where(DB::raw("DATE_FORMAT(STR_TO_DATE(date_debut,'%m/%d/%Y'),'%Y')"),$year-2)->count();
	 $b4 = DB::table('theses')->where(DB::raw("DATE_FORMAT(STR_TO_DATE(date_debut,'%m/%d/%Y'),'%Y')"),$year-3)->count();
	 $b5 = DB::table('theses')->where(DB::raw("DATE_FORMAT(STR_TO_DATE(date_debut,'%m/%d/%Y'),'%Y')"),$year-4)->count();
	 $b6 = DB::table('theses')->where(DB::raw("DATE_FORMAT(STR_TO_DATE(date_debut,'%m/%d/%Y'),'%Y')"),$year-5)->count();
	 $b7 = DB::table('theses')->where(DB::raw("DATE_FORMAT(STR_TO_DATE(date_debut,'%m/%d/%Y'),'%Y')"),$year-6)->count();

	 //$date = new Carbon( $these->date_debut );  

	 //$t1 = DB::table('theses')->distinct('id')->where(,$year)->count();

    $annee = [$year-6,$year-5,$year-4,$year-3,$year-2,$year-1,$year];
    $article = [$a7, $a6, $a5,$a4,$a3,$a2,$a1];
    $these = [$b7, $b6, $b5,$b4,$b3,$b2,$b1];
  
	return response()->json(["annee"=>$annee,
							 "article"=> $article,
							 "these"=> $these
							]);
});

Route::any('/search',function(){

	$labo = Parametre::find('1'); 
    $q = Input::get ( 'q' );
    $membres = User::where('name','LIKE','%'.$q.'%')->orWhere('prenom','LIKE','%'.$q.'%')->orWhere('email','LIKE','%'.$q.'%')->get();
    $theses = These::where('titre','LIKE','%'.$q.'%')->orWhere('sujet','LIKE','%'.$q.'%')->get();
    $articles = Article::where('titre','LIKE','%'.$q.'%')->orWhere('resume','LIKE','%'.$q.'%')->orWhere('type','LIKE','%'.$q.'%')->get();
    $projets = Projet::where('intitule','LIKE','%'.$q.'%')->orWhere('resume','LIKE','%'.$q.'%')->orWhere('type','LIKE','%'.$q.'%')->get();
    $equipes = Equipe::where('intitule','LIKE','%'.$q.'%')->orWhere('resume','LIKE','%'.$q.'%')->orWhere('achronymes','LIKE','%'.$q.'%')->get();

        // return view('search')->withDetails($user)->withQuery ( $q );
        return view('search')->with([
            'membres' => $membres,
            'theses' => $theses,
            'articles' => $articles,
            'projets' => $projets,
            'equipes' => $equipes,
            'labo'=>$labo,
            
        ]);;

});
