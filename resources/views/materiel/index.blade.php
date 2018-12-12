@extends('layouts.master')

@section('title','LRI | Liste des matérieaux')

@section('header_page')

      <h1>
        Matériel
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><a href="{{url('theses')}}">Matériel</a></li>
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
      <div class="col-md-12">
        <div class="box col-xs-12">
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
              <a href="{{url('theses/create')}}" type="button" class="btn btn-block btn-success btn-lg"><i class="fa fa-plus"></i> Nouveau matériel</a>
            </div>
            @endif
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nom</th>
                  <th>Type</th>
                  <th>Affecté à </th>
                  <th>Date affectation</th>
                  
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
                   {{$materiel->name}} 
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
                  </tr>
                  @endforeach
                 </tbody>
                <tfoot>
                <tr>
                  <th>Nom</th>
                  <th>Type</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
        
      </div>
      
    </div>
    
 @endsection
