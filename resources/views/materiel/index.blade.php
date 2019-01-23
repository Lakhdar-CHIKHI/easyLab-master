@extends('layouts.master')

@section('title','LRI | Liste des matérieaux')

@section('header_page')

      <h1>
        Matériel
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><a href="{{url('materiels')}}">Matériel</a></li>
      </ol>

@endsection


@section('asidebar')
        <li >
          <a href="{{url('dashboard')}}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li>
                <a href="{{url('actualites')}}">
                    <i class="fa fa-newspaper-o"></i> <span>Actualites</span>
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
      <div class="col-md-12">
            <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                           <li class="active"><a href="#apropos" data-toggle="tab">A propos</a></li>
                           @if(Auth::user()->role->nom == 'admin' )
             
                           <li><a href="#modifier" data-toggle="tab">Modifier</a></li>
                           @endif
                         </ul>
                         <div class="tab-content">

                                <div class="active tab-pane" id="apropos">
        
          <div class="container" style="padding-top: 30px">
          <div class="row" style="padding-bottom: 20px">
             <div class="box-header col-xs-9">
              <h3 class="box-title">Liste des matériaux</h3>
            </div>
            
          </div>
          </div>
                    
            <!-- /.box-header -->
           
            <div class="box-body">
              @if(Auth::user()->role->nom == 'admin' )
              <div class=" pull-right">
              <a href="{{url('materiels/create')}}" type="button" class="btn btn-block btn-success btn-lg"><i class="fa fa-plus"></i> Nouveau matériel</a>
            </div>
            @endif
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Numéro materiel </th>
                  <th>Catégorie</th>
                  <th>Affecté à </th>
                  <th>Date affectation</th>
                  <th>Action</th>
                  
                </tr>
                </thead>
                <tbody>
                  @foreach($materiels as $materiel)
                  <tr>
                    <td>{{$materiel->numero}}</td>
                    <td>{{$materiel->nom_mat}}</td>
                    <td>
                    @if($materiel->intitule)
                     {{$materiel->intitule}} 
                    @endif
                    @if($materiel->name)
                   {{$materiel->name}}  {{$materiel->prenom}}
                    @endif
                    </td>
                    <td>
                    @if($materiel->date_debut_eq)
                    {{$materiel->date_debut_eq}} 
                    @endif
                    @if($materiel->date_debut_us)
                    {{$materiel->date_debut_us}} 
                    @endif
                    </td>
                    <td>
                    <div class="btn-group">
                    
                  
                    @if(is_null($materiel->name) && is_null($materiel->intitule))
                          <a href="#mod{{ $materiel->numero }}Modal" role="button" id="id_import" class="glyphicon glyphicon-open" data-toggle="modal"></a>
                    @endif
                    <div class="modal fade" id="mod{{ $materiel->numero }}Modal" tabindex="-1" role="dialog" aria-labelledby="mod{{ $materiel->numero }}ModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                      </button>
                                  </div>
                                  
                                  <div class="modal-body text-center">
                                  <table class="table table-striped table-bordered table-hover">
                                  <script type="text/javascript">
    function blockerEquipe(){
      
      document.getElementById('equSel').disabled = true;
      document.getElementById('equSel2').disabled = true;
      document.getElementById('equSel3').disabled = true;
    }
    function blockerMembre(){
      document.getElementById("memSel").disabled = true;
      document.getElementById("memSel2").disabled = true;
      document.getElementById("memSel3").disabled = true;
    }
