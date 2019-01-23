<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Materiel;
use App\Categorie;
use App\Parametre;
use App\Equipe;
use Illuminate\Http\Request;
use App\Http\Requests\materielRequest;
use App\Http\Requests\categoriesRequest;
use Illuminate\Support\Facades\DB;

class MaterielController extends Controller
{
    public function modifierA_nonAffect(Request $request){
        
            DB::update("UPDATE categories SET nom_mat='".$request->input('inpCat')."' WHERE nom_mat='".$request->input('id')."' ");
        
        return redirect('materiels');
    }

    public function supprimerMateriel_nonaffect($id){
        DB::delete("DELETE FROM `categories` WHERE `categories`.`nom_mat` = '".$id."' ");
        return redirect('materiels');
    }

    public function modifierA(Request $request){
        if ($request->input('type_changement')=="materiel") {
            $libelle = str_replace(' ', '_', $request->input('inpLib'));
            DB::update("UPDATE materiels SET numero='".$libelle."' WHERE numero='".$request->input('num')."' ");
        } else {
            DB::update("UPDATE categories SET nom_mat='".$request->input('inpcat')."' WHERE nom_mat='".$request->input('nom_mat')."' ");
        }
        

        return redirect('materiels');
    }

    public function quantite(Request $request){
        $result = DB::select("SELECT quantite_mat FROM `categories` WHERE nom_mat='".$request->input('nomMat')."'" );
        foreach ($result as $row) {
            $affichage.="<tr >
            <td>$row->quantite_mat</td>
          </tr>";
        }
        return $affichage;
    }

    public function voirhistorique(Request $request){
       $result= DB::select("SELECT user_mat.id,users.name,users.prenom,id_mat,date_debut,date_fin FROM user_mat LEFT JOIN users ON user_mat.id_user=users.id WHERE id_mat = '".$request->input('numeroMat')."'");
       $result2= DB::select("SELECT equipe_mat.id,equipes.intitule,equipe_mat.id_materiel,date_debut,date_fin FROM equipe_mat LEFT JOIN equipes ON equipe_mat.id_equipe=equipes.id WHERE id_materiel='".$request->input('numeroMat')."' ");
       $affichage = "<tr>
        <td>numéro d'affectation</td><td>prunteur</td><td>materiel</td><td>du</td><td>à</td>
        </tr>";
        foreach ($result as $row) {
            $affichage.="<tr >
            <td>$row->id</td>
            <td>$row->name  $row->prenom</td>
            <td>$row->id_mat</td>
            <td>$row->date_debut</td>
            <td>$row->date_fin</td>
          </tr>";
        }
        foreach ($result2 as $row2) {
            $affichage.="<tr >
            <td>$row2->id</td>
            <td>$row2->intitule</td>
            <td>$row2->id_materiel</td>
            <td>$row2->date_debut</td>
            <td>$row2->date_fin</td>
          </tr>";
        }

        return $affichage;
    }

    public function supprimerMateriel($id){
        DB::delete("DELETE FROM `materiels` WHERE `materiels`.`numero` = '".$id."' ");
        return redirect('materiels');
    }
    public function affecter_mat_membre(Request $request){
        DB::insert("INSERT INTO `user_mat` (`id`, `id_user`, `id_mat`, `date_debut`, `date_fin`) VALUES (NULL, '".$request->input('idUser')."', '".$request->input('numeroMat')."', '".$request->input('date_affectation')."', NULL)");
      //  return redirect('materiels');
    }

    public function affecter_mat_equipe(Request $request){
        DB::insert("INSERT INTO `equipe_mat` (`id`, `id_equipe`, `id_materiel`, `date_debut`, `date_fin`) VALUES (NULL, '".$request->input('idUser')."', '".$request->input('numeroMat')."', '".$request->input('date_affectation')."', NULL)");
      //  return redirect('materiels');
    }

