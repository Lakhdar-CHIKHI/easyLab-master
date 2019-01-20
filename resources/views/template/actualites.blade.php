@extends('layouts.template')
@section('contenu')
    <!--Breadcrumb start-->
<div class="ed_pagetitle" data-stellar-background-ratio="0.5" data-stellar-vertical-offset="0" style="background-image: url(http://placehold.it/921X533);">
    <div class="ed_img_overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-4 col-sm-6">
                    <div class="page_title">
                        <h2>actualités</h2>
                    </div>
                </div>
                <div class="col-lg-6 col-md-8 col-sm-6">
                    <ul class="breadcrumb">
                        <li><a href="index.html">accueil</a></li>
                        <li><i class="fa fa-chevron-left"></i></li>
                        <li><a href="about.html">actualités</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--Breadcrumb end-->
    <!--Blog content start-->
    <div class="ed_transprentbg ed_toppadder80 ed_bottompadder80 ed_courses">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="row">
                    <div class="ed_blog_all_item ed_blog_all_item_second">
                            @foreach ($actualites as $actualite)
                    
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                            <div class="ed_mostrecomeded_course">
                                                <div class="ed_item_img">
                                                    <img src="{{asset($actualite->photo)}} " alt="item1" class="img-responsive">
                                                </div>
                                                <div class="ed_item_description ed_most_recomended_data">
                                                    <h4><strong><a href="{{ url('template/'.$actualite->id.'/detail_actualite')}}">{{ $actualite->titre }} </a></strong></h4>
                                                        <div class="row">
                                                        <div class="ed_rating">
                                                            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                                                
                                                                    <div class="course_detail">
                                                                        <div class="course_faculty">
                                                                                <strong> <i class="fa fa-clock-o"></i> &nbsp;&nbsp;&nbsp;{{$actualite->date}}</a></strong>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                
                                                            </div>
                                                            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                                                                <div class="ed_views">
                                                                    <i class="fa fa-users"></i>
                                                                    <span> {{$actualite->createur->name}} {{$actualite->createur->prenom}} </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <p style="height: 100px;overflow: hidden;">{!!$actualite->resume!!}</p>
                                                    <a href="{{ url('template/'.$actualite->id.'/detail_actualite')}}" class="btn ed_btn ed_orange">Voir Plus &nbsp;&nbsp;&nbsp;<i class="fa fa-long-arrow-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                            @endforeach
                    
                        
                        
                        
                       <!-- <div class="col-lg-12">
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
                        </div>	-->
                    </div>
                    <div class="col-lg-12" align="center">
                            <div class="ed_blog_bottom_pagination">
                                <nav>
                                        {{$actualites->links()}}
                                </nav>
                            </div>
                        </div>
                </div>
                </div>
    
            </div>
        </div>  
    </div>
    <!--skill section start -->
@endsection