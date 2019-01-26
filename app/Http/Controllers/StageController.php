<?php

namespace App\Http\Controllers;
use Illuminate\support\Facades\DB;
use Illuminate\Http\Request;
use App\Stage;
use App\Parametre;
use App\User;
use App\Partenaire;
use Auth;
use App\Http\Requests\stageRequest;
use Illuminate\Http\UploadedFile;



class StageController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $stages = Stage::all(); 
        $labo = Parametre::find('1');

        return view('stage.index' , ['stages' => $stages] , ['labo'=>$labo]);
    }

    public function details($id)
    {
        $stage = Stage::find($id);
        $labo = Parametre::find('1');

        return view('stage.details', ['stage' => $stage], ['labo'=>$labo]);
    } 

    public function create()
    {
        /*if( Auth::user()->role->nom == 'admin')
            {*/
                $membres = DB::table('users')
                ->wherenotExists(function ($query) {
                     $query->select(DB::raw('user_id'))
                     ->from('stages')
                     ->whereNull('date_fin')
                     ->whereNull('deleted_at')
                     ->whereRaw('stages.user_id = users.id');
                    
                 })
                 ->get(); 
               
               
               
               
               
                $partenaires = Partenaire::all();
                $stages = Stage::all();
                $labo = Parametre::find('1');
                return view('stage.ajouter')->with([
                  
                    'membres'=>$membres,
                    'partenaires'=>$partenaires,
                    'labo'=>$labo,
                ]);;
            /*}
            else{
                $labo = Parametre::find('1');
                return view('errors.403', ['labo'=>$labo]);
            }*/
    
    }

    public function store(stageRequest $request)
    {
        $labo = Parametre::find('1');
        $stage = new Stage();

         if($request->hasFile('detail')){

            $file = $request->file('detail');
            $file_name = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('/uploads/these/'),$file_name);
            $stage->detail = '/uploads/these/'.$file_name;

        }

        $stage->titre = $request->input('titre');
        $stage->sujet = $request->input('sujet');
        $stage->date_debut = $request->input('date_debut');
        
        $stage->date_fin = $request->input('date_soutenance');
        $stage->partenaire_id = $request->input('part_id');
        $stage->user_id = $request->input('user_id');
        


        $stage->save();

        return redirect('stages');

    }



    public function selectmembre(Request $request)
    {
     
        $membres = DB::select("SELECT * FROM users WHERE not EXISTS 
        (select user_id from stages where stages.user_id = users.id and deleted_at IS NULL and
         (date_fin IS NULL or date_fin >='".$request->input('date_deb')."' ) )");
         return $membres;


    }
    public function edit($id)
    {
        $labo = Parametre::find('1');
        //if(Auth::id() == $membre->id || Auth::user()->role->nom == 'admin')
            {
        $stage = Stage::find($id);
      
        
        $membres = DB::table('users')
        ->wherenotExists(function ($query) {
             $query->select(DB::raw('user_id'))
             ->from('stages')
             ->whereNull('date_fin')
             ->whereNull('deleted_at')
             ->whereRaw('stages.user_id = users.id');
            
         })
         ->get(); 
       
       
       
       
                
        $partenaires = Partenaire::all();
       

        return view('stage.edit')->with([ 
            'stage' => $stage,
            'membres'=>$membres,
            'partenaires'=>$partenaires,
            'labo'=>$labo,
        ]);;
            }



    }
    public function update(stageRequest $request , $id)
    {
        $stage = Stage::find($id);
        $labo = Parametre::find('1');

         if($request->hasFile('detail')){

            $file = $request->file('detail');
            $file_name = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('/uploads/these/'),$file_name);
            $stage->detail = '/uploads/these/'.$file_name;

        }
        
        $stage->titre = $request->input('titre');
        $stage->sujet = $request->input('sujet');
        $stage->date_debut = $request->input('date_debut');
        
        $stage->date_fin = $request->input('date_soutenance');
        $stage->partenaire_id = $request->input('part_id');
        $stage->user_id = $request->input('user_id');
        


        $stage->save();

        return redirect('stages');

    }
    public function destroy($id)
    {

        $stage = Stage::find($id);

      

        $stage->delete();
        return redirect('stages');
    }

}
