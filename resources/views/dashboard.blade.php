@extends('layouts.master')

@section('title','LRI | Dashboard')

@section('header_page')
    <h1>
        Dashboard
   </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
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
        
        <li >
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
            <span>Paramètre</span></a>
          </li>
          @endif
          
@endsection

@section('content')
  <div class="row" style="padding-bottom: 30px">
        <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
           <div class="small-box bg-aqua">
                <div class="inner">
                   <h3>{{$membres}}</h3>
                   <p>Membres</p>
                </div>
            <div class="icon">
            <i class="ion-person"></i>
            </div>
           <a href="{{url('membres')}}" class="small-box-footer">Détails <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
                              <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
               <h3>{{$equipes}}<sup style="font-size: 20px"></sup></h3>
               <p>Equipes</p>
            </div>
            <div class="icon">
               <i class="ion-ios-people"></i>
            </div>
            <a href="{{url('equipes')}}" class="small-box-footer">Détails <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
                          <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
           <div class="small-box bg-yellow">
              <div class="inner">
                 <h3>{{$theses}}</h3>
                 <p>Thèses en cours</p>
              </div>
              <div class="icon">
               <i class="fa fa-clipboard"></i>
              </div>
              <a href="{{url('theses')}}" class="small-box-footer">Détails <i class="fa fa-arrow-circle-right"></i></a>
           </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{$articles}}</h3>

              <p>Articles</p>
            </div>
            <div class="icon">
              <i class="ion-ios-paper"></i>
            </div>
            <a href="{{url('articles')}}" class="small-box-footer">Détails <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>


                          <!-- ./col -->
  </div>
  <div style="display:inline-flex;">
    <div class="box box-success">
      <div class="box-header with-border">
        <h3 class="box-title">Articles publiés par type (LRIT)</h3>
  
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
      </div>
      <div class="box-body" >
        <div id="piechart"></div>
        
        
        <?= $lava::render('PieChart', 'IMDB', 'piechart'); ?>
        
        
      </div>
      
              <!-- /.box-body -->
    </div>
    <div class="box box-success" style="margin-left:1%;">
      <div class="box-header with-border">
        <h3 class="box-title">membres du laboratoire par équipe (LRIT)</h3>
  
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
      </div>
      <div class="box-body" >
        
        <div id="piechart2"></div>
        
        <?= $lava::render('PieChart', 'IMDB2', 'piechart2'); ?>
        
      </div>
      
              <!-- /.box-body -->
    </div>
  </div>
  <div class="box box-success">
    <div class="box-header with-border">
      <h3 class="box-title">Articles publiés par équipe</h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
      </div>
    </div>
    
    <div class="box-body reg" >
      <!--<div id="chartContainer" style="height: 300px; width: 100%;"></div>-->
      
      <canvas id="bar-chart-grouped" class="reg"></canvas>

    </div>
            <!-- /.box-body -->
  </div>
  <div class="box box-success">
      <div class="box-header with-border">
        <h3 class="box-title">projets par équipe</h3>
  
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
      </div>
      
      <div class="box-body reg" >
        <!--<div id="chartContainer" style="height: 300px; width: 100%;"></div>-->
        
        <canvas id="bar-chart-projet" class="reg"></canvas>
  
      </div>
              <!-- /.box-body -->
    </div>
  <div class="box box-success">
    <div class="box-header with-border">
      <h3 class="box-title">Aarticles publiés par type</h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
      </div>
    </div>
    
    <div class="box-body" >
      <!--<div id="chartContainer" style="height: 300px; width: 100%;"></div>-->
      
      <div id="chartContainer" style="height: 500px; width: 100%;"></div>
      
    </div>
            <!-- /.box-body -->
  </div>
  <div class="box box-success">
    <div class="box-header with-border">
      <h3 class="box-title">Théses soutenues / en cours</h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
      </div>
    </div>
    
    <div class="box-body" >
      <!--<div id="chartContainer" style="height: 300px; width: 100%;"></div>-->
      <canvas id="chartContainer3" class="reg"></canvas>
     <!-- <div id="chartContainer3" style="height: 500px; width: 100%;"></div>-->
      
    </div>
            <!-- /.box-body -->
  </div>
@endsection

