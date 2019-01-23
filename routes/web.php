<?php

use App\User;
use App\These;
use App\Projet;
use App\Article;
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

Route::get('template/{id}/profil_member', 'interface_AccueilController@details');


//===================================== Routes des intefaces ===================================
Route::get('/template/apropos', 'interface_apropos@index');
Route::get('/template/contact', function () {
    return view('template.contact');
});

Route::post('send', 'interface_mailController@send');
//===================================== Routes des actualité ===================================
Route::get('/template/actualites','interface_actualite@index2');
Route::get('actualite/create','interface_actualite@create');
Route::get('actualites','interface_actualite@index');
Route::post('actualites','interface_actualite@store');
Route::delete('actualite/{id}','interface_actualite@destroy');
Route::put('actualite/{id}','interface_actualite@update');
Route::get('template/{id}/detail_actualite', 'interface_actualite@details');
//===================================== Routes des equipe ===================================
Route::get('/template/liste_equipes','interface_EquipeController@index');
Route::get('template/{id}/detail_equipe', 'interface_EquipeController@detail_equipe');
//===================================== Routes des Projet ===================================
Route::get('/template/projets','interface_ProjetController@index');
Route::get('/template/projets/search_projet','interface_ProjetController@search_projet');
Route::get('/template/projets/{acr_groupe}','interface_ProjetController@search_projet_filter_groupe');
Route::get('/template/projets/type/{type}','interface_ProjetController@search_projet_filter_type');
Route::get('template/{id}/detail_projet', 'interface_ProjetController@detail_projet');
//===================================== Routes des Article ===================================
Route::get('/template/articles','interface_ArticleController@index');
Route::get('/template/articles/search_article','interface_ArticleController@search_article');
Route::get('/template/articles/{acr_groupe}','interface_ArticleController@search_article_filter_groupe');
Route::get('/template/articles/type/{type}','interface_ArticleController@search_article_filter_type');
Route::get('template/{id}/detail_article', 'interface_ArticleController@details');
//===================================== Routes des Chart ===================================
Route::get('charts', 'ChartsController@index');
Route::get('charts/graph2', 'ChartsController@graph2');
Route::get('charts/graph3', 'ChartsController@graph3');



//======================================= FIN ==================================================

Route::get('dashboard', 'dashController@index');
Route::get('parametre', 'ParametreController@create');
Route::post('parametre', 'ParametreController@store');

Route::get('materiels', 'MaterielController@index');
//Route::get('materiels/user_mat/{id}/{mat}', 'MaterielController@rendreUser');
//Route::get('materiels/equipe_mat/{id}/{mat}', 'MaterielController@rendreEquipe');
Route::post('materiels/rendu_equipe', 'MaterielController@rendreEquipe');
Route::post('materiels/rendu_user', 'MaterielController@rendreUser');
Route::get('materiels/create', 'MaterielController@create');
Route::post('materiels', 'MaterielController@store');
Route::post('materiells', 'MaterielController@store2');
Route::post('materiels/affectations/membre', 'MaterielController@affecter_mat_membre');
Route::post('materiels/affectations/equipe', 'MaterielController@affecter_mat_equipe');
Route::get('materiels/supprimer/{id}','MaterielController@supprimerMateriel');
Route::post('materiels/historique','MaterielController@voirhistorique');
Route::post('materiels/modifier','MaterielController@modifierA');

//Route::post('materiels/quantite','MaterielController@quantite');
/*
Route::post('theses','TheseController@store')->middleware('thesecond');
Route::get('theses/{id}/details','TheseController@details');
Route::get('theses/{id}/edit','TheseController@edit');
Route::put('theses/{id}','TheseController@update');
Route::delete('theses/{id}','TheseController@destroy');
*/
Route::get('theses', 'TheseController@index');
Route::get('theses/create', 'TheseController@create');
Route::post('theses', 'TheseController@store')->middleware('thesecond');
Route::get('theses/{id}/details', 'TheseController@details');
Route::get('theses/{id}/edit', 'TheseController@edit');
Route::put('theses/{id}', 'TheseController@update');
Route::delete('theses/{id}', 'TheseController@destroy');

Route::get('articles', 'ArticleController@index');
Route::get('articles/create', 'ArticleController@create');
Route::post('articles', 'ArticleController@store');
Route::get('articles/{id}/details', 'ArticleController@details');
Route::get('articles/{id}/edit', 'ArticleController@edit');
Route::put('articles/{id}', 'ArticleController@update');
Route::delete('articles/{id}', 'ArticleController@destroy');

Route::get('membres', 'UserController@index');
Route::get('membres/create', 'UserController@create');
Route::post('membres', 'UserController@store');
Route::get('membres/{id}/details', 'UserController@details');
Route::get('trombinoscope', 'UserController@trombi');
Route::get('membres/{id}/edit', 'UserController@edit');
Route::put('membres/{id}', 'UserController@update');
Route::delete('membres/{id}', 'UserController@destroy');

