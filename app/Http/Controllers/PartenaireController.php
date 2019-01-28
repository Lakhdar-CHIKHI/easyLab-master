<?php

namespace App\Http\Controllers;
use Illuminate\support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\partenaireRequest;
use App\Parametre;
use App\Partenaire;
use App\Stage;
use App\Contact;
use Auth;

class PartenaireController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index()
    {  
    $labo = Parametre::find('1'); 
    $partenaires = Partenaire::all();
     // $nbr = DB::table('users')
     //            ->groupBy('equipe_id')
     //            ->count('equipe_id');

    $nbr = DB::table('contacts')
             ->select( DB::raw('count(*) as total,partenaire_id'))
             ->groupBy('partenaire_id')
             ->whereNull('deleted_at')
             ->get();
 
        return view('partenaire.index')->with([
            'partenaires' => $partenaires,
            'nbr' => $nbr,
            'labo'=>$labo,
        ]);;
    }

    public function create()
    {
        $labo = Parametre::find('1');
        
            	$contacts = Contact::all(); 
                return view('partenaire.create', ['contacts' => $contacts] ,['labo'=>$labo]);
           
    }

    public function details($id)
    {
        $labo = Parametre::find('1');
        $partenaire = Partenaire::find($id);
        $contacts = Contact::where('partenaire_id', $id)->get();
        $stages = Stage::where('partenaire_id', $id)->get();

        return view('partenaire.details')->with([
            'partenaire' => $partenaire,
            'contacts' => $contacts,
            'labo'=>$labo,
            'stages'=>$stages,
        ]);
    } 

    public function store(partenaireRequest $request)
    {
        $labo = Parametre::find('1');
        $partenaire = new partenaire();

        if($request->hasFile('img')){
            $file = $request->file('img');
            $file_name = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('/uploads/photo'),$file_name);

        }
        else{
            $file_name="nologo.png";
        }
        $partenaire->nom = $request->input('nom');
        $partenaire->type = $request->input('type');
        $partenaire->pays = $request->input('pays');
        $partenaire->ville = $request->input('ville');
       

        
        $partenaire->logo = 'uploads/photo/'.$file_name;
        $partenaire->save();

        return redirect('partenaires');

    }
    public function storepopP(partenaireRequest $request)
    {
        $labo = Parametre::find('1');
        $partenaire = new partenaire();

        if($request->hasFile('img')){
            $file = $request->file('img');
            $file_name = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('/uploads/photo'),$file_name);

        }
        else{
            $file_name="nologo.png";
        }
      
        $partenaire->nom = $request->input('nom');
        $partenaire->type = $request->input('type');
        $partenaire->pays = $request->input('pays');
        $partenaire->ville = $request->input('ville');
       

        
        $partenaire->logo = 'uploads/photo/'.$file_name;
        $partenaire->save();

        $partenaires = Partenaire::all();
        return $partenaires;

    }
    public function update(partenaireRequest $request,$id)
    {
        $labo = Parametre::find('1');
        $partenaire = Partenaire::find($id);
        if($request->hasFile('img')){
            if (file_exists($partenaire->logo)) 
            {
              unlink($partenaire->logo);
               
           }
            $file = $request->file('img');
            $file_name = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('/uploads/photo'),$file_name);
            $partenaire->logo = 'uploads/photo/'.$file_name;
                        }
       

                $partenaire->nom = $request->input('nom');
                $partenaire->type = $request->input('type');
                $partenaire->pays = $request->input('pays');
                $partenaire->ville = $request->input('ville');
              

            $partenaire->save();

            return redirect('partenaires/'.$id.'/details');
           

    }

    public function destroy($id)
    {
        if( Auth::user()->role->nom == 'admin' )
            {
                
                

        $partenaire = Partenaire::find($id);
        $contacts = Contact::where('partenaire_id', $id)->get();
foreach ($contacts as $contact ) {

    $contact->delete();
                 
                 } 
                 $stages = Stage::where('partenaire_id', $id)->get();
foreach ($stages as $stage ) {

    $stage->delete();
                 
                 } 

        $partenaire->delete();
        return redirect('partenaires');
        }
    }

}
