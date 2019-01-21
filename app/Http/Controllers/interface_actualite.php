<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Http\Requests\userRequest;
use App\Http\Requests\userEditRequest;
use App\Parametre;
use App\User;
use App\actualites;
use App\Equipe;
use App\Role;
use Auth;
use App\Http\Requests\actualiteRequest;


class interface_actualite extends Controller
{

    public function index()
    {
        $actualites = actualites::all(); 
        $labo = Parametre::find('1');

        return view('template.actualites_dash' , ['actualites' => $actualites],['labo'=>$labo]);
    }
    public function index2()
    {
        $actualites = actualites::paginate(10); 
        $labo = Parametre::find('1');

        return view('template.actualites' , ['actualites' => $actualites],['labo'=>$labo]);
    }

    public function details($id)
    {
    	$labo = Parametre::find('1');
	 	$actualite = actualites::find($id);
	 	//$membres = actualites::find($id)->createur()->orderBy('name')->get();

	 	//return view('article.details')->with([
			return view('template.detail_actualite')->with([
	 		'actualite' => $actualite,
	 		//'membres'=>$membres,
	 		'labo'=>$labo,
	 	]);;
    }
    public function create()
    {
        $labo = Parametre::find('1');
        if( Auth::user()->role->nom == 'admin')
            {
                $equipes = Equipe::all();
                return view('template.create_actualite' , ['equipes' => $equipes],['labo'=>$labo]);
            }
            else{
                return view('errors.403',['labo'=>$labo]);
            }
    }

    public function store(actualiteRequest $request)
    {
        

        $actualite = new actualites;
        $labo = Parametre::find('1');
        if($request->hasFile('img_actualite')){
            $file = $request->file('img_actualite');
            $file_name = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('/uploads/photo'),$file_name);

        }
        else{
            $file_name="2_2.jpg";
        }
            
            $actualite->user_id = $request->input('id_user');
            $actualite->titre = $request->input('titre');
            $actualite->resume = $request->input('resume');
            $actualite->date = $request->input('date_pub');
            
            $actualite->photo = 'uploads/photo/'.$file_name;

            $actualite->save();
        return redirect('actualites');

    }
     //supprimer un actualite
     public function destroy($id){

    	$actualite = actualites::find($id);
        if (file_exists($actualite->photo)) 
               {
                 unlink($actualite->photo);
                  
              }
	 	//$this->authorize('delete', $actualite);

        $actualite->delete();
        return redirect('actualites');

    }

    //modifier et inserer
    public function update(actualiteRequest $request ,$id){
    
    	$actualite = actualites::find($id);
        $labo = Parametre::find('1');
        
              //$file_name="2_2.jpg";
        if($request->hasFile('img_actualite_mod')){
            if (file_exists($actualite->photo)) 
               {
                 unlink($actualite->photo);
                  
              }
            $file = $request->file('img_actualite_mod');
            $file_name = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('/uploads/photo'),$file_name);
            $actualite->photo = 'uploads/photo/'.$file_name;
        }
        
            
            
            $actualite->titre = $request->input('titre');
            $actualite->resume = $request->input('resume');
            $actualite->date = $request->input('date_pub');
            
            
            
            $actualite->save();


        return redirect('actualites');
    }
}
