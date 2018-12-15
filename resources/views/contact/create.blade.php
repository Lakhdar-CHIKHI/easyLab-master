@extends('layouts.master')

@section('title','LRI | Ajouter un contact')

@section('header_page')

      <h1>
        Membres
        <small>Nouveau</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li><a href="{{url('contacts')}}">Contacts</a></li>
        <li class="active">Nouveau</li>
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
        
        <li class="treeview active">
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
        
        <li >
          <a href="{{url('partenaires')}}">
            <i class="fa fa-group"></i> 
            <span>Partenaires</span>
          </a>
        </li>

         <li class="treeview active">
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
      <div class="col-xs-12">
        <div class="box">
            
          <div class="container col-xs-12">

            <form class="well form-horizontal" method="POST" action="{{url('contacts')}}" id="contact_form" enctype="multipart/form-data">
              {{ csrf_field() }}
              <fieldset>

                <!-- Form Name -->
                <legend><center><h2><b>Nouveau Membre</b></h2></center></legend><br>

                <!-- Text input-->
                    <div class="col-md-5">

                      <div class="form-group ">
                        <label class="col-md-3 control-label">Nom *</label>  
                        <div class="col-md-9 inputGroupContainer @if($errors->get('nom')) has-error @endif">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input  name="nom" placeholder="Nom" class="form-control"  type="text" value="{{old('nom')}}">
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


                       <!-- Text input-->

                      <div class="form-group">
                        <label class="col-md-3 control-label">Prénom *</label>  
                        <div class="col-md-9 inputGroupContainer @if($errors->get('prenom')) has-error @endif">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input  name="prenom" placeholder="Prénom" class="form-control"  type="text" value="{{old('prenom')}}">
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


                      

                      <div class="form-group"> 
                          <label class="col-md-3 control-label">Partenaire *</label>
                            <div class="col-md-9 selectContainer @if($errors->get('partenaire')) has-error @endif">
                              <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-users"></i></span>
                                  <select name="partenaire" class="form-control selectpicker">
                                    <option></option>
                                     @foreach($partenaires as $partenaire)
                                    <option value="{{$partenaire->id}}">{{$partenaire->nom}}</option>
                                    @endforeach
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

                      <div class="form-group">
                        <label class="col-md-3 control-label">E-Mail *</label>  
                          <div class="col-md-9 inputGroupContainer @if($errors->get('adresse_mail')) has-error @endif">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                <input name="adresse_mail" type="adresse_mail" class="form-control" placeholder="Email" value="{{old('adresse_mail')}}" >
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

                    
                    
                
                    <div class="form-group ">
                        <label class="col-md-3 control-label">Fonction*</label>  
                        <div class="col-md-9 ">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input  name="fonction" placeholder="fonction" class="form-control"  type="text" value="{{old('fonction')}}">
                           </div>
                           
                        </div>
                      </div>
                      <div class="form-group ">
                        <label class="col-md-3 control-label">Nature de cooperation*</label>  
                        <div class="col-md-9 ">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input  name="nature_de_cooperation" placeholder="nature de cooperation" class="form-control"  type="text" value="{{old('nature_de_cooperation')}}">
                           </div>
                           
                        </div>
                      </div>


<div class="form-group ">
                        <label class="col-md-3 control-label">N° Téléphone *</label>  
                        <div class="col-md-9 ">
                          <div class="input-group">
                            <span class="input-group-addon"> <i class="fa fa-phone"></i></i></span>
                            <input name="tel" type="text" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask value="{{old('tel')}}">
                               </div>
                           
                        </div>
                      </div>
                   

                  


                  


                  

              </fieldset>

              <div style="padding-top: 30px; margin-left: 35%;">
              <a href="{{url('membres')}}" class=" btn btn-lg btn-default"><i class="fa  fa-mail-reply"></i> &nbsp;Annuler</a>
               <button type="submit" class=" btn btn-lg btn-primary"><i class="fa fa-check"></i> Valider</button> 
                  </div>
            </form>
          </div>
         </div><!-- /.container -->
       </div>
      </div>

  @endsection

  