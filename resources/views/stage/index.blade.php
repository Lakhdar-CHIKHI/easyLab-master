@extends('layouts.master')

@section('title','LRI | Liste des stages')

@section('header_page')

      <h1>
      Stages<small>Liste</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Stages</li>
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
            <li class="active">
                <a href="{{url('stages')}}">
                  <i class="fa fa-file-pdf-o"></i> 
                  <span>Stages</span>
                </a>
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
      <div class="col-md-12">
        <div class="box col-xs-12">
          <div class="container" style="padding-top: 30px">
          <div class="row" style="padding-bottom: 20px">
             <div class="box-header col-xs-9">
              <h3 class="box-title">Liste des Stages</h3>
            </div>
            
          </div>
          </div>
            
            <!-- /.box-header -->
            <div class="box-body">
        
              <div class=" pull-right">
              <a href="{{url('stages/create')}}" type="button" class="btn btn-block btn-success btn-lg"><i class="fa fa-plus"></i> Nouveau stage</a>
            </div>
           
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Titre</th>
                  <th>Sujet</th>
                  <th>Stagiere</th>
                  <th>Lieu</th>
                  <th>Date debut</th>
                  <th>Date fin</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($stages as $stage)
                  <tr>
                    <td>{{$stage->titre}}</td>
                    <td>{{$stage->sujet}}</td>
                    <td>{{$stage->user->name}} {{$stage->user->prenom}}</td>
                    <td>{{$stage->partenaire->nom}}</td>
                    <td>{{$stage->date_debut}}</td>
                    <td>{{$stage->date_fin}}</td>
                    <td>
                      
                      <form action="{{ url('stages/'.$stage->id)}}" method="post"> 

                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                      <a href="{{ url('stages/'.$stage->id.'/details')}}" class="btn btn-info">
                        <i class="fa fa-eye"></i>
                      </a>
                    
                      <a href="{{ url('stages/'.$stage->id.'/edit')}}" class="btn btn-default">
                        <i class="fa fa-edit"></i>
                      </a>
                      
                       @if(Auth::id() == $stage->user->id || Auth::user()->role->nom == 'admin' )
                      <!-- <button type="submit" class="btn btn-danger">
                        <i class="fa fa-trash-o"></i>
                      </button> -->

                       <a href="#supprimer{{ $stage->id }}Modal" role="button" class="btn btn-danger" data-toggle="modal"><i class="fa fa-trash-o"></i></a>
                      <div class="modal fade" id="supprimer{{ $stage->id }}Modal" tabindex="-1" role="dialog" aria-labelledby="supprimer{{ $stage->id }}ModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                              <div class="modal-content">
                                  <div class="modal-header">
                                    <!--   <h5 class="modal-title" id="supprimer{{ $stage->id }}ModalLabel">Supprimer</h5> -->
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                      </button>
                                  </div>
                                  <div class="modal-body text-center">
                                      Voulez-vous vraiment effectuer la suppression ? 
                                  </div>
                                  <div class="modal-footer">
                                      <form class="form-inline" action="{{ url('stages/'.$stage->id)}}"  method="POST">
                                          @method('DELETE')
                                          @csrf
                                      <button type="button" class="btn btn-light" data-dismiss="modal">Non</button>
                                          <button type="submit" class="btn btn-danger">Oui</button>
                                      </form>
                                  </div>
                              </div>
                          </div>
                      </div>
                      @endif
                      </form>
                    </div>
                    </td>
                  </tr>
                  @endforeach
                 </tbody>
                <tfoot>
                <tr>
                  <th>Titre</th>
                  <th>Sujet</th>
                  <th>Doctorant</th>
                  <th>Lieu</th>
                  <th>Date de Debut</th>
                  <th>Date de Fin</th>
                  <th>Actions</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
        
      </div>
      
    </div>
    
 @endsection