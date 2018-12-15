@extends('layouts.master')

 @section('title','LRI | Détails partenaire')

@section('header_page')

       <h1>
        Partenaires
        <small>Détails</small>
      </h1>
        <ol class="breadcrumb">
          <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
          <li><a href="{{url('partenaires')}}">Partenaires</a></li>
          <li class="active">Détails</li>
        </ol>

@endsection

@section('asidebar')
	<li >
          <a href="{{url('dashboard')}}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>

         <li >
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

       
        <li>
          <a href="{{url('projets')}}">
            <i class="fa fa-folder-open-o"></i> 
            <span>Projets</span>
          </a>
        </li>
        
        <li class="active">
          <a href="{{url('partenaires')}}">
            <i class="fa fa-group"></i> 
            <span>Partenaires</span>
          </a>
        </li>

         <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span>Contacts</span>
            <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('trombinoscopecontact')}}"><i class="fa fa-id-badge"></i> Trombinoscope</a></li>
            <li><a href="{{url('contacts')}}"><i class="fa fa-list"></i> Liste</a></li>
          </ul>
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

            <div class="col-md-8">
      <div class="nav-tabs-custom">
       <ul class="nav nav-tabs">
              <li class="active"><a href="#apropos" data-toggle="tab">A propos</a></li>
              @if(Auth::user()->role->nom == 'admin' )

              <li><a href="#modifier" data-toggle="tab">Modifier</a></li>
              @endif
            </ul>

      <div class="tab-content">

        <div class="active tab-pane" id="apropos">
          <div class="box-body">
          <!-- The time line -->
          <ul class="timeline" style="padding-top: 30px;">
            <!-- timeline time label -->
            
            <!-- /.timeline-label -->
            <!-- timeline item -->
            <li>
              <i class="fa  fa-tag bg-red"></i>

              <div class="timeline-item">

                <h3 class="timeline-header"><a >nom</a></h3>

                <div class="timeline-body">
                  {{$partenaire->nom}} 
                </div>
              </div>
            </li>
            <!-- END timeline item -->
            <!-- timeline item -->
            
            <!-- END timeline item -->
            <!-- timeline item -->
            <li>
              <i class="fa fa-comment bg-yellow"></i>

              <div class="timeline-item">
              <h3 class="timeline-header"><a >Type</a></h3>

                <div class="timeline-body">
                  {{$partenaire->type}}
                </div>
              </div>
            </li>

            <li>
              <i class="fa fa-search bg-purple"></i>

              <div class="timeline-item">
              <h3 class="timeline-header"><a >Pays</a></h3>

                <div class="timeline-body">
                  {{$partenaire->pays}}
                </div>
              </div>
            </li>
            <li>
              <i class="fa fa-search bg-purple"></i>

              <div class="timeline-item">
              <h3 class="timeline-header"><a >Ville</a></h3>

                <div class="timeline-body">
                  {{$partenaire->ville}}
                </div>
              </div>
            </li>
            <li>
              <i class="fa fa-clock-o bg-gray"></i>
            </li>
          </ul>
        </div>
      </div>

      <div class="tab-pane" id="modifier">
          <form class="well form-horizontal" action="{{url('partenaires/'. $partenaire->id) }} " method="post"  id="contact_form">
            <input type="hidden" name="_method" value="PUT">
              {{ csrf_field() }}
              <fieldset>

                      <div class="form-group ">
                        <label class="col-md-3 control-label">Nom</label>  
                        <div class="col-md-9 inputGroupContainer">
                          <div class="input-group" style="width: 70%">
                            <input  name="nom" class="form-control" value="{{$partenaire->nom}}" type="text">
                          </div>
                        </div>
                      </div>


                    

                     <div class="form-group ">
                        <label class="col-md-3 control-label">Type</label>  
                        <div class="col-md-9 inputGroupContainer">
                          <div class="input-group" style="width: 70%">
                            <input  name="type" class="form-control" value="{{$partenaire->type}}" type="text">
                          </div>
                        </div>
                      </div>

                      <div class="form-group ">
                        <label class="col-md-3 control-label">Pays</label>  
                        <div class="col-md-9 inputGroupContainer">
                          <div class="input-group" style="width: 70%">
                            <input  name="pays" class="form-control" value="{{$partenaire->pays}}" type="text">
                          </div>
                        </div>
                      </div>
                      
                      <div class="form-group ">
                        <label class="col-md-3 control-label">Ville</label>  
                        <div class="col-md-9 inputGroupContainer">
                          <div class="input-group" style="width: 70%">
                            <input  name="ville" class="form-control" value="{{$partenaire->ville}}" type="text">
                          </div>
                        </div>
                      </div>
 

              </fieldset>

              <div style="padding-top: 30px; margin-left: 35%;">
              <a href="{{url('partenaires/'.$partenaire->id.'/details')}}" class=" btn btn-lg btn-default"><i class="fa  fa-mail-reply"></i> &nbsp;Annuler</a>
               <button type="submit" class=" btn btn-lg btn-primary"><i class="fa fa-check"></i> Modifier</button> 
              </div>
            </form>
      </div>
      </div>
      </div>
    </div>

            <div class="col-md-4">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src=" {{asset($partenaire->logo)}}" alt="User profile picture">

              <h3 class="profile-username text-center">{{$partenaire->nom}} </h3>

             
             
            </div>
              <!-- USERS LIST -->

              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Membres de l'équipe</h3>

                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                  <ul class="users-list clearfix">
                    @foreach($contacts as $contact)
                    <li>
                      <img src="{{asset($contact->photo)}}" alt="User Image">
                      <a class="users-list-name" href="{{url('contacts/'.$contact->id.'/details')}}">{{$contact->name}}</a>
                      <span class="users-list-date">{{$contact->prenom}}</span>
                    </li>
                    @endforeach
                  </ul>
                  <!-- /.users-list -->
                </div>
                <!-- /.box-body -->
              </div>
              <!--/.box -->
            </div>

            <!-- timeLine start -->
    

    </div>
@endsection