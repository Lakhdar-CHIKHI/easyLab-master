<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\parametre_request;
use App\Parametre;
use Auth;

class ParametreController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        $labo =  Parametre::find('1');
        if( Auth::user()->role->nom == 'admin')
            {
                return view('parametre',['labo'=>$labo]);
            }
            else{
                return view('errors.403',['labo'=>$labo]);
            }
    }

    public function store(parametre_request $request)
    {
        // $labo = new Parametre();
        $labo =  Parametre::find('1');

        if($request->hasFile('logo')){
            $file = $request->file('logo');
            $file_name = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('/uploads/lrit'),$file_name);
            $labo->logo = '/uploads/lrit/'.$file_name;
        }
        if($request->hasFile('img_lab')){

            $file = $request->file('img_lab');
            $file_name_img = time().'img_lab.'.$file->getClientOriginalExtension();
            $file->move(public_path('/uploads/lrit'),$file_name_img);
            $labo->image = '/uploads/lrit/'.$file_name_img;
        }
        if($request->hasFile('video_lab')){

            $file = $request->file('video_lab');
            $file_name_video = time().'video_lab.'.$file->getClientOriginalExtension();
            $file->move(public_path('/uploads/lrit'),$file_name_video);
            $labo->video = '/uploads/lrit/'.$file_name_video;
        }
        $labo->nom = $request->input('nom');
        $labo->propos = $request->input('propos');
        $labo->lieu = $request->input('lieu');
        $labo->mail = $request->input('mail');
        $labo->tel = $request->input('tel');
        $labo->fax = $request->input('fax');
        $labo->save();

        return redirect('parametre')->with('success','Message Envoyer avec success');

    }
}
