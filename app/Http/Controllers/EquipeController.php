<?php

namespace App\Http\Controllers;
use Illuminate\support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\equipeRequest;
use App\Parametre;
use App\Equipe;
use App\User;
use Auth;

class EquipeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    
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
 
        return view('equipe.index')->with([
            'equipes' => $equipes,
            'nbr' => $nbr,
            'labo'=>$labo,
        ]);;
    }

    public function create()
    {
        $labo = Parametre::find('1');
        if( Auth::user()->role->nom == 'admin')
            {
            	$membres = User::all(); 
                return view('equipe.create', ['membres' => $membres] ,['labo'=>$labo]);
            }
            else{
                return view('errors.403' ,['labo'=>$labo]);
            }
    }

    public function details($id)
    {
        $labo = Parametre::find('1');
        $equipe = Equipe::find($id);
        $membres = User::where('equipe_id', $id)->get();

        return view('equipe.details')->with([
            'equipe' => $equipe,
            'membres' => $membres,
            'labo'=>$labo,
        ]);
    } 

    public function store(equipeRequest $request)
    {
        $labo = Parametre::find('1');
        $equipe = new equipe();
        
        $equipe->intitule = $request->input('intitule');
        $equipe->resume = $request->input('resume');
        $equipe->achronymes = $request->input('achronymes');
        $equipe->axes_recherche = $request->input('axes_recherche');
        $equipe->chef_id = $request->input('chef_id');

        if($request->hasFile('logo')){

            $file = $request->file('logo');
            $file_name_logo = time().'logo.'.$file->getClientOriginalExtension();
            $file->move(public_path('/uploads/equipes'),$file_name_logo);
            $equipe->logo = '/uploads/equipes/'.$file_name_logo;
        }

        $equipe->save();

        return redirect('equipes');

    }

    public function update(equipeRequest $request,$id)
    {
        $labo = Parametre::find('1');
        $equipe = Equipe::find($id);

        if( Auth::user()->role->nom == 'admin')
            {
                
                if($request->hasFile('logo_mod')){
                    if (file_exists($equipe->logo)) 
                       {
                         unlink($equipe->logo);
                          
                      }
                    $file = $request->file('logo_mod');
                    $file_name_logo = time().'logo.'.$file->getClientOriginalExtension();
                    $file->move(public_path('/uploads/equipes'),$file_name_logo);
                    $equipe->logo = 'uploads/equipes/'.$file_name_logo;
                }

            $equipe->intitule = $request->input('intitule');
            $equipe->resume = $request->input('resume');
            $equipe->achronymes = $request->input('achronymes');
            $equipe->axes_recherche = $request->input('axes_recherche');
            $equipe->chef_id = $request->input('chef_id');

            $equipe->save();

            return redirect('equipes/'.$id.'/details');
            }   
        else{
                return view('errors.403',['labo'=>$labo]);
            }

    }

    public function destroy($id)
    {
        if( Auth::user()->role->nom == 'admin')
            {

        $equipe = Equipe::find($id);
        if (file_exists($equipe->logo)) 
                       {
                         unlink($equipe->logo);
                          
                      }
                      if (file_exists($equipe->image)) 
                       {
                         unlink($equipe->image);
                          
                      }
        $equipe->delete();
        return redirect('equipes');
        }
    }

}
