@extends('layouts.master')

@section('title','LRI | Ajouter un membre')

@section('header_page')

      <h1>
        Actualites
        <small>Nouveau</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li><a href="{{url('membres')}}">Actualite</a></li>
        <li class="active">Nouveau</li>
      </ol>

@endsection

@section('asidebar')

        <li >
          <a href="{{url('dashboard')}}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="active">
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

        
        <li>
          <a href="{{url('projets')}}">
            <i class="fa fa-folder-open-o"></i> 
            <span>Projets</span>
          </a>
        </li>
        
        @if(Auth::user()->role->nom == 'admin' )
        <li>
          <a href="{{url('materiels')}}">
            <i class="glyphicon glyphicon-blackboard"></i> 
            <span>Materiels</span>
          </a>
        </li>
        @endif
        
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

            <form class="well form-horizontal" method="POST" action="{{url('actualites')}}" id="contact_form" enctype="multipart/form-data" >
              {{ csrf_field() }}
              <fieldset>

                <!-- Form Name -->
                <legend><center><h2><b>Nouveau Actualite</b></h2></center></legend><br>
                @if (session()->has('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
                
            @endif
                <!-- Text input-->
                    <div class="col-md-10">

                      <div class="form-group ">
                        <input type="hidden" name="id_user" value="{{Auth::user()->id}}">
                        <label class="col-md-3 control-label">Titre *</label>  
                        <div class="col-md-9 inputGroupContainer @if($errors->get('titre')) has-error @endif">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-tags"></i></span>
                            <input  name="titre" placeholder="Titre" class="form-control" style="height: auto;"  type="text" value="{{old('titre')}}">
                           </div>
                            <span class="help-block">
                                @if($errors->get('titre'))
                                  @foreach($errors->get('titre') as $message)
                                    <li> {{ $message }} </li>
                                  @endforeach
                                @endif
                            </span>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-md-3 control-label">Date PUB *</label>  
                        <div class="col-md-9 inputGroupContainer @if($errors->get('date_pub')) has-error @endif">
                              <div class="input-group">
                                      <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                      <input name="date_pub" type="date" class="form-control" style="height: auto;" value="{{old('date_pub')}}">
                                  </div>
                                  <span class="help-block">
                                          @if($errors->get('date_pub'))
                                            @foreach($errors->get('date_pub') as $message)
                                              <li> {{ $message }} </li>
                                            @endforeach
                                          @endif
                                      </span>
                        </div>
                  </div>
                       <!-- Text input-->

                      <div class="form-group">
                        <label class="col-md-3 control-label">resume *</label>  
                        <div class="col-md-9 inputGroupContainer @if($errors->get('resume')) has-error @endif">
                          <div class="input-group">
                            
                            <textarea  name="resume" placeholder="resume" class="form-control" style="height: auto;" id="mytextarea" rows="10"  value="{{old('resume')}}"></textarea>
                          </div>
                            <span class="help-block">
                                @if($errors->get('resume'))
                                  @foreach($errors->get('resume') as $message)
                                    <li> {{ $message }} </li>
                                  @endforeach
                                @endif
                            </span>
                        </div>
                      </div>

                      
                        
                        
  
  
                      
                             <div class="form-group">
                                <label class="col-md-3 control-label">Photo</label>  
                                <div class="col-md-9 inputGroupContainer">
                                <input name="img_actualite" class="form-control" type="file" accept="image/*" style="height: auto;">
                               </div>
                              </div>
                           
                    </div>

                    
               

              </fieldset>

              <div class="col-md-10" style="padding-top: 30px; margin-left: 35%;">
              <a href="{{url('actualites')}}" class=" btn btn-lg btn-default"><i class="fa  fa-mail-reply"></i> &nbsp;Annuler</a>
               <button type="submit" class=" btn btn-lg btn-primary"><i class="fa fa-check"></i> Valider</button> 
                  </div>
            </form>
          </div>
         </div><!-- /.container -->
       </div>
      </div>

  @endsection

  