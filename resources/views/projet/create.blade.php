


@extends('layouts.master')

@section('title','LRI | Liste des projets')

@section('header_page')

      <h1>
        Projets
        <small>Nouveau</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('dashboard')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li><a href="{{url('projets')}}">Projets</a></li>
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
            <li ><a href="{{url('trombinoscope')}}"><i class="fa fa-id-badge"></i> Trombinoscope</a></li>
            <li ><a href="{{url('membres')}}"><i class="fa fa-list"></i> Liste</a></li>
          </ul>
        </li>
        <li class="active">
            <a href="{{url('partenaires')}}">
              <i class="fa fa-group"></i> 
              <span>Partenaires</span>
            </a>
          </li>
          <li >
              <a href="{{url('contacts')}}">
                <i class="fa fa-list"></i> 
                <span>Contacts</span>
              </a>
            </li>
            <li>
                <a href="{{url('stages')}}">
                  <i class="fa fa-file-pdf-o"></i> 
                  <span>Stages</span>
                </a>
              </li>
         <li>
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

       
        <li class=" active">
          <a href="{{url('projets')}}">
            <i class="fa fa-folder-open-o"></i> 
            <span>Projets</span>
          </a>
        </li>
        <li >
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
     
    <div class="row" style="padding-top: 30px">
      <div class="col-xs-12">
        <div class="box">
            
          <div class="container col-md-12">

            <form class="well form-horizontal" action="{{url('projets')}}" method="post"  id="contact_form" enctype="multipart/form-data">
              {{ csrf_field() }}

              <fieldset>

                <!-- Form Name -->
                <legend><center><h2><b>Nouveau projet</b></h2></center></legend><br>
                


<div class="form-group col-md-12 ">   <div class="form-group col-md-10 "> 
                        <label class="col-xs-3 control-label">Intitulé (*)</label>  
                        <div class="col-xs-9 inputGroupContainer @if($errors->get('intitule')) has-error @endif">
                          <div style="width: 100%">
                            <input  name="intitule" class="form-control" placeholder="Intitulé" type="text" value="{{old('intitule')}}">
                            <span class="help-block">
                                @if($errors->get('intitule'))
                                  @foreach($errors->get('intitule') as $message)
                                    <li> {{ $message }} </li>
                                  @endforeach
                                @endif
                            </span>
                          </div>
                        </div>
                  </div>  

                  </div>


                      <div class="form-group col-md-12 ">   <div class="form-group col-md-10 "> 
                      <label class="col-md-3 control-label">Résumé (*)</label>
                      <div class="col-md-9 inputGroupContainer @if($errors->get('resume')) has-error @endif">
                        <div style="width: 100%">
                          <textarea class="form-control" id="mytextarea" name="resume" rows="3" placeholder="Résumé ...">{{old('resume')}}</textarea>
                          <span class="help-block">
                                @if($errors->get('resume'))
                                  @foreach($errors->get('resume') as $message)
                                    <li> {{ $message }} </li>
                                  @endforeach
                                @endif
                            </span>
                        </div>
                      </div>
                  </div>
                  </div>


