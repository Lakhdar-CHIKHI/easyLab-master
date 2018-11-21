@extends('layouts.template')
@section('contenu')
    <!--Breadcrumb start-->
    <div class="ed_pagetitle" data-stellar-background-ratio="0.5" data-stellar-vertical-offset="0" style="background-image: url(http://placehold.it/921X533);">
        <div class="ed_img_overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-4 col-sm-6">
                    <div class="page_title">
                        <h2>SIDK</h2>
                    </div>
                </div>
                <div class="col-lg-6 col-md-8 col-sm-6">
                    <ul class="breadcrumb">
                        <li><a href="index.html">accueil</a></li>
                        <li><i class="fa fa-chevron-left"></i></li>
                        <li><a href="instructor.html">SIDK</a></li>
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
                            <img src="http://placehold.it/263X263" alt="Profile Image" class="img-responsive">
                        </div>
                        <h3>SIDK</h3>
                        <p>Système d'information et connaissance </p>
                        <div class="ed_tabs_left">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#a" data-toggle="tab">à propos</a></li>
                                <li><a href="#b" data-toggle="tab">Liste des projets <span>4</span></a></li>
                                <li><a href="#c" data-toggle="tab">Liste des Members <span>4</span></a></li>
                                <li><a href="#d" data-toggle="tab">Liste des partenaires <span>4</span></a></li>
                            </ul>
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
                                            <li role="presentation" class="active"><a href="#view" aria-controls="view" role="tab" data-toggle="tab">Details of proffesors</a></li>
                                        </ul>
                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane active" id="view">
                                                <div class="ed_inner_dashboard_info">
                                                    
                                                   <h3>Intitulé</h3>
                                                   <div>Système d'information et connaissance </div>

                                                   <h3>Chef de l'équipe</h3>
                                                   <div>CHIKH Azzeddine </div>

                                                   <h3>Résumé</h3>
                                                   <div>Dans les nouveaux contextes de traitement de l’information les données numériques sont devenues souvent: hétérogènes non ou partiellement structurées volumineuses distribuées/réparties créées en flux continue et rapide Il est devenu impératif de disposer de nouveaux modèles de: représentation, transformation, recherche, recommandation, échange, sécurité, visualisation interprétation des données, qui soient appropriés à ces spécificités.  </div>

                                                   <h3>Axes de recherche</h3>
                                                   <div>Système d'information et connaissance </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--tab End-->
                                </div>
                            </div>
                            <div class="tab-pane" id="b">
                                <div class="ed_dashboard_inner_tab">
                                    <div role="tabpanel">
                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li role="presentation" class="active"><a href="#my" aria-controls="my" role="tab" data-toggle="tab">Liste des projets</a></li>
                                            
                                        </ul>
                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane active" id="my">
                                                <div class="ed_inner_dashboard_info">
                                                    
                                                    <div class="row">
                                                        <div class="ed_mostrecomeded_course_slider">
                                                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 ed_bottompadder20">
                                                                <div class="ed_item_img">
                                                                    <img src="http://placehold.it/248X156" alt="item1" class="img-responsive">
                                                                </div>
                                                                <div class="ed_item_description ed_most_recomended_data">
                                                                    <h4><a href="course_single.html">Project Learning </a><span></span></h4>
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
                                            
                                        </div>
                                    </div>
                                    <!--tab End-->
                                </div>
                            </div>
                            <div class="tab-pane" id="c">
                                <div class="ed_dashboard_inner_tab">
                                    <div role="tabpanel">
                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li role="presentation" class="active"><a href="#personal" aria-controls="personal" role="tab" data-toggle="tab">Liste des Members</a></li>
                                        </ul>
                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane active" id="personal">
                                                <div class="ed_inner_dashboard_info">
                                                    <div class="ed_course_single_info">
                                                        <div class="ed_add_students" ><a href="">
                                                            <img src="http://placehold.it/50X50" alt="">
                                                            <span>student started course course status 1 weeks, 4 days ago</span>
                                                        </a>
                                                        </div>
                                                        <div class="ed_add_students" ><a href="">
                                                            <img src="http://placehold.it/50X50" alt="">
                                                            <span>student started course course status 1 weeks, 4 days ago</span>
                                                        </a>
                                                        </div>
                                                        
                                                        <!--
                                                        <div class="col-lg-12">
                                                            <div class="row">
                                                                <div class="ed_blog_bottom_pagination ed_toppadder40">
                                                                    <nav>
                                                                        <ul class="pagination">
                                                                            <li><a href="#">1</a></li>
                                                                            <li><a href="#">2</a></li>
                                                                            <li><a href="#">3</a></li>
                                                                            <li class="active"><a href="#">Next <span class="sr-only">(current)</span></a></li>
                                                                        </ul>
                                                                    </nav>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    -->
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <!--tab End-->
                                </div>
                            </div>

                            <!-- organis-->
                            <div class="tab-pane" id="d">
                                <div class="ed_dashboard_inner_tab">
                                    <div role="tabpanel">
                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li role="presentation" class="active"><a href="#personal" aria-controls="personal" role="tab" data-toggle="tab">Liste des Members</a></li>
                                        </ul>
                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane active" id="personal">
                                                <div class="ed_inner_dashboard_info">
                                                    <div class="ed_course_single_info">
                                                        <div class="ed_add_students" ><a href="">
                                                            <img src="http://placehold.it/50X50" alt="">
                                                            <span>student started course course status 1 weeks, 4 days ago</span>
                                                        </a>
                                                        </div>
                                                        <div class="ed_add_students" ><a href="">
                                                            <img src="http://placehold.it/50X50" alt="">
                                                            <span>student started course course status 1 weeks, 4 days ago</span>
                                                        </a>
                                                        </div>
                                                        <div class="ed_add_students" ><a href="">
                                                            <img src="http://placehold.it/50X50" alt="">
                                                            <span>student started course course status 1 weeks, 4 days ago</span>
                                                        </a>
                                                        </div>
                                                        
                                                        <!--
                                                        <div class="col-lg-12">
                                                            <div class="row">
                                                                <div class="ed_blog_bottom_pagination ed_toppadder40">
                                                                    <nav>
                                                                        <ul class="pagination">
                                                                            <li><a href="#">1</a></li>
                                                                            <li><a href="#">2</a></li>
                                                                            <li><a href="#">3</a></li>
                                                                            <li class="active"><a href="#">Next <span class="sr-only">(current)</span></a></li>
                                                                        </ul>
                                                                    </nav>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    -->
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <!--tab End-->
                                </div>
                            </div>
                            <!--Breadcrumb-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--instructor single end--> 
@endsection