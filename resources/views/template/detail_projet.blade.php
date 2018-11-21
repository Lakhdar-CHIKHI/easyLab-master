@extends('layouts.template')
@section('contenu')
     <!--Breadcrumb start-->
     <div class="ed_pagetitle" data-stellar-background-ratio="0.5" data-stellar-vertical-offset="0" style="background-image: url(http://placehold.it/921X533);">
        <div class="ed_img_overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-4 col-sm-6">
                    <div class="page_title">
                        <h2>projet 1</h2>
                    </div>
                </div>
                <div class="col-lg-6 col-md-8 col-sm-6">
                    <ul class="breadcrumb">
                        <li><a href="index.html">home</a></li>
                        <li><i class="fa fa-chevron-left"></i></li>
                        <li><a href="courses.html">projets</a></li>
                        <li><i class="fa fa-chevron-left"></i></li>
                        <li><a href="course_single.html">projet</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--Breadcrumb end-->
    <!--Single content start-->
    <div class="ed_graysection ed_course_single ed_toppadder80 ed_bottompadder80">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="ed_course_single_item">
                        <div class="ed_course_single_image">
                            <img src="http://placehold.it/806X387" alt="event image">
                        </div>
                        <div class="ed_course_single_info">
                            <h2>Project Learning <span><div class="ed_views">
                                    <i class="fa fa-users"></i>
                                    <span>20 members</span>
                                </div> </span></h2>
                            <div class="ed_rating">
                               
                               
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                                    <div class="course_detail">
                                        <div class="course_faculty">
                                            <img src="http://placehold.it/32X32" alt=""> <a href="instructor_dashboard.html">Joanna Simpson</a>
                                        </div>
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                        <div class="ed_course_single_tab">
                            <div role="tabpanel">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#description" aria-controls="description" role="tab" data-toggle="tab">description</a></li>
                                    <li role="presentation"><a href="#students" aria-controls="students" role="tab" data-toggle="tab">Members</a></li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="description">
                                        <div class="ed_course_tabconetent">
                                            <h2>apropos du projet</h2>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent vehicula mauris ac facilisis congue. Fusce sem enim, rhoncus volutpat condimentum ac, placerat semper ligula. Suspendisse in viverra justo,
                                                eu placerat urna. Vestibulum blandit diam suscipit nibh mattis ullamcorper. Nullam a condimentum nulla, ut facilisis enim. Aliquam sagittis ipsum ex, sed luctus augue venenatis ut. Fusce at rutrum tellus,
                                                ac elementum neque. In nec velit orci. Etiam purus felis, pellentesque sit amet tincidunt at, iaculis quis erat. Morbi imperdiet sodales sapien nec rhoncus. Donec placerat mi et libero iaculis, id maximus
                                                est vestibulum. Etiam augue augue, auctor at ornare eget, porta ac nisl. Aliquam et mattis dolor, et aliquet ligula.</p>
                                            <p>Nam id ligula tristique, porta dolor ac, pretium leo. Maecenas scelerisque vulputate dapibus. Quisque sodales tincidunt sapien, eu consequat erat tempus et. Nullam ipsum est, interdum quis posuere sed, imperdiet
                                                quis nisi. pulvinar est at, commodo mauris. Nunc in mollis erat. Integer aliquet orci non auctor pretium.Proin quis justo est. Vestibulum imperdiet leo sit amet tortor suscipit, id cursus ligula pharetra.
                                                Uctus ac eros a, faucibus iaculis quam. Nam non iaculis justo. Donec maximus varius velit.</p>
                                            <p>Sed ultricies posuere magna elementum laoreet. Suspendisse elementum sagittis nisl, id pellentesque purus auctor finibus. Donec elementum quam est, a condimentum diam tempor ac. Sed quis magna lobortis,
                                                pulvinar est at, commodo mauris. Nunc in mollis erat. Integer aliquet orci non auctor pretium. Pellentesque eu nisl augue. Curabitur vitae est ut sem luctus tristique. Suspendisse euismod sapien facilisis
                                                tellus aliquam pellentesque.</p>
                                            <p>Viverra justo, eu placerat urna. faucibus iaculis quam. Nam non iaculis justoVestibulum blandit diam suscipit nibh mattis ullamcorper. Nullam a condimentum nulla, ut facilisis enim. Aliquam sagittis ipsum
                                                ex, sed luctus augue venenatis ut. Fusce at rutrum tellus, ac elementum neque. In nec velit orci. Etiam purus felis, pellentesque sit amet tincidunt at, iaculis quis erat. Morbi imperdiet sodales sapien
                                                nec rhoncus. Donec placerat mi et libero iaculis, id maximus est</p>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="students">
                                        <div class="ed_inner_dashboard_info">
                                            <div class="ed_course_single_info">
                                                <h2>&nbsp;Total members : <span>20</span></h2>
                                                
                                                <div class="ed_add_students">
                                                    <img src="http://placehold.it/50X50" alt="">
                                                    <span>adler braxton</span>
                                                    
                                                </div>
                                                
                                                
                                                <!--<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
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
                                                </div>-->
                                            </div>
                                        </div>
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
    <!--Single content end-->

@endsection