<div class="form-group col-md-12 ">   <div class="form-group col-md-10 "> 
                        <label class="col-xs-3 control-label">Type (*)</label>  

                        <div class="col-xs-9 inputGroupContainer @if($errors->get('type')) has-error @endif">
                          <div style="width: 100%">
                            <select name='type' class="form-control select" value="{{old('type')}}">*
                              <option></option>
                              <option>Poster</option>
                              <option>Article court</option>
                              <option>Article long</option>
                              <option>Publication(Revue)</option>
                              <option>Chapitre d'un livre</option>
                              <option>Livre</option>
                              <option>Brevet</option> 
                            </select>
                            <span class="help-block">
                                @if($errors->get('type'))
                                  @foreach($errors->get('type') as $message)
                                    <li> {{ $message }} </li>
                                  @endforeach
                                @endif
                            </span>
                          </div>
                        </div>
                  </div> 


                  </div>


                      <div class="form-group col-md-12 ">   <div class="form-group col-md-10 "> 
                        <label class="col-xs-3 control-label">Membres externes</label>  
                        <div class="col-md-9 inputGroupContainer @if($errors->get('contact[]')) has-error @endif">
                      <div style="width: 100%">
                        <select name ="contact[]" id="contact"  class="form-control select2 " multiple="multiple" data-placeholder="Selectionnez les Membres" value="{{old('contact[]')}}">
                          @foreach($contacts as $contact)
                              <option value="{{$contact->id}}">{{$contact->nom}} {{$contact->prenom}}</option>
                           @endforeach
                        </select>
                        
                      </div>
                    </div>
                  </div>
                  <div class="col-md-1">
                <a  type="button" id="create-contact" class="btn btn-block btn-success btn-lg" data-toggle="modal" data-target="#modalForm"><i class="fa fa-user-plus"></i> </a>
              </div>

                  </div>


                      <div class="form-group col-md-12 ">   <div class="form-group col-md-10 "> 
                        <label class="col-xs-3 control-label">Chef du projet (*)</label>  
                        <div class="col-xs-9 inputGroupContainer @if($errors->get('chef_id')) has-error @endif">
                          <div style="width: 100%">
                            <select name="chef_id" class="form-control select2" value="{{old('chef_id')}}">
                              <option></option>
                               @foreach($membres as $membre)
                              <option value="{{$membre->id}}">{{$membre->name}} {{$membre->prenom}}</option>
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

                  </div>


<div class="form-group col-md-12 ">   <div class="form-group col-md-10 "> 
                    <label class="col-md-3 control-label">Membres (*)</label>
                    <div class="col-md-9 inputGroupContainer @if($errors->get('membre[]')) has-error @endif">
                      <div style="width: 100%">
                        <select name ="membre[]"  class="form-control select2 " multiple="multiple" data-placeholder="Selectionnez les Membres" value="{{old('membre[]')}}">
                          @foreach($membres as $membre)
                              <option value="{{$membre->id}}">{{$membre->name}} {{$membre->prenom}}</option>
                           @endforeach
                        </select>
                        <span class="help-block">
                                @if($errors->get('membre[]'))
                                  @foreach($errors->get('membre[]') as $message)
                                    <li> {{ $message }} </li>
                                  @endforeach
                                @endif
                            </span>
                      </div>
                    </div>
                  </div>


                  </div>


<div class="form-group col-md-12 ">   <div class="form-group col-md-10 "> 
                        <label class="col-xs-3 control-label">Lien</label>  
                        <div class="col-xs-9 inputGroupContainer">
                          <div style="width: 100%">
                            <input  name="lien" class="form-control" placeholder="URL" type="url" value="{{old('lien')}}">
                          </div>
                        </div>
                  </div> 

                  </div>


<div class="form-group col-md-12 ">   <div class="form-group col-md-10 "> 
                      <label class="col-md-3 control-label">Détails</label>
                      <div class="col-md-9 inputGroupContainer">

                        <div >
                          <input  class="form-control" name="detail" type="file" style="height: auto;"> 

                        </div>
                      </div>
                  </div>
</div>
<div class="form-group col-md-12 "> <div class="form-group col-md-10">
                      <label class="col-md-3 control-label">Photo</label>  
                      <div class="col-md-9 inputGroupContainer">
                        <div>
                            <input name="img_projet" class="form-control" type="file" accept="image/*" style="height: auto;">
                        </div>
                     </div>
                    </div>
</div>
              </fieldset>

              <div class="row" style="padding-top: 30px; margin-left: 35%;">
              <a href="{{url('projets')}}" class=" btn btn-lg btn-default"><i class="fa  fa-mail-reply"></i> &nbsp;Annuler</a>
               <button type="submit" class=" btn btn-lg btn-primary"><i class="fa fa-check"></i> Valider</button> 
                  </div>
            </form>
          </div>
         </div><!-- /.container -->
       </div>
      </div>
   
   
