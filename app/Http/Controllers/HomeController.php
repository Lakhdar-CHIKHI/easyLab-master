<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;
use App\Parametre;
use App\Article;
use App\User;
use App\Equipe;
use Khill\Lavacharts\Laravel\LavachartsFacade as Lava;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $labo = Parametre::find('1');
        $membres = DB::table('users')->distinct('id')->count();
    $equipes = DB::table('equipes')->distinct('id')->count();
    $articles = DB::table('articles')->distinct('id')->count();
    $theses = DB::table('theses')->distinct('id')->where('date_soutenance',null)->count();

         $lava=new Lava;
    $data = $lava::DataTable();
    $data2 = $lava::DataTable();
    $data3 = $lava::DataTable();
    $articles2= Article::select('type')->selectRaw("count(*) AS count")->groupBy('type')->get()->toArray();
    //$membres2= DB::table('users')->join('equipes', 'equipes.id', '=', 'users.equipe_id')->select('intitule')->selectRaw("count(*) AS count")->groupBy('intitule')->get();
        
    $membres2=Equipe::all();


        $data->addStringColumn('Reasons')
             ->addNumberColumn('Percent');
        foreach ($articles2 as $article) {
           
           $data->addRow([$article['type'],$article['count']]);
        }
       
        $data2->addStringColumn('Reasons')
             ->addNumberColumn('Percent');
        foreach ($membres2 as $membre) {
            $data2->addRow([$membre->intitule,$membre->membres()->count()]);
        }
     
        $lava::PieChart('IMDB', $data, [
        'title'  => 'Nombre de publication par type ( LRIT )',
        'width'      => 600,
        'height'=>300,
        'is3D'   => true,
        'slices' => [
            ['offset' => 0.2],
            ['offset' => 0.3],
            ['offset' => 0.3],
            ['offset' => 0.3],
            ['offset' => 0.3],
            ['offset' => 0.2]
            
        ]
        ]);
        $lava::PieChart('IMDB2', $data2, [
            'title'  => 'Nombre de membre par équipe ( LRIT )',
            'width'      => 600,
            'height'=>300,
            'is3D'   => true,
            'slices' => [
                ['offset' => 0.2],
                ['offset' => 0.3],
                ['offset' => 0.3],
                ['offset' => 0.3],
                ['offset' => 0.3],
                ['offset' => 0.2]
                
            ]
            ]);

           /* $equipes2=Equipe::all();
            $dates=Article::select('annee')->distinct()->get();
                                    //$date=date('Y');
                                    $equipes=array();
                foreach ($dates as $date) {
                foreach ($equipes2 as $equipe) {
                $equipes[$date->annee][$equipe->intitule]=DB::table('equipes')->select('equipes.intitule','articles.titre','articles.annee')
                ->distinct()
                ->where('articles.annee','=',$date->annee)
                ->where('equipes.intitule','=',$equipe->intitule)
                ->join('users','equipes.id','=','users.equipe_id')
                 ->join('article_user','article_user.user_id','=','users.id')
                ->join('articles','article_user.article_id','=','articles.id')->get()->count();

                }
                                        
            }
            $data3->addDateColumn('Year');
            foreach ($equipes as $key =>$value) {
                $data3->addNumberColumn($key);
            }
            $data3->addRow(['2009-1-1', 1100, 490, 1324]);
            $lava::ComboChart('IMDB3', $data3, [
                'title' => 'Company Performance',
                'titleTextStyle' => [
                    'color'    => 'rgb(123, 65, 89)',
                    'fontSize' => 16
                ],
                'legend' => [
                    'position' => 'in'
                ],
                'seriesType' => 'bars',
                
            ]);*/
        /* ->addNumberColumn('Sales')
         ->addNumberColumn('Expenses')
         ->addNumberColumn('Net Worth')
         ->addRow(['2009-1-1', 1100, 490, 1324])
         ->addRow(['2010-1-1', 1000, 400, 1524])
         ->addRow(['2011-1-1', 1400, 450, 1351])
         ->addRow(['2012-1-1', 1250, 600, 1243])
         ->addRow(['2013-1-1', 1100, 550, 1462]);*/
        return view('dashboard')->with([
            'membres' => $membres,
            'equipes' => $equipes,
            'articles' => $articles,
            'theses' => $theses,
            'labo'=>$labo,
            'lava'=>$lava,
            
        ]);
        return view('dashboard');
    }
}
