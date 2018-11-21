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
                            <img src="http://placehold.it/263X263" alt="Dashboard Image">
                        </div>
                        <h3>Professor1 name firstname</h3>
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
                                    <h1>Bienvenue sur le profil du <span>Professeur 1</span></h1>
                                        <p><strong>Grade : </strong>Professeur</p>
                                        <p><strong>équipe : </strong>Système d'information et connaissance</p>
                                        <p><strong>Email : </strong>chikh@azeddine.com </p>
                                        <p><strong>Date de naissance : </strong>12/12/1956</p>
                                        <p><strong>Email : </strong>chikh@azeddine.com </p>
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
                                                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 ed_bottompadder20">
                                                                <div class="ed_item_img">
                                                                    <img src="http://placehold.it/248X156" alt="item1" class="img-responsive">
                                                                </div>
                                                                <div class="ed_item_description ed_most_recomended_data">
                                                                    <h4><a href="course_single.html">Project Learning</a><span></span></h4>
                                                                    <div class="row">
                                                                        <div class="ed_rating">
                                                                            <div class="col-lg-6 col-md-5 col-sm-6 col-xs-6">
                                                                                
                                                                                    <div class="ed_views">
                                                                                        <i class="fa fa-users"></i>
                                                                                        <span>35 Members</span>
                                                                                    </div>
                                                                                
                                                                            </div>
                                                                            
                                                                        </div>
                                                                    </div>
                                                                    <p>Project-Based Learning is a flexible tool for framing given academic standards into flexible tool for framing.</p>
                                                                    <a href="course_single.html" class="btn ed_btn ed_orange">Read more &nbsp;&nbsp;&nbsp;<i class="fa fa-long-arrow-right"></i></a>
                                                                </div>
                                                            </div>
                                                            
                                                            
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div role="tabpanel" class="tab-pane" id="result" style="">
                                                <div class="ed_dashboard_inner_tab">
                                                        <div class="ed_add_students pub" ><a href="">
                                                                <strong>TYPE : Publication</strong>&nbsp;&nbsp;&nbsp;&nbsp;<strong><i class="fa fa-clock-o icon"></i>&nbsp; 20/01/1997</strong><br>
                                                                <span>student started course course status 1 weeks, 4 days ago
                                                                        student started course course status 1 weeks, 4 days ago
                                                                        student started course course status 1 weeks, 4 days ago
                                                                </span>
                                                
                                                            </a>
                                                            </div>
                                                            <div class="ed_add_students pub" ><a href="">
                                                                    <strong>TYPE : Publication</strong>&nbsp;&nbsp;&nbsp;&nbsp;<strong><i class="fa fa-clock-o icon"></i>&nbsp; 20/01/1997</strong><br>
                                                                    <span>student started course course status 1 weeks, 4 days ago
                                                                            student started course course status 1 weeks, 4 days ago
                                                                            student started course course status 1 weeks, 4 days ago
                                                                    </span>
                                                    
                                                                </a>
                                                                </div>
                                                </div>
                                            </div>
                                            <div role="tabpanel" class="tab-pane" id="status" style="">
                                                <div class="ed_dashboard_inner_tab">
                                                    <h2>Titre de La these</h2>
                                                    <p>Sed ultricies posuere magna elementum laoreet. Suspendisse elementum sagittis nisl, id pellentesque purus auctor finibus. Donec elementum quam est, a condimentum diam tempor ac. Sed quis magna lobortis,
                                                        pulvinar est at, commodo mauris. Nunc in mollis erat. Integer aliquet orci non auctor pretium. Pellentesque eu nisl augue. Curabitur vitae est ut sem luctus tristique. Suspendisse euismod sapien
                                                        facilisis tellus aliquam pellentesque.</p>
                                                        
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