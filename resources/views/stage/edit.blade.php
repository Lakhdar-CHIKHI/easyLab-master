@extends('layouts.master')

@section('title','LRI | Modifier un  Stage')

@section('header_page')
      <h1>
      Stages
        <small>Modifier</small>
      </h1>
      <ol class="breadcrumb">
      <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li><a href="{{url('stages')}}">Stages</a></li>
        <li class="active">Modifier</li>
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
         <li class="active">
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

            <form class="well form-horizontal" action="{{url('stages/'. $stage->id) }}" method="post"  id="contact_form" >
              <input type="hidden" name="_method" value="PUT">
              {{ csrf_field() }}
              <fieldset>

                <!-- Form Name -->
                <legend><center><h2><b>Modifier Stage</b></h2></center></legend><br>



<div class=" col-md-12 ">   <div class="form-group col-md-10 "> 
                        <label class="col-xs-3 control-label">Titre</label>  
                        <div class="col-xs-9 inputGroupContainer @if($errors->get('titre')) has-error @endif">
                          <div style="width: 70%">
                            <input  name="titre" class="form-control" placeholder="Titre" type="text" value="{{ $stage->titre}}">
                            <span class="help-block">
                                @if($errors->get('titre'))
                                  @foreach($errors->get('titre') as $message)
                                    <li> {{ $message }} </li>
                                  @endforeach
                                @endif
                            </span>
                          </div>
                        </div>
                  </div>  

                  </div>


<div class=" col-md-12 ">   <div class="form-group col-md-10 "> 
                      <label class="col-md-3 control-label">Sujet</label>
                      <div class="col-md-9 inputGroupContainer @if($errors->get('sujet')) has-error @endif">
                        <div style="width: 70%">
                          <textarea name="sujet" class="form-control" rows="3" placeholder="Entrez ...">{{ $stage->sujet}}
                          </textarea>
                          <span class="help-block">
                                @if($errors->get('sujet'))
                                  @foreach($errors->get('sujet') as $message)
                                    <li> {{ $message }} </li>
                                  @endforeach
                                @endif
                            </span>
                        </div>
                      </div>
                  </div>

                
                  </div>


<div class=" col-md-12 ">   <div class="form-group col-md-10 "> 
                        <label class="col-xs-3 control-label">Lieu (*)</label>  
                        <div class="col-xs-9 inputGroupContainer @if($errors->get('part_id')) has-error @endif">
                          <div style="width: 70%">
                            <select name="part_id" class="form-control select2" >
                            <option value="{{$stage->partenaire->id}}">{{$stage->partenaire->nom}}</option>
                           
                               @foreach($partenaires as $partenaire)
                              <option value="{{$partenaire->id}}">{{$partenaire->nom}} </option>
                               @endforeach
                            </select>

                            <span class="help-block">
                                @if($errors->get('part_id'))
                                  @foreach($errors->get('part_id') as $message)
                                    <li> {{ $message }} </li>
                                  @endforeach
                                @endif
                            </span>

                          </div>
                        </div>
                  </div>  
                  <div class="col-md-2 pull-left" style="padding-bottom: 20px">
                <a id="create-part" type="button" class="btn btn-block btn-success btn-lg" data-toggle="modal" data-target="#modalFormpart"><i class="fa fa-plus"></i> <i class="fa fa-group"></i></a>
            </div> 
                  </div>


<div class=" col-md-12 ">   <div class="form-group col-md-10 "> 
                        <label class="col-xs-3 control-label">Date d'inscription</label>  
                        <div class="col-xs-9 inputGroupContainer @if($errors->get('date_debut')) has-error @endif">
                          <div style="width: 70%">
                            <input name="date_debut" id="date_debut" type="date" class="form-control pull-right"  data-mask id="datepicker"  value="{{ $stage->date_debut}}">
                            <span class="help-block">
                                @if($errors->get('date_debut'))
                                  @foreach($errors->get('date_debut') as $message)
                                    <li> {{ $message }} </li>
                                  @endforeach
                                @endif
                            </span>
                          </div>
                        </div>
                  </div>   


                  
                  </div>


<div class=" col-md-12 ">   <div class="form-group col-md-10 "> 
                        <label class="col-xs-3 control-label">Presente par</label>  
                        <div class="col-xs-9 inputGroupContainer @if($errors->get('user_id')) has-error @endif">
                          <div style="width: 70%">
                            <select name="user_id" id="user" class="form-control select2" >
                              <option value="{{$stage->user->id}}">{{$stage->user->name}} {{$stage->user->prenom}}</option>
                              @foreach($membres as $membre)
                              <option value="{{$membre->id}}">{{$membre->name}} {{$membre->prenom}}</option>
                               @endforeach
                            </select>
                            <span class="help-block">
                                @if($errors->get('user_id'))
                                  @foreach($errors->get('user_id') as $message)
                                    <li> {{ $message }} </li>
                                  @endforeach
                                @endif
                            </span>
                          </div>
                        </div>
                  </div>  
   

                  </div>


<div class=" col-md-12 ">   <div class="form-group col-md-10 "> 
                        <label class="col-xs-3 control-label">Date fin</label>  
                        <div class="col-xs-9 inputGroupContainer">
                          <div style="width: 70%">
                            <input name="date_soutenance"type="date" class="form-control pull-right"   value="{{old('date_soutenance')}}"value="{{ $stage->date_fin}}">
                          </div>
                        </div>
                  </div>

                  </div>


<div class=" col-md-12 ">   <div class="form-group col-md-10 "> 
                      <label class="col-md-3 control-label">Détails</label>
                      <div class="col-md-9 inputGroupContainer">
                        <div style="width: 70%">
                          <input type="file" id="exampleInputFile" value="{{asset('$stage->detail') }}">
                        </div>
                      </div>
                  </div>
                  </div>


              </fieldset>

              <div class="row" style="padding-top: 30px; margin-left: 35%;">
              <a href="{{url('stages')}}" class=" btn btn-lg btn-default"><i class="fa  fa-mail-reply"></i> &nbsp;Annuler</a>
               <button type="submit" class=" btn btn-lg btn-primary"><i class="fa fa-check"></i> Modifier</button> 
                  </div>
            </form>
          </div>
         </div><!-- /.container -->
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
            
    
            <form class="well form-horizontal" action=" {{url('partenaires')}} " method="post"  id="contact_form " enctype="multipart/form-data">
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

 