<!-- Modal -->
<div class="modal  fade" id="modalForm" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
               <center><h2><b>Nouveau   Contact </b></h2></center>
            </div>
            
            <!-- Modal Body -->
            
    
                <form class="well form-horizontal" method="POST"  id="contform" enctype="multipart/form-data">
              {{ csrf_field() }}
              <fieldset>

              
                <!-- Text input-->
                    <div class="col-md-12">
                   


<div class=" col-md-12 ">   <div class="form-group col-md-10 "> 
                        <label class="col-md-3 control-label">Nom *</label>  
                        <div class="col-md-9 inputGroupContainer @if($errors->get('nom')) has-error @endif">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input  name="nom" id="nomC" placeholder="Nom" class="form-control"  type="text" value="{{old('nom')}}">
                           </div>
                            <span class="help-block">
                                @if($errors->get('nom'))
                                  @foreach($errors->get('nom') as $message)
                                    <li> {{ $message }} </li>
                                  @endforeach
                                @endif
                            </span>
                        </div>
                      </div>

                      </div>


<div class=" col-md-12 ">   <div class="form-group col-md-10 "> 
                        <label class="col-md-3 control-label">Prénom *</label>  
                        <div class="col-md-9 inputGroupContainer @if($errors->get('prenom')) has-error @endif">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input  name="prenom" id="prenomC" placeholder="Prénom" class="form-control"  type="text" value="{{old('prenom')}}">
                          </div>
                            <span class="help-block">
                                @if($errors->get('prenom'))
                                  @foreach($errors->get('prenom') as $message)
                                    <li> {{ $message }} </li>
                                  @endforeach
                                @endif
                            </span>
                        </div>
                      </div>

                      </div>


<div class=" col-md-12 ">   <div class="form-group col-md-10 "> 
                          <label class="col-md-3 control-label">Partenaire * </label>
                            <div class="col-md-9 selectContainer @if($errors->get('partenaire')) has-error @endif">
                              <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-users"></i></span>
                                  <select name="partenaire" id="partenaireC" class="form-control selectpicker">
                                    <option></option>
                                    
                                  </select>

                              </div>
                            

                              <span class="help-block">
                                @if($errors->get('partenaire_id'))
                                  @foreach($errors->get('partenaire_id') as $message)
                                    <li> {{ $message }} </li>
                                  @endforeach
                                @endif
                            </span>

                            </div>
                            
                      </div>
                      <div class="col-md-2 pull-left" style="padding-bottom: 20px">
                <a id="create-part" type="button" class="btn btn-block btn-success btn-lg" data-toggle="modal" data-target="#modalFormpart"><i class="fa fa-plus"></i> <i class="fa fa-group"></i></a>
            </div>

            </div>


        


<div class=" col-md-12 ">   <div class="form-group col-md-10 "> 
                        <label class="col-md-3 control-label">E-Mail *</label>  
                          <div class="col-md-9 inputGroupContainer @if($errors->get('adresse_mail')) has-error @endif">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                <input name="adresse_mail" id="adresse_mailC" type="adresse_mail" class="form-control" placeholder="Email" value="{{old('adresse_mail')}}" >
                            </div>
                            <span class="help-block">
                                @if($errors->get('adresse_mail'))
                                  @foreach($errors->get('adresse_mail') as $message)
                                    <li> {{ $message }} </li>
                                  @endforeach
                                @endif
                            </span>
                          </div>
                      </div>

                    
                      </div>


<div class=" col-md-12 ">   <div class="form-group col-md-10 "> 
                        <label class="col-md-3 control-label">Fonction*</label>  
                        <div class="col-md-9 ">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input  name="fonction" id="fonctionC" placeholder="fonction" class="form-control"  type="text" value="{{old('fonction')}}">
                           </div>
                           
                        </div>
                      </div>
                      </div>




