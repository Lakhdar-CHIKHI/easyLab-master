@extends('layouts.template')
@section('contenu')
     <!--Breadcrumb start-->
     <div class="ed_pagetitle" data-stellar-background-ratio="0.5" data-stellar-vertical-offset="0" style="background-image: url(http://placehold.it/921X533);">
        <div class="ed_img_overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-4 col-sm-6">
                    <div class="page_title">
                        <h2>Educo Student</h2>
                    </div>
                </div>
                <div class="col-lg-6 col-md-8 col-sm-6">
                    <ul class="breadcrumb">
                        <li><a href="index.html">accueil</a></li>
                        <li><i class="fa fa-chevron-left"></i></li>
                        <li><a href="dashboard.html">Profil member</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--Breadcrumb end-->
     <!--single student detail start-->
     <div class="ed_dashboard_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="ed_sidebar_wrapper">
                        <div class="ed_profile_img">
                            <img class="img-responsive" width="100%" src="{{asset($membre->photo)}}" alt="Dashboard Image">
                        </div>
                        <h3>{{$membre->name}} {{$membre->prenom}}</h3>
                        <div class="ed_tabs_left">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#dashboard" data-toggle="tab">à propos</a></li>
                                <li><a href="#courses" data-toggle="tab">activités</a></li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                    <div class="ed_dashboard_tab">
                        <div class="tab-content">
                            <div class="tab-pane active" id="dashboard">
                                <div class="ed_dashboard_tab_info">
                                    <h1>Bienvenue sur le profil du <span>{{$membre->name}} {{$membre->prenom}}</span></h1>
                                        <p><strong>Grade : </strong>{{$membre->grade}}</p>
                                        @if ($membre->equipe_id)
                                        <p><strong>équipe : </strong>{{$membre->equipe->intitule}}</p>
                                        @endif
                                        
                                        <p><strong>Email : </strong> {{$membre->email}} </p>
                                        @if ($membre->date_naissance && ( $membre->autorisation_public_date_naiss || Auth::user()->role->nom == 'admin' || Auth::id() == $membre->id))
                                        <p><strong>Date de naissance : </strong>{{$membre->date_naissance}}</p>
                                        @endif
                                        @if ($membre->num_tel && ( $membre->autorisation_public_date_naiss || Auth::user()->role->nom == 'admin' || Auth::id() == $membre->id))
                                        <p><strong>N° De Télépone : </strong>{{$membre->num_tel}}</p>
                                        @endif
                                        <div class="btn-group">
                                                <a href="{{$membre->lien_linkedin}}" class="btn btn-social-icon btn-linkedin" title="Linkedin"><img src="{{asset('/in.png')}}"></a>
                                                <a href="{{$membre->lien_rg}}" class="btn btn-social-icon" title="Researchgate"><img src="{{asset('/rg.png')}}"></a>
                                            </div>
                                    </div>
                                
                            </div>
                            <div class="tab-pane" id="courses">
                                <div class="ed_dashboard_inner_tab">
                                    <div role="tabpanel">
                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li role="presentation" class="active"><a href="#my" aria-controls="my" role="tab" data-toggle="tab">projects</a></li>
                                            <li role="presentation"><a href="#result" aria-controls="result" role="tab" data-toggle="tab">Articles</a></li>
                                            <li role="presentation"><a href="#status" aria-controls="status" role="tab" data-toggle="tab">these</a></li>
                                        </ul>
                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane active" id="my" style="">
                                                <div class="ed_inner_dashboard_info">
                                                    
                                                    <div class="row">
                                                            <div class="ed_mostrecomeded_course_slider">
                                                                @if (count($membre->projets))
                                                                @foreach ($membre->projets as $projet)
                                                        
                                                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 ed_bottompadder20">
                                                                    <div class="ed_item_img">
                                                                        <img src="http://placehold.it/248X156" alt="item1" class="img-responsive">
                                                                    </div>
                                                                    <div class="ed_item_description ed_most_recomended_data">
                                                                        <h4><strong><a href="course_single.html">{{$projet->intitule}}</a></strong></h4>
                                                                        <div class="row">
                                                                            <div class="ed_rating">
                                                                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                    
                                                                                            <div class="course_detail">
                                                                                                <div class="course_faculty">
                                                                                                        <strong> TYPE  :  <a href="instructor_dashboard.html"> {{$projet->type}} </a></strong>
                                                                                                </div>
                                                                                            </div>
                                                                                            
                                                                                        
                                                                                    </div>
                                                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                                                    
                                                                                        <div class="ed_views">
                                                                                            <i class="fa fa-users"></i>
                                                                                            <span>{{count($projet->users)}} Members</span>
                                                                                        </div>
                                                                                    
                                                                                </div>
                                                                                
                                                                            </div>
                                                                        </div>
                                                                        <div style="height: 65px;overflow: hidden;"><p>{{$projet->resume}}</p></div>
                                                                        <a href="course_single.html" class="btn ed_btn ed_orange">Read more &nbsp;&nbsp;&nbsp;<i class="fa fa-long-arrow-right"></i></a>
                                                                    </div>
                                                                </div>
                                                                
                                                                
                                                                
                                                            
                                                        @endforeach
                                                                @else
                                                                    <h3>vide</h3>
                                                                @endif
                                                       
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div role="tabpanel" class="tab-pane" id="result" style="">
                                                <div class="ed_dashboard_inner_tab">
                                                    @if (count($membre->articles))
                                                    @foreach ($membre->articles as $article)
                                                    <div class="ed_add_students pub" ><a href="">
                                                         <strong>TYPE : {{$article->type}}</strong>&nbsp;&nbsp;&nbsp;&nbsp;<strong><i class="fa fa-clock-o icon"></i>&nbsp; {{$article->annee}}</strong><br>
                                                         <span>{{$article->titre}}
                                                         </span>
                                         
                                                     </a>
                                                     </div>
                                                    @endforeach
                                                    @else
                                                        <h3>vide</h3>
                                                    @endif
                                                       
                                                    
                                                </div>
                                            </div>
                                            <div role="tabpanel" class="tab-pane" id="status" style="">
                                                <div class="ed_dashboard_inner_tab">
                                                    @if ($membre->these)
                                                    <h5><strong>Encadreur :</strong> {{$membre->these->encadreur_int}}{{$membre->these->encadreur_ext}}<br>
                                                        <strong>Coencadreur :</strong> {{$membre->these->coencadreur_int}}{{$membre->these->coencadreur_ext}} 
                                                    </h5>
                                                    <h3><strong>Titre : </strong>{{$membre->these->titre}}</h3>
                                                    <p>{{$membre->these->sujet}}</p>
                                                    @else
                                                        <h3>Vide</h3>
                                                    @endif
                                                    
                                                        
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <!--tab End-->
                                </div>
                            </div>
                           
                            
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--single student detail end-->
  
@endsection