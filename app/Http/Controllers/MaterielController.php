<?php

namespace App\Http\Controllers;

use App\Parametre;
use Illuminate\Support\Facades\DB;

class MaterielController extends Controller
{
    public function index()
    {
        $materiels = DB::select('SELECT * FROM materiels M LEFT JOIN (SELECT equipe_mat.id_materiel,equipes.intitule,equipe_mat.date_debut AS date_debut_eq ,equipe_mat.date_fin as date_fin_eq FROM equipes LEFT JOIN equipe_mat ON equipe_mat.id_equipe = equipes.id ) E ON M.numero = E.id_materiel LEFT JOIN (SELECT user_mat.id_mat,users.name,user_mat.date_debut AS date_debut_us,user_mat.date_fin as date_fin_us FROM users LEFT JOIN user_mat on user_mat.id_user = users.id ) U ON M.numero = U.id_mat WHERE date_fin_eq is null AND date_fin_us is null');
        $labo = Parametre::find('1');

        return view('materiel.index', ['materiels' => $materiels], ['labo' => $labo]);
    }

    public function index2()
    {
        $materiels = DB::table('');
        $labo = Parametre::find('1');

        return view('materiel.index', ['materiels' => $materiels], ['labo' => $labo]);
    }
}
