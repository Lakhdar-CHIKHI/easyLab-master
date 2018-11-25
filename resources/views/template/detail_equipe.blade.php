@extends('layouts.template')
@section('contenu')
 <!--Breadcrumb start-->
 <div class="ed_pagetitle" data-stellar-background-ratio="0.5" data-stellar-vertical-offset="0" style="background-image: url(http://placehold.it/921X533);">
    <div class="ed_img_overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-4 col-sm-6">
                <div class="page_title">
                    <h2>{{$equipe->intitule}}</h2>
                </div>
            </div>
            <div class="col-lg-6 col-md-8 col-sm-6">
                <ul class="breadcrumb">
                        <li><a href="{{ url('template/accueil')}}">Accueil</a></li>
                        <li><i class="fa fa-chevron-left"></i></li>
                        <li><a href="{{ url('template/liste_equipes')}}">équipes</a></li>
                    <li><i class="fa fa-chevron-left"></i></li>
                    <li><a href="course_single.html">{{$equipe->intitule}}</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--Breadcrumb end-->
    <!--instructor single start-->
    <div class="ed_dashboard_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="ed_sidebar_wrapper">
                        <div class="ed_profile_img">
                            <img src="{{asset($equipe->chef->photo)}}" alt="item1" class="img-responsive img-circle" style="width:100%;">
                        </div>
                        <h3>{{$equipe->intitule}}</h3>
                        
                         <div class="ed_tabs_left">
                            <ul class="nav nav-tabs">
                              <li class="active"><a href="#a" data-toggle="tab">Apropos</a></li>
                              <li><a href="#b" data-toggle="tab">Membres <span>{{count($membres)}}</span></a></li>
                              <li><a href="#d" data-toggle="tab">Projets<span>{{count($projets)}}</span></a></li>
                         
                              </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                <div class="ed_dashboard_tab">
                    <div class="tab-content">
                        <div class="tab-pane active" id="a">
                            <div class="ed_dashboard_inner_tab">
                                <div role="tabpanel">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li role="presentation" class="active"><a href="#view" aria-controls="view" role="tab" data-toggle="tab">Detail de l'équipe</a></li>
                                    </ul>
                        
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane active" id="view">
                                        <div class="ed_inner_dashboard_info">
                                            <h2>apropos de L'équioe</h2>
                                            <p>{{$equipe->resume}}</p>
                                        </div>
                                        <div class="ed_inner_dashboard_info">
                                            <h2>Chef de L'équipe</h2>
                                            <div class="ed_add_students">
                                                <a href="{{ url('template/'.$equipe->chef->id.'/profil_member')}}"><img src="{{asset($equipe->chef->photo)}}" alt="">
                                                    <span>{{$equipe->chef->name}} {{$equipe->chef->prenom}}</span></a>
                                                
                                                
                                            </div>


                                        </div>

                                        </div>
                                    </div>
                        
                                </div><!--tab End-->
                            </div>
                        </div>
                        <div class="tab-pane" id="b">
                            <div class="ed_dashboard_inner_tab">
                                <div role="tabpanel">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li role="presentation" class="active"><a href="#my" aria-controls="my" role="tab" data-toggle="tab">Membres</a></li>
                                    </ul>
                        
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane active" id="my">
                                            <div class="ed_inner_dashboard_info">
                                                <div class="ed_course_single_info">
                                                    <h2>&nbsp;Total members : <span>{{count($membres)}}</span></h2>
                                                    @foreach ($membres as $membre)
                                                    <div class="ed_add_students">
                                                        <a href="{{ url('template/'.$membre->id.'/profil_member')}}"><img src="{{asset($membre->photo)}}" alt="">
                                                            <span>{{$membre->name}} {{$membre->prenom}}</span></a>
                                                        
                                                        
                                                    </div>
                                                    @endforeach
                                            </div>
                                        </div>
                                     </div>
                                     
                                    </div>
                        
                                </div><!--tab End-->
                            </div>
                        </div>
                        <div class="tab-pane" id="d">
                            <div class="ed_dashboard_inner_tab">
                                <div role="tabpanel">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li role="presentation" class="active"><a href="#py" aria-controls="my" role="tab" data-toggle="tab">Membres</a></li>
                                         </ul>
                        
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane active" id="py">
                                            <div class="ed_inner_dashboard_info">
                                         <div class="ed_course_single_info">
                                                <h2> &nbsp;Total projets : <span>{{count($projets)}}</span></h2>
                                                    @foreach ($projets as $projet)
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="ed_mostrecomeded_course">
                        <div class="ed_item_img">
                            <img src="{{asset('images/content/2_2.jpg')}}" alt="item1" class="img-responsive">
                        </div>
                        <div class="ed_item_description ed_most_recomended_data">
                            <h4><strong><a href="{{ url('template/'.$projet->id.'/detail_projet')}}">{{ $projet->intitule }} </a></strong></h4>
                            <div class="row">
                                <div class="ed_rating">
                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                        
                                            <div class="course_detail">
                                                <div class="course_faculty">
                                                        <strong> TYPE  :  <a href="instructor_dashboard.html"> {{ $projet->type }} </a></strong>
                                                </div>
                                            </div>
                                            
                                        
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                        <div class="ed_views">
                                            <i class="fa fa-users"></i>
                                            <span> {{count($projet->users)}} Members</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p>{{$projet->resume}}</p>
                            <a href="{{ url('template/'.$projet->id.'/detail_projet')}}" class="btn ed_btn ed_orange">Voir Plus &nbsp;&nbsp;&nbsp;<i class="fa fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            @endforeach
            
                                            </div>
                                        </div>
                                     </div>
                                     
                                    </div>
                        
                                </div><!--tab End-->
                            </div>
                        </div>
                        
                    </div>
                </div>
                </div>
                
                
            </div>
        </div>
    </div>
    <!--instructor single end-->
    

@endsection