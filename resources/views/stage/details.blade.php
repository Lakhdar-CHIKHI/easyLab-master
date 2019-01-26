@extends('layouts.master')

 @section('title','LRI | Détails  Stage')

@section('header_page')
    <h1>
    Stages
      <small>Détails</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li><a href="{{url('stages')}}">Stages</a></li>
      <li class="active">Détails</li>
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
      <div class="col-md-12">
           <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Informations</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="box-body">
                  <div class="col-md-3">
                    <strong>Titre</strong>
                  </div>
                  <div class="col-md-9">
                    <p class="text-muted">
                      {{ $stage->titre}}
                    </p>
                  </div>
                  <div class="col-md-3">
                    <strong>Sujet</strong>
                  </div>
                  <div class="col-md-9">
                    <p class="text-muted">
                      {{ $stage->sujet}}
                    </p>
                  </div>
                  
                  <strong><i class="margin-r-5"></i></strong>
                  <hr>

                  <div class="col-md-3">
                    <strong><i class="fa fa-user margin-r-5"></i>Stagiere </strong>
                  </div>
                  <div class="col-md-9">
                    <a href="{{url('membres/'.$stage->user_id.'/details')}}">{{$stage->user->name}} {{$stage->user->prenom}}</a>
                  </div>

                  <strong><i class="margin-r-5"></i></strong>
                  <hr>

                  <div class="col-md-3">
                    <strong><i class="fa fa-user margin-r-5"></i> Lieu </strong>
                  </div>
                  <div class="col-md-9">
                      <a href="{{url('partenaires/'.$stage->partenaire_id.'/details')}}">{{$stage->partenaire->nom}}</a>                 
                  </div>
                  <strong><i class="margin-r-5"></i></strong>
                <hr>
                <div class="col-md-3">
                  <strong><i class="fa fa-calendar margin-r-5"></i>Date debut</strong>                
                 </div>
                  <div class="col-md-9">
                    <p class="text-muted">
                      {{ $stage->date_debut}}
                    </p>
                  </div>

                <strong><i class="margin-r-5"></i></strong>
                  <hr>

                  <div class="col-md-3">
                  <strong><i class="fa fa-calendar margin-r-5"></i>Date de fin</strong>                
                 </div>
                  <div class="col-md-9">
                    <p class="text-muted">
                      {{ $stage->date_fin}}
                    </p>
                  </div>

                   <strong><i class="margin-r-5"></i></strong>
                  <hr>

                  @if($stage->detail)
                   <div class="col-md-3">
                    
                  <strong><i class="fa fa-calendar margin-r-5"></i>Détails</strong>                
                 </div>
                  <div class="col-md-9">
                    <p class="text-muted">
                      <a href="{{asset( $stage->detail)}}">Lien fichier</a>
                    </p>
                  </div>
                  @endif
   
              
            </div>
            <!-- /.box-body -->
          </div>
          
         </div><!-- /.container -->
       </div>
      </div>
@endsection