    public function store(materielRequest $request)
    {  
        $libelle = str_replace(' ', '_', $request->input('libelle'));
        DB::insert("INSERT INTO `materiels` (`numero`, `nom_mat`) VALUES ('".$libelle."', '".$request->input('cat_nom')."')");
        return redirect('materiels')->with('success','Message Envoyer avec success');;
        /*
        $result =DB::select("SELECT quantite_mat FROM `categories` WHERE nom_mat='".$request->input('cat_nom')."'" );
        $affichage = "";
        foreach ($result as $row) {
            $affichage="$row->quantite_mat";
        }
        echo $affichage;
        DB::update("update categories set quantite_mat = '".$request->input('quantity')."' where nom_mat = '".$request->input('cat_nom')."' ");
        for ($i = $affichage +1; $i <= $request->input('quantity') ; $i++) {
            DB::insert("INSERT INTO `materiels` (`numero`, `nom_mat`) VALUES ('".$request->input('cat_nom').$i."', '".$request->input('cat_nom')."')");
        }
        /*
                $labo = Parametre::find('1');
                $var = $request->input('cat_nom');
                echo $var;
                $categorie = Categorie::find();

                $categorie->quantite_mat = $request->input('quantity');

                $categorie->save();*/

      //return redirect('materiels');
    }
    public function store2(categoriesRequest $request)
    {
        DB::insert("INSERT INTO categories (nom_mat,quantite_mat,affectable) VALUES ('".$request->input('nouvCat')."','".$request->input('nouvQua')."','".$request->input('gender')."')");
      /* 
        for ($i = 1; $i <= $request->input('nouvQua') ; $i++) {
            DB::insert("INSERT INTO `materiels` (`numero`, `nom_mat`) VALUES ('".$request->input('nouvCat').$i."', '".$request->input('nouvCat')."')");
        }*/
        return redirect('materiels/create')->with('success','Message Envoyer avec success');;
    }

    public function index()
    {
        $materiels = DB::select('SELECT * FROM materiels LEFT JOIN (SELECT e.id_equipe as id_affectaion_equipe,e.id_materiel,e.date_debut AS date_debut_eq,equipes.intitule FROM equipes LEFT JOIN (SELECT * FROM equipe_mat WHERE equipe_mat.date_fin is null) e ON equipes.id=e.id_equipe) ee ON materiels.numero= ee.id_materiel LEFT JOIN (SELECT e.id_user AS id_affectation_user,e.id_mat,e.date_debut AS date_debut_us,users.name,users.prenom FROM users LEFT JOIN (SELECT * FROM user_mat WHERE user_mat.date_fin is null) e ON users.id=e.id_user) ej ON materiels.numero=ej.id_mat  ');
        $labo = Parametre::find('1');
        $membres = User::all();
        $equipes = Equipe::all();
        $categories = Categorie::all();
        $histo_users =DB::select('SELECT * FROM user_mat'); 
      //  return view('materiel.index', ['materiels' => $materiels], ['labo' => $labo]);
        return view('materiel.index')->with([
            'categories' => $categories,
            'materiels' => $materiels,
            'membres' => $membres,
            'labo' => $labo,
            'equipes' => $equipes,
            'histo_users' =>$histo_users,
        ]);
    }

    public function rendreEquipe(Request $request)
    {
         $id =$request->input('id_affecter_equipe');
         $mat =$request->input('num_materiel_equipe');
         $date =$request->input('date_affecter_equipe');
        
        DB::update("update equipe_mat set date_fin = '".$date."' where id_equipe = '".$id."' and id_materiel ='".$mat."' ");
        return redirect('materiels');
        // $var->save();
    }

    public function rendreUser(Request $request)
    {
        // alert('hedmkezmd');
        // $var =
        $id =$request->input('id_affecter_user');
         $mat =$request->input('num_materiel_user');
         $date =$request->input('date_affecter_user');
        DB::update("update user_mat set date_fin = '".$date."' where id_user = '".$id."' and id_mat= '".$mat."'  ");

        return redirect('materiels');
    }

    public function create()
    {
        if (Auth::user()->role->nom == 'admin') {
            $categories = Categorie::all();
            $materiels = Materiel::all();
            $membres = User::all();
            $labo = Parametre::find('1');

            // return view('materiel.ajouter', ['membres' => $membres], ['categories' => $categories], ['labo' => $labo]);

            return view('materiel.ajouter')->with([
                'categories' => $categories,
                'membres' => $membres,
                'labo' => $labo,
            ]);
        } else {
            $labo = Parametre::find('1');

            return view('errors.403', ['labo' => $labo]);
        }
    }
}
