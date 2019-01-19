<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Http\Requests\contactRequest;
use App\Http\Requests\contactEditRequest;
use App\Parametre;
use App\User;
use App\Contact;
use App\Partenaire;
use App\Role;
use Auth;


class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

     public function index()
    {
        $contacts = Contact::all(); 
        $labo = Parametre::find('1');

        return view('contact.index' , ['contacts' => $contacts],['labo'=>$labo]);
    }

    public function trombi()
    {
        // $membres = User::all()->orderBy('name'); 
        $labo = Parametre::find('1');
        $contacts = DB::table('contacts')->distinct('id')->orderBy('nom')->get(); 

        return view('contact.trombinoscope', ['contacts' => $contacts],['labo'=>$labo]);
    } 

    public function details($id)
    {
        $contact = Contact::find($id);
        $partenaires = Partenaire::all();
        $roles = Role::all();
        $labo = Parametre::find('1');


        return view('contact.details')->with([
            'contact' => $contact,
            'partenaires' => $partenaires,
            'roles' => $roles,
            'labo'=>$labo,
            
        ]);;
    } 

    public function create()
    {
        $labo = Parametre::find('1');
       
                $partenaires = Partenaire::all();
                return view('contact.create' , ['partenaires' => $partenaires],['labo'=>$labo]);
           
    }
    
    public function createpop()
    {
        $partenaires = Partenaire::all();
        return $partenaires;
    }
    public function store(contactRequest $request)
    {
        $contact = new Contact();
        $labo = Parametre::find('1');
      

            $contact->nom = $request->input('nom');
            $contact->prenom = $request->input('prenom');
            
            $contact->adresse_mail = $request->input('adresse_mail');
            $contact->fonction = $request->input('fonction');
            $contact->partenaire_id = $request->input('partenaire');
            $contact->tel = $request->input('tel');
        

            $contact->save();
        return redirect('contacts');

    }
    public function storepop(ContactRequest $request)
    { 
        $contact = new Contact();
        $labo = Parametre::find('1');
      

            $contact->nom = $request->input('nom');
            $contact->prenom = $request->input('prenom');
            
            $contact->adresse_mail = $request->input('adresse_mail');
            $contact->fonction = $request->input('fonction');
           
            $contact->partenaire_id = $request->input('partenaire');
            $contact->tel = $request->input('tel');
        

            $contact->save();
            $contacts = Contact::all();
     return $contacts;
    }



    public function edit($id)
    {

        $contact = Contact::find($id);
        $partenaires = Partenaire::all();
        $roles = Role::all();
        $labo = Parametre::find('1');


        return view('contact.edit')->with([
            'contact' => $contact,
            'partenaires' => $partenaires,
            'roles' => $roles,
            'labo'=>$labo,
            
        ]);;
    
    }

    public function update(contactEditRequest $request , $id)
    {
        $contact = Contact::find($id);
            $contact->nom = $request->input('nom');
            $contact->prenom = $request->input('prenom');
            $contact->adresse_mail = $request->input('adresse_mail');
            $contact->fonction = $request->input('fonction');
    
            $contact->partenaire_id = $request->input('partenaire_id');
            $contact->tel = $request->input('tel');
        

            $contact->save();
   

        return redirect('contacts/'.$id.'/details');
   
    }

    
    public function destroy($id)
    {
        $contact = Contact::find($id);

        if( Auth::user()->role->nom == 'admin')
            {
        
        $contact->delete();
        return redirect('contacts');
            }
    }
    
}
