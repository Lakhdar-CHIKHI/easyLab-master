@extends('layouts.master')

@section('title','LRI | Paramétre')

@section('header_page')
    <h1>
        Paramètres
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active"><a href="{{url('parametre')}}">Paramètres</a></li>
        
      </ol>
@endsection

@section('asidebar')
  <li class="active" >
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
        <li>
            <li>
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
        
        <li >
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

          <li class="active">
          <a href="{{url('parametre')}}">
            <i class="fa fa-gears"></i> 
            <span>Paramètre</span></a>
          </li>
          @endif
@endsection

@section('content')

<div class="row">
      <div class="col-xs-12">
        <div class="box">
            
          <div class="container col-xs-12">

            <form class="well form-horizontal" action=" {{url('parametre')}}" method="post"  id="contact_form" enctype="multipart/form-data">
              {{ csrf_field() }}
              <fieldset>

                <!-- Form Name -->
                <legend><center><h2><b>Informations du Laboratoire</b></h2></center></legend><br>
                @if (session()->has('success'))
                            <div class="alert alert-success">
                                {{session('success')}}
                            </div>
                            
                        @endif
              <div class="form-group ">
                        <label class="col-md-3 control-label">Nom du laboratoire *</label>  
                        <div class="col-lg-7 inputGroupContainer @if($errors->get('nom')) has-error @endif">
                          <div class="input-group col-md-12" >
                            <input  name="nom" class="form-control " placeholder="Le nom" type="text" value="{{$labo->nom}}">
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
                  <div class="form-group">
                      <label class="col-md-3 control-label">A propos *</label>  
                      <div class="col-md-7 inputGroupContainer @if($errors->get('propos')) has-error @endif">
                        <div class="input-group col-md-12">
                          
                          <textarea  name="propos" placeholder="propos" class="form-control"  id="mytextarea" rows="10"  >{{$labo->propos}}</textarea>
                        </div>
                          <span class="help-block">
                              @if($errors->get('propos'))
                                @foreach($errors->get('propos') as $message)
                                  <li> {{ $message }} </li>
                                @endforeach
                              @endif
                          </span>
                      </div>
                    </div> 
                    <div class="form-group ">
                      <label class="col-md-3 control-label">Lieu *</label>  
                      <div class="col-md-7 inputGroupContainer @if($errors->get('lieu')) has-error @endif">
                        <div class="input-group col-md-12">
                          <input  name="lieu" class="form-control" placeholder="Lieu" type="text" style="height:auto;" value="{{$labo->lieu}}">
                        </div>
                        <span class="help-block">
                          @if($errors->get('lieu'))
                            @foreach($errors->get('lieu') as $message)
                              <li> {{ $message }} </li>
                            @endforeach
                          @endif
                      </span>
                      </div>
                </div> 
                <div class="form-group ">
                  <label class="col-md-3 control-label">Mail *</label>  
                  <div class="col-md-7 inputGroupContainer @if($errors->get('mail')) has-error @endif">
                    <div class="input-group col-md-12">
                      <input  name="mail" class="form-control" placeholder="Email" type="text" style="height:auto;" value="{{$labo->mail}}">
                    </div>
                    <span class="help-block">
                      @if($errors->get('mail'))
                        @foreach($errors->get('mail') as $message)
                          <li> {{ $message }} </li>
                        @endforeach
                      @endif
                  </span>
                  </div>
            </div>
            <div class="form-group ">
              <label class="col-md-3 control-label">Téléphone *</label>  
              <div class="col-md-7 inputGroupContainer @if($errors->get('tel')) has-error @endif">
                <div class="input-group col-md-12">
                  <input  name="tel" class="form-control" placeholder="Tél" type="text"style="height:auto;" value="{{$labo->tel}}">
                </div>
                <span class="help-block">
                  @if($errors->get('tel'))
                    @foreach($errors->get('tel') as $message)
                      <li> {{ $message }} </li>
                    @endforeach
                  @endif
              </span>
              </div>
        </div> 
        <div class="form-group ">
          <label class="col-md-3 control-label">Fax *</label>  
          <div class="col-md-7 inputGroupContainer @if($errors->get('fax')) has-error @endif">
            <div class="input-group col-md-12">
              <input  name="fax" class="form-control" placeholder="Fax" type="text" style="height:auto;" value="{{$labo->fax}}">
            </div>
            <span class="help-block">
              @if($errors->get('fax'))
                @foreach($errors->get('fax') as $message)
                  <li> {{ $message }} </li>
                @endforeach
              @endif
          </span>
          </div>
    </div>
            
         
             
                   <div class="form-group" style="padding-top: 20px">
                              <label class="col-md-3 control-label">Logo</label>  
                              <div class="col-md-7 inputGroupContainer @if($errors->get('logo')) has-error @endif" >
                              <input name="logo" class="form-control" type="file" accept="image/*" style="height:auto;" >
                             </div>
                     </div>
                     <div class="form-group" style="padding-top: 20px">
                        <label class="col-md-3 control-label @if($errors->get('img_lab')) has-error @endif">Photo LRIT</label>  
                        <div class="col-md-7 inputGroupContainer">
                        <input name="img_lab" class="form-control" type="file" accept="image/*"  style="height:auto;">
                       </div>
               </div>
               <div class="form-group" style="padding-top: 20px">
                  <label class="col-md-3 control-label @if($errors->get('video_lab')) has-error @endif">Video LRIT</label>  
                  <div class="col-md-7 inputGroupContainer">
                  <input name="video_lab" class="form-control" type="file" accept="video/*"  style="height:auto;">
                 </div>
         </div>
                    

              </fieldset>

              <div style="padding-top: 30px; margin-left: 35%;">
              <a href="{{url('parametre')}}" class=" btn btn-lg btn-default"><i class="fa  fa-mail-reply"></i> &nbsp;Annuler</a>
               <button type="submit" class=" btn btn-lg btn-primary"><i class="fa fa-check"></i> Valider</button> 
                  </div>
            </form>
          </div>
         </div><!-- /.container -->
       </div>
      </div>


@endsection
