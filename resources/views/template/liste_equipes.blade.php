@extends('layouts.template')
@section('contenu')
     <!--Breadcrumb start-->
     <div class="ed_pagetitle" data-stellar-background-ratio="0.5" data-stellar-vertical-offset="0" style="background-image: url(http://placehold.it/921X533);">
        <div class="ed_img_overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-4 col-sm-6">
                    <div class="page_title">
                        <h2>Liste Des équipes</h2>
                    </div>
                </div>
                <div class="col-lg-6 col-md-8 col-sm-6">
                    <ul class="breadcrumb">
                        <li><a href="{{ url('template/accueil')}}">Accueil</a></li>
                        <li><i class="fa fa-chevron-left"></i></li>
                        <li><a href="{{ url('template/liste_equipes')}}">équipes</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--Breadcrumb end-->
    <!-- team member section start -->
    <div class="ed_transprentbg ed_toppadder80">
        <div class="container">
            <div class="row">

                @foreach ($equipes as $equipe)
                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                        <div class="ed_team_member ed_mostrecomeded_course  equipe_style" >
                                <a href="{{ url('template/'.$equipe->id.'/detail_equipe')}}">  
                            <div class="ed_team_member_img accueil_profil" >
                                        @if ($equipe->logo)
                                        <img src="{{asset($equipe->logo)}}" alt="item1" class="img-responsive " style="width:100%;">
                                        @else
                                        <img src="{{asset('images/content/nologo.png')}}" alt="item1" class="img-responsive " style="width:100%;">

                                        @endif
                                 </div></a>
                            <div class="ed_team_member_description" style="border-radius: 15px;">
                                <a href="{{ url('template/'.$equipe->id.'/detail_equipe')}}"><h4><strong>{{$equipe->achronymes}}</strong></h4></a>
                                <h5>Chef. {{$equipe->chef->name}} {{$equipe->chef->prenom}}</h5>
                                <p style="height: 42px;">{{$equipe->intitule}} </p>
                            </div>
                        </div>
                    </div>
                @endforeach

                

             

                
                
                
                
                
            </div>
        </div>
        <!-- /.container -->
    </div>
@endsection