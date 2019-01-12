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
        if( Auth::user()->role->nom == 'admin')
            {
                $partenaires = Partenaire::all();
                return view('contact.create' , ['partenaires' => $partenaires],['labo'=>$labo]);
            }
            else{
                return view('errors.403',['labo'=>$labo]);
            }
    }

    public function store(contactRequest $request)
    {
        $contact = new Contact();
        $labo = Parametre::find('1');
      

            $contact->nom = $request->input('nom');
            $contact->prenom = $request->input('prenom');
            
            $contact->create_id =  Auth::user()->id;
            $contact->adresse_mail = $request->input('adresse_mail');
            $contact->fonction = $request->input('fonction');
            $contact->nature_de_cooperation = $request->input('nature_de_cooperation');
            $contact->partenaire_id = $request->input('partenaire');
            $contact->tel = $request->input('tel');
        

            $contact->save();
        return redirect('contacts');

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
        if( Auth::user()->role->nom == 'admin' || Auth::user()->id ==$contact->create_id)
        {
            $contact->nom = $request->input('nom');
            $contact->prenom = $request->input('prenom');
            $contact->adresse_mail = $request->input('adresse_mail');
            $contact->fonction = $request->input('fonction');
            $contact->nature_de_cooperation = $request->input('nature_de_cooperation');
            $contact->partenaire_id = $request->input('partenaire');
            $contact->tel = $request->input('tel');
        

            $contact->save();
   

        return redirect('contacts/'.$id.'/details');
    }   
    else{
            return view('errors.403',['labo'=>$labo]);
        }
    }

    
    public function destroy($id)
    {
        if( Auth::user()->role->nom == 'admin'| Auth::user()->id ==$partenaire->create_id)
            {
        $contact = Contact::find($id);
        $contact->delete();
        return redirect('contacts');
            }
    }
    
}