<div class=" col-md-12 ">   <div class="form-group col-md-10 "> 
                        <label class="col-md-3 control-label">N° Téléphone *</label>  
                        <div class="col-md-9 ">
                          <div class="input-group">
                            <span class="input-group-addon"> <i class="fa fa-phone"></i></i></span>
                            <input name="tel" id="telC" type="text" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask value="{{old('tel')}}">
                               </div>
                           
                        </div>
                      </div>
                   

                  


                  


                  

              </fieldset>

              
              <div class="row" style="padding-top: 30px; margin-left: 35%;">
              
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" id="submit_cont" class="btn btn-primary submitBtn" ><i class="fa fa-check"></i> Valider</button>
            </div>
            </form>
      
            
            <!-- Modal Footer -->
        
        </div>
    </div>
</div>




    
<!-- Modal -->
<div class="modal fade" id="modalFormpart" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
               <center><h2><b>Nouveau   Partenaire</b></h2></center>
            </div>
            
            <!-- Modal Body -->
            
    
            <form class="well form-horizontal" id="partform" action=" {{url('partenaires')}} " method="post"  id="contact_form " enctype="multipart/form-data">
              {{ csrf_field() }}
              <fieldset>

                <!-- Form Name -->
               

              


<div class=" col-md-12 ">   <div class="form-group col-md-10 "> 
                        <label class="col-xs-3 control-label">nom (*)</label>  
                        <div class="col-xs-9 inputGroupContainer @if($errors->get('nom')) has-error @endif">
                          <div style="width: 100%">
                            <input  name="nom" id="nomP" class="form-control" placeholder="nom" type="text" value="{{old('titre')}}">
                              <span class="help-block">
                                @if($errors->get('nom'))
                                  @foreach($errors->get('nom') as $message)
                                    <li> {{ $message }} </li>
                                  @endforeach
                                @endif
                            </span>
                              
                          </div>
                        </div>
                  </div>  
                  </div>


<div class=" col-md-12 ">   <div class="form-group col-md-10 "> 
                      <label class="col-md-3 control-label">type</label>
                      <div class="col-md-9 inputGroupContainer" >
                        <div style="width: 100%">
                          <input  name="type"  id="typeP" class="form-control" placeholder="intitule" type="text" value="{{old('type')}}">
                        </div>
                      </div>
                  </div>

                  </div>


<div class=" col-md-12 ">   <div class="form-group col-md-10 "> 
                      <label class="col-md-3 control-label">Pays (*)</label>
                      <div class="col-md-9 inputGroupContainer @if($errors->get('pays')) has-error @endif" >
                        <div style="width: 100%">
                          <input name="pays" id="paysP" class="form-control" type="text" placeholder="Entrez ...">{{old('pays')}}</textarea>

                            <span class="help-block">
                                @if($errors->get('pays'))
                                  @foreach($errors->get('pays') as $message)
                                    <li> {{ $message }} </li>
                                  @endforeach
                                @endif
                            </span>

                        </div>
                      </div>
                  </div>
                  </div>


<div class=" col-md-12 ">   <div class="form-group col-md-10 "> 
                      <label class="col-md-3 control-label">Ville (*)</label>
                      <div class="col-md-9 inputGroupContainer @if($errors->get('ville')) has-error @endif" >
                        <div style="width: 100%">
                          <input name="ville" id="villeP" class="form-control" type="text" placeholder="Entrez ...">{{old('ville')}}</textarea>

                            <span class="help-block">
                                @if($errors->get('ville'))
                                  @foreach($errors->get('ville') as $message)
                                    <li> {{ $message }} </li>
                                  @endforeach
                                @endif
                            </span>

                        </div>
                      </div>
                  </div>

                  </div>


<div class=" col-md-12 ">   <div class="form-group col-md-10 "> 
                              <label class="col-md-4 control-label">Photo</label>  
                              <div class="col-md-8 inputGroupContainer">
                              <input name="img" id="imgP" type="file" >
                             </div>
                            </div>
                            </div>


           
                  

              </fieldset>

              <div class="row" style="padding-top: 30px; margin-left: 35%;">
              
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" id="submit_part" class="btn btn-primary submitBtn" ><i class="fa fa-check"></i> Valider</button>
          </div>
            </form>
            </div>
            
            <!-- Modal Footer -->
        
        </div>
    </div>
</div>









  @endsection
  