@extends('layouts.template')
@section('contenu')
<div class="ed_pagetitle" data-stellar-background-ratio="0.5" data-stellar-vertical-offset="0" style="background-image: url(http://placehold.it/921X533);">
    <div class="ed_img_overlay" style=""></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-4 col-sm-6">
                <div class="page_title">
                    <h2>Liste des projets&nbsp;</h2>
                </div>
            </div>
            <div class="col-lg-6 col-md-8 col-sm-6">
                <ul class="breadcrumb">
                    <li><a href="index.html">Accueli</a></li>
                    <li><i class="fa fa-chevron-left"></i></li>
                    <li><a href="course.html">Projets</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--Breadcrumb end-->
<!-- Section eleven start -->
<div class="ed_courses ed_toppadder80 ed_bottompadder80">
    <div class="container">
        <div class="row">

            @foreach ($projets as $projet)
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="ed_mostrecomeded_course">
                        <div class="ed_item_img">
                            <img src="../images/content/2_2.jpg" alt="item1" class="img-responsive">
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
            
            
           
            <!-- lakhdar -->

            <!--<div class="col-lg-12">
                <div class="ed_blog_bottom_pagination">
                    <nav>
                        <ul class="pagination">
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li class="active"><a href="#">Next <span class="sr-only">(current)</span></a></li>
                        </ul>
                    </nav>
                </div>
            </div>-->
        </div>
        <div class="col-lg-12" align="center">
                <div class="ed_blog_bottom_pagination">
                    <nav>
                            {{$projets->links()}}
                    </nav>
                </div>
            </div>

    </div>
    <!-- /.container -->
</div>

@endsection