<?php

namespace App\Http\Controllers;
use Illuminate\support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\projetRequest;
use App\Projet;
use App\User;
use App\Contact;
use Auth;
use App\Partenaire;
use App\ProjetContact;
use App\ProjetUser;
use App\Parametre;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ProjetController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

	//permet de lister les articles
    public function index(){
    	$projets = Projet::all();
        $labo =  Parametre::find('1');
        // $membres = Projet::find($id)->users()->orderBy('name')->get();

    	return view('projet.index' , ['projets' => $projets] ,['labo'=>$labo]);
    	
    }

    public function details($id)
    {
        $labo =  Parametre::find('1');
        $projet = Projet::find($id);
        $membres = Projet::find($id)->users()->orderBy('name')->get();
        $contacts = Projet::find($id)->contacts()->orderBy('nom')->get();
        return view('projet.details')->with([
            'projet' => $projet,
            'contacts'=>$contacts,
            'membres'=>$membres,
            'labo'=>$labo,
        ]);;
    } 

    //affichage de formulaire de creation d'articles
	 public function create()
     {
        $labo =  Parametre::find('1');
        
             $contacts = Contact::all();
    	 	 $membres = User::all();
             $projet = Projet::all();
    	 	
             return view('projet.create')->with([
                'projet' => $projet,
                'membres'=>$membres,
                'contacts'=>$contacts,
                'labo'=>$labo,
            ]);;
    }

	 public function store(projetRequest $request){

	 	$projet = new Projet();
        $labo =  Parametre::find('1');

	 	if($request->hasFile('detail')){

            $file = $request->file('detail');
            $file_name = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('/uploads/projet'),$file_name);
            $projet->detail = '/uploads/projet/'.$file_name;
        }
       
        if($request->hasFile('img_projet')){

            $file = $request->file('img_projet');
            $file_name_pr = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('/uploads/projet/images'),$file_name_pr);
            $projet->image_projet = '/uploads/projet/images/'.$file_name_pr;
        }

	 	$projet->intitule = $request->input('intitule');
	 	$projet->resume = $request->input('resume');
	 	$projet->type = $request->input('type');
	 	
	 	$projet->lien = $request->input('lien');
        $projet->chef_id = $request->input('chef_id');
	 	


	 	$projet->save();

        $members =  $request->input('membre');
        if ($members) {
            foreach ($members as  $value) {
                $projet_user = new ProjetUser();
                $projet_user->projet_id = $projet->id;
                $projet_user->user_id = $value;
                $projet_user->save();
    
             } 
        }
        
         $contacts =  $request->input('contact');
         if ($contacts) {
            foreach ($contacts as $key => $value) {
            
                $projet_contact = new ProjetContact();
                 $projet_contact->projet_id = $projet->id;
                 $projet_contact->contact_id = $value;
                 $projet_contact->save();
    
              } 
        }
         

	 	return redirect('projets');


	 }

    //récuperer un article puis le mettre dans le formulaire
	 public function edit($id){

         $projet = Projet::find($id);
         $contacts = Contact::all(); 
	 	 $membres = User::all();
         $labo =  Parametre::find('1');

         $this->authorize('update', $projet);

	 	return view('projet.edit')->with([
            'projet' => $projet,
            'contacts'=>$contacts,
            'membres' => $membres,
            'labo'=>$labo,
        ]);;
	 	
    }

    //modifier et inserer
    public function update(projetRequest $request , $id){
    
    	$projet = Projet::find($id);
        $labo =  Parametre::find('1');

        
    	if($request->hasFile('detail')){
            if (file_exists($projet->detail)) 
               {
                 unlink($projet->detail);
               }
            //unlink($projet->detail);
            //Storage::delete($projet->detail);
            $file = $request->file('detail');
            $file_name = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('/uploads/projet'),$file_name);
	 	     $projet->detail = '/uploads/projet/'.$file_name;

        }
        
        if($request->hasFile('img_projet_mod')){
            if (file_exists($projet->image)) 
               {
                 unlink($projet->image);
                  
              }
            $file = $request->file('img_projet_mod');
            $file_name = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('/uploads/projet/images'),$file_name);
            $projet->image_projet = 'uploads/projet/images/'.$file_name;
        }
        

        $projet->intitule = $request->input('intitule');
        $projet->resume = $request->input('resume');
        $projet->type = $request->input('type');
        $projet->lien = $request->input('lien');
        $projet->chef_id = $request->input('chef_id');

	 	$projet->save();

        $members =  $request->input('membre');
        $projet_user = ProjetUser::where('projet_id',$id);
        $projet_user->delete();
        if ($members) {
            
        foreach ($members as $key => $value) {
            $projet_user = new ProjetUser();
            $projet_user->projet_id = $projet->id;
            $projet_user->user_id = $value;
            $projet_user->save();

         } }
         $contacts =  $request->input('contact');
         DB::table('contact_projet')->where('projet_id', '=', $projet->id)->delete();
         if ($contacts) {
         
         
         foreach ($contacts as $key => $value) {
             $projet_contact = new ProjetContact();
             $projet_contact->projet_id = $projet->id;
             $projet_contact->contact_id = $value;
             $projet_contact->save();
 
          } }

	 	return redirect('projets');

    }
    //supprimer un article
    public function destroy($id){

    	$projet = Projet::find($id);

        $contacts = ProjetContact::where('projet_id', $id)->get();
        foreach ($contacts as $contact ) {
        
            $contact->delete();
                         
                         } 

        if (file_exists($projet->image)) 
        {
          unlink($projet->image);
           
       }

        $this->authorize('delete', $projet);

        $projet->delete();
        return redirect('projets');

    }

}