</script>
                                <tr>
                                    <td>Affecter à quoi : </td>
                                    <td>
                                            <select name="type_changement" id="typ_ch" class="form-control select2 sele2_affecter">
                                                    <option value="choix" selected>selectionner un choix</option>    
                                                    <option value="membre" >Membre</option>
                                                    <option value="équipe" >équipe</option>
                                                </select>
                                    </td>
                                </tr>
                                <tr class="membre">
                                  
                                    <td><label class=" control-label">Membre </label> </td>
                                    <td>
                                        <select id="memSel" name="chef_id" class="form-control select2 qte_act{{$materiel->numero}}" >
                                            @foreach($membres as $membre)
                                            <option value="{{$membre->id}}" >{{$membre->name}} {{$membre->prenom}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <!--<td>
                                        <button id="memSel2" type="button" data-id="{{$materiel->numero}}" class="btn btn-danger btn_affecter" onclick="blockerEquipe()" >Affecter</button>
                                    </td>
                                    <td>
                                        <button id="memSel3" type="button" class="btn btn-light" data-dismiss="modal" >Annuler</button>
                                    </td>-->
                             
                                </tr>
                                      
                                <!--<tr>
                                    <td>&nbsp;</td><td>&nbsp;</td>
                                    <td>&nbsp;</td><td>&nbsp; </td>
                                </tr>-->
                                <tr class="equipe">
                                    <td><label class="control-label">Equipe </label></td>
                                    <td> 
                                        <select id="equSel" name="chef_id" class="form-control select2 qte_act2{{$materiel->numero}}" >
                                            @foreach($equipes as $equipe)
                                            <option value="{{$equipe->id}}">{{$equipe->intitule}} </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <!--<td>
                                         <button id="equSel2" type="button" data-id2="{{$materiel->numero}}" class="btn btn-danger btn_affecter2" onclick="blockerMembre()">Affecter</button>
                                    </td>
                                    <td>
                                        <button id="equSel3" type="button" class="btn btn-light" data-dismiss="modal" >Annuler</button>
                                    </td>-->
                                </tr>
                                <tr class="date_affecter">
                                    <td>La date d'affectation :</td>
                                    <td><input type="date" id="datepicker{{$materiel->numero}}"  value="{{date("Y-m-d")}}"></td>
                                </tr>
                                  </table>
                                  <div class="modal-footer">
                                      
                                        <button type="button" class="btn btn-danger btn_affecter" data-id="{{$materiel->numero}}">OK</button>
                                        <button type="button" class="btn " data-dismiss="modal">annuler</button>
                                    </div>
                                
                                  
                              </div>
                          </div>
                      </div>
                    </div>
                    
                    <a href="#mod{{ $materiel->numero }}Modall" role="button" class="glyphicon glyphicon-remove" data-toggle="modal"></a>
                    <div class="modal fade" id="mod{{ $materiel->numero }}Modall" tabindex="-1" role="dialog" aria-labelledby="mod{{ $materiel->numero }}Modall" aria-hidden="true">
                          <div class="modal-dialog">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                      </button>
                                  </div>
                                  <div class="modal-body text-center">
                                      Voulez-vous vraiment supprimer ce matériel ? 
                                  </div> 
                                  <div class="modal-footer">
                                        <form class="form-inline" action="{{ url('materiels/supprimer/'.$materiel->numero) }}"  method="get">
                                            {{csrf_field()}}
                                            {{method_field('DELETE')}}
                                            <button type="button" class="btn btn-light" data-dismiss="modal">Non</button>
                                            <button type="submit" class="btn btn-danger">Oui</button>
                                        </form>
                                  </div>
                              </div>
                          </div>
                      </div>
                    
                    @if(($materiel->name) || ($materiel->intitule))
                    <a href="#supprimer{{ $materiel->numero }}Modal" role="button" class="glyphicon glyphicon-import" data-toggle="modal"></a>
                     @endif
                      <div class="modal fade" id="supprimer{{ $materiel->numero }}Modal" tabindex="-1" role="dialog" aria-labelledby="supprimer{{ $materiel->numero }}ModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                              <div class="modal-content">
                                  <div class="modal-header">
                                   
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                      </button>
                                  </div>
                                  @if($materiel->id_affectation_user )
                                  <form action="{{ url('materiels/rendu_user') }}" method="post">
                                    {{ csrf_field() }}
                                  <div class="modal-body text-center">
                                      Le matériel est-il vraiment rendu ? 
                                        <input type="hidden" name="id_affecter_user" value="{{$materiel->id_affectation_user}}">
                                  <input type="hidden" name="num_materiel_user" value="{{$materiel->numero}}">
                                      <table class="table table-bordered table-striped table_modifier">
                                        <tr>
                                            <td>La date d'affectation :</td>
                                            <td><input type="date" id="datepicker{{$materiel->numero}}" class="form-control date_rendu" name="date_affecter_user"  value="{{date("Y-m-d")}}"></td>
                                        </tr>
                                      </table>
                                  </div> 
                                  <div class="modal-footer">
                                      
                                      <button type="button" class="btn btn-light" data-dismiss="modal">Non</button>
                                         <!-- <a href="{{ url('materiels/user_mat/'.$materiel->id_affectation_user.'/'.$materiel->numero) }}" type="submit" class="btn btn-danger">Oui</a>-->
                                          <button type="submit" class="btn btn-danger" >Oui</button>
                                  
                                  </div>
                                </form>
                                @endif
                                @if($materiel->id_affectaion_equipe)
                                  <form action="{{ url('materiels/rendu_equipe') }}" method="post">
                                    {{ csrf_field() }}
                                  <div class="modal-body text-center">
                                      Le matériel est-il vraiment rendu ? 
                                        
                                  <input type="hidden" name="id_affecter_equipe" value="{{$materiel->id_affectaion_equipe}}">
                                  <input type="hidden" name="num_materiel_equipe" value="{{$materiel->numero}}">
                                      <table class="table table-bordered table-striped table_modifier">
                                        <tr>
                                            <td>La date d'affectation equipe:</td>
                                            <td><input type="date" id="datepicker{{$materiel->numero}}" class="form-control date_rendu" name="date_affecter_equipe"  value="{{date("Y-m-d")}}"></td>
                                        </tr>
                                      </table>
                                  </div> 
                                  <div class="modal-footer">
                                      
                                
                                  <button type="button" class="btn btn-light" data-dismiss="modal">Non</button>
                                          <!--<a href="{{ url('materiels/equipe_mat/'.$materiel->id_affectaion_equipe.'/'.$materiel->numero) }}" type="submit" class="btn btn-danger">Oui</a>-->
                                          <button type="submit" class="btn btn-danger" >Oui</button>
                                  </div>
                                </form>
                                @endif
                              </div>
                          </div>
                      </div>
                      <a href="#mod{{ $materiel->numero }}Moda" role="button" class="glyphicon glyphicon-file btn_historique" data-toggle="modal" data-id_historique="{{ $materiel->numero }}" ></a>
                    <div class="modal fade" id="mod{{ $materiel->numero }}Moda" tabindex="-1" role="dialog" aria-labelledby="mod{{ $materiel->numero }}ModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                      </button>
                                  </div>
                                  <div class="modal-body text-center">
                                      <table class="table table-striped table_historique">
                                     
                                      
                                      </table> 
                                  </div> 
                                  <div class="modal-footer">
                                      
                                      <button type="button" class="btn btn-danger" data-dismiss="modal">OK</button>
                                      
                                  </div>
                              </div>
                          </div>
                      </div>
                      
                    <a href="#modd{{ $materiel->numero }}Moda" role="button" class="glyphicon glyphicon-pencil btn_modifier" data-toggle="modal" data-id_modifier="{{ $materiel->numero }}" data-id_modifierr="{{ $materiel->nom_mat }}" ></a>
                    <div class="modal fade" id="modd{{ $materiel->numero }}Moda" tabindex="-1" role="dialog" aria-labelledby="modd{{ $materiel->numero }}ModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                      </button>
                                  </div>
                                  <div class="modal-body text-center">
                                      
                                      <form action="{{ url('materiels/modifier') }}" method="post">
                                      {{ csrf_field() }}
                                      <input type="hidden" name="num" value="{{$materiel->numero}}">
                                      <input type="hidden" name="nom_mat" value="{{$materiel->nom_mat}}">
                                      <table class="table table-striped table_modifier">
                                        <tr>
                                            <td>Type de Changement :</td>
                                            <td>
                                                    <select name="type_changement" id="typ_ch" class="form-control select2 sele2">
                                                            <option value="choix" selected>selectionner un choix</option>    
                                                            <option value="catégories" >Catégories</option>
                                                            <option value="materiel" >Materiel</option>
                                                        </select>
                                            </td>
                                        </tr>
                                          <tr class="mat"><td>modifier le libellé du materiel </td><td><input name="inpLib" type="text" class="libId{{$materiel->numero}} form-control" ></td></tr>
                                          <tr class="cat"><td>modifier la catégorie du materiel </td><td><input name="inpCat" type="text" class="catId{{$materiel->numero}} form-control"></td></tr>
                                            
                                          <!--   <tr><td><button type="submit">ok</button></td></tr> -->
                                      </table> 
                                      <div class="modal-footer">
                                      
                                      <button type="submit" class="btn btn-danger" >OK</button>
                                      <button type="button" class="btn " data-dismiss="modal">annuler</button>
                                  </div>
                                      </form>
                                  </div> 
                                  
                              </div>
                          </div>
                      </div>
                      
                    
                    </div>
                    
                    
                    </td>
                  </tr>
                  @endforeach
                 </tbody>
                <tfoot>
                <tr>
                <th>Numéro materiel </th>
                  <th>Catégorie</th>
                  <th>Affecté à </th>
                  <th>Date affectation</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          
            
            
        </div> 
        <div class="active tab-pane" id="modifier">
        </div>
    
    </div> </div>

      </div>
      
    </div>
    
    <!--pane2-->

    <!--pane2-->

    
    
    <!--tab pane-->

 @endsection