Route::get('test', 'EquipeController@index');

Route::get('equipes', 'EquipeController@index');
Route::get('equipes/create', 'EquipeController@create');
Route::post('equipes', 'EquipeController@store');
Route::get('equipes/{id}/details', 'EquipeController@details');
Route::put('equipes/{id}', 'EquipeController@update');
Route::delete('equipes/{id}', 'EquipeController@destroy');

Route::get('projets', 'ProjetController@index');
Route::get('projets/create', 'ProjetController@create');
Route::post('projets', 'ProjetController@store');
Route::get('projets/{id}/details', 'ProjetController@details');
Route::get('projets/{id}/edit', 'ProjetController@edit');
Route::put('projets/{id}', 'ProjetController@update');
Route::delete('projets/{id}', 'ProjetController@destroy');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/statistics', function () {
    $year = date('Y');
    $a1 = DB::table('articles')->distinct('id')->where('annee', $year)->count();
    $a2 = DB::table('articles')->distinct('id')->where('annee', $year - 1)->count();
    $a3 = DB::table('articles')->distinct('id')->where('annee', $year - 2)->count();
    $a4 = DB::table('articles')->distinct('id')->where('annee', $year - 3)->count();
    $a5 = DB::table('articles')->distinct('id')->where('annee', $year - 4)->count();
    $a6 = DB::table('articles')->distinct('id')->where('annee', $year - 5)->count();
    $a7 = DB::table('articles')->distinct('id')->where('annee', $year - 6)->count();

    $b1 = DB::table('theses')->where(DB::raw("DATE_FORMAT(STR_TO_DATE(date_debut,'%m/%d/%Y'),'%Y')"), $year)->count();
    $b2 = DB::table('theses')->where(DB::raw("DATE_FORMAT(STR_TO_DATE(date_debut,'%m/%d/%Y'),'%Y')"), $year - 1)->count();
    $b3 = DB::table('theses')->where(DB::raw("DATE_FORMAT(STR_TO_DATE(date_debut,'%m/%d/%Y'),'%Y')"), $year - 2)->count();
    $b4 = DB::table('theses')->where(DB::raw("DATE_FORMAT(STR_TO_DATE(date_debut,'%m/%d/%Y'),'%Y')"), $year - 3)->count();
    $b5 = DB::table('theses')->where(DB::raw("DATE_FORMAT(STR_TO_DATE(date_debut,'%m/%d/%Y'),'%Y')"), $year - 4)->count();
    $b6 = DB::table('theses')->where(DB::raw("DATE_FORMAT(STR_TO_DATE(date_debut,'%m/%d/%Y'),'%Y')"), $year - 5)->count();
    $b7 = DB::table('theses')->where(DB::raw("DATE_FORMAT(STR_TO_DATE(date_debut,'%m/%d/%Y'),'%Y')"), $year - 6)->count();

    //$date = new Carbon( $these->date_debut );

    //$t1 = DB::table('theses')->distinct('id')->where(,$year)->count();

    $annee = [$year - 6, $year - 5, $year - 4, $year - 3, $year - 2, $year - 1, $year];
    $article = [$a7, $a6, $a5, $a4, $a3, $a2, $a1];
    $these = [$b7, $b6, $b5, $b4, $b3, $b2, $b1];

    return response()->json(['annee' => $annee,
                             'article' => $article,
                             'these' => $these,
                            ]);
});

Route::any('/search', function () {
    $labo = Parametre::find('1');
    $q = Input::get('q');
    $membres = User::where('name', 'LIKE', '%'.$q.'%')->orWhere('prenom', 'LIKE', '%'.$q.'%')->orWhere('email', 'LIKE', '%'.$q.'%')->get();
    $theses = These::where('titre', 'LIKE', '%'.$q.'%')->orWhere('sujet', 'LIKE', '%'.$q.'%')->get();
    $articles = Article::where('titre', 'LIKE', '%'.$q.'%')->orWhere('resume', 'LIKE', '%'.$q.'%')->orWhere('type', 'LIKE', '%'.$q.'%')->get();
    $projets = Projet::where('intitule', 'LIKE', '%'.$q.'%')->orWhere('resume', 'LIKE', '%'.$q.'%')->orWhere('type', 'LIKE', '%'.$q.'%')->get();
    $equipes = Equipe::where('intitule', 'LIKE', '%'.$q.'%')->orWhere('resume', 'LIKE', '%'.$q.'%')->orWhere('achronymes', 'LIKE', '%'.$q.'%')->get();

    // return view('search')->withDetails($user)->withQuery ( $q );
    return view('search')->with([
            'membres' => $membres,
            'theses' => $theses,
            'articles' => $articles,
            'projets' => $projets,
            'equipes' => $equipes,
            'labo' => $labo,
        ]);
});
