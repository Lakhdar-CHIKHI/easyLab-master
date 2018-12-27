@extends('layouts.master')

@section('title','LRI | Ajouter materiel')

@section('header_page')

      <h1>
        Materiels
        <small>Nouvelle</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li><a href="{{url('materiels')}}">Matériels</a></li>
        <li class="active">Ajouter</li>
      </ol>

@endsection

@section('asidebar')
        <li >
          <a href="{{url('dashboard')}}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>

         <li>
          <a href="{{url('equipes')}}">
            <i class="fa fa-group"></i> 
            <span>Equipes</span>
          </a>
        </li>
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span>Membres</span>
            <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('trombinoscope')}}"><i class="fa fa-id-badge"></i> Trombinoscope</a></li>
            <li><a href="{{url('membres')}}"><i class="fa fa-list"></i> Liste</a></li>
          </ul>
        </li>
         <li >
          <a href="{{url('theses')}}">
            <i class="fa fa-file-pdf-o"></i> 
            <span>Thèses</span>
          </a>
        </li>
       

        <li>
          <a href="{{url('articles')}}">
            <i class="fa fa-newspaper-o"></i> 
            <span>Articles</span></a>
          </li>
          
        <li>
          <a href="{{url('projets')}}">
            <i class="fa fa-folder-open-o"></i> 
            <span>Projets</span>
          </a>
        </li>

        <li class="active">
          <a href="{{url('materiels')}}">
            <i class="glyphicon glyphicon-blackboard"></i> 
            <span>Materiels</span>
          </a>
        </li>
        
       

          @if(Auth::user()->role->nom == 'admin' )

          <li>
          <a href="{{url('parametre')}}">
            <i class="fa fa-gears"></i> 
            <span>Paramètres</span></a>
          </li>
          @endif

    @endsection
    

@section('content')



<div class="row">
  <div class="col-xs-12">
    <div class="box">
        
      <div class="container col-xs-12">
 
        <form class="well form-horizontal" action=" {{ url('materiels')}} " method="post" id="contact_form">
          {{ csrf_field() }}
          <fieldset>

            <!-- Form Name -->
            <legend><center><h2><b>Nouveau Materiel</b></h2></center></legend><br>

                  <script type="text/javascript">
    function afficherQuantite(){
      //$valeur= document.getElementById('nommat').value;
      $valeur = $('.qte_act22 option:selected').val();
      //alert($valeur);
      document.getElementById('qt').value= $valeur;
   //  alert($(this).find(':selected').attr('idsel').val());
 // alert($(this).data('cat'));
    }
</script>
                <div class="form-group ">
                    <label class="col-xs-3 control-label">Catégorie matériel (*)</label>  
                    <div class="col-xs-9 inputGroupContainer @if($errors->get('chef_id')) has-error @endif">
                      <div style="width: 70%">
                        <select id="selectCat" name="cat_nom"  class="form-control select2 qte_act22" onchange="afficherQuantite()" >
                           @foreach($categories as $categorie)
                          <option></option>
                          <option value="{{$categorie->nom_mat}}" >{{$categorie->nom_mat}}</option>                           
                          @endforeach
                        </select>
                        <span class="help-block">
                            @if($errors->get('chef_id'))
                              @foreach($errors->get('chef_id') as $message)
                                <li> {{ $message }} </li>
                              @endforeach
                            @endif
                        </span>
                      </div>
                    </div>
              </div>  

              <div class="form-group">
                    <label class="col-xs-3 control-label">Quantite actuel (*)</label>  
                    <div class="col-xs-9 inputGroupContainer @if($errors->get('intitule')) has-error @endif">
                      <div style="width: 70%">
                        <input id="qt" name="intitule" class="form-control hups" placeholder="Quantité actuel" type="text" value="{{old('titre')}}" disabled>
                         <div class="hups2">
                         <table>
                         
                         </table>
                         </div>
                          <span class="help-block">
                            @if($errors->get('intitule'))
                              @foreach($errors->get('intitule') as $message)
                                <li > {{ $message }} </li>
                              @endforeach
                            @endif
                        </span>
                          
                      </div>
                    </div>
              </div>  

              <div class="form-group">
                  <label class="col-md-3 control-label">Ajouter une nouvelle quantité</label>
                  <div class="col-md-9 inputGroupContainer" >
                    <div style="width: 70%">
                    <input name="quantity" type="number" min="1" class="form-control" placeholder="Nouvelle quantité >= 1" >
                    </div>
                  </div>
              </div>
              <div class="row" style="padding-top: 30px; margin-left: 35%;">
          <a href="{{url('equipes')}}" class=" btn btn-lg btn-default"><i class="fa  fa-mail-reply"></i> &nbsp;Annuler</a>
           <button type="submit" class=" btn btn-lg btn-primary btn_affecter23"><i class="fa fa-check"></i> Valider</button> 
              </div>
              
          </fieldset>
          </form>
          
          
              <br><br><br>

              <div class="form-group">
                  <label class="col-md-3 control-label">Si la catégorie n'existe pas </label>
                  
              </div>

              <form class="well form-horizontal" action=" {{url('materiells')}} " method="post"  id="contact_formm">
              {{ csrf_field() }}
          <fieldset>

             <div class="form-group">
                  <label class="col-md-3 control-label">Nouvelle categorie(*)</label>
                  <div class="col-md-9 inputGroupContainer" >
                    <div style="width: 70%">
                      <input name="nouvCat" type="text" class="form-control" placeholder="intitule" type="text">
                    </div>
                  </div>
              </div>
              <div class="form-group">
                  <label class="col-md-3 control-label">Quantité(*)</label>
                  <div class="col-md-9 inputGroupContainer" >
                    <div style="width: 70%">
                      <input name="nouvQua" type="number" min="1" class="form-control" placeholder="Quantité >= 1" >
                     
                    </div>
                  </div>
              </div>

              <div class="row" style="padding-top: 30px; margin-left: 35%;">
          <a href="{{url('equipes')}}" class=" btn btn-lg btn-default"><i class="fa  fa-mail-reply"></i> &nbsp;Annuler</a>
           <button type="submit" class=" btn btn-lg btn-primary"><i class="fa fa-check"></i> Valider</button> 
              </div>
              </fieldset>
        </form>
      </div>
     </div><!-- /.container -->
   </div>
  </div>

@endsection


