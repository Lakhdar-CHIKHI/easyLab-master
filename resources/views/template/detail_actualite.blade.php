@extends('layouts.template')
@section('contenu')
    <!--Breadcrumb start-->
<div class="ed_pagetitle" data-stellar-background-ratio="0.5" data-stellar-vertical-offset="0" style="background-image: url(http://placehold.it/921X533);">
    <div class="ed_img_overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-4 col-sm-6">
                    <div class="page_title">
                        <h2>Single Blog Post</h2>
                    </div>
                </div>
                <div class="col-lg-6 col-md-8 col-sm-6">
                    <ul class="breadcrumb">
                        <li><a href="index.html">home</a></li>
                        <li><i class="fa fa-chevron-left"></i></li>
                        <li><a href="blog.html">educo blog</a></li>
                        <li><i class="fa fa-chevron-left"></i></li>
                        <li><a href="blog_single.html">single post</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--Breadcrumb end-->
    <!--Blog content start-->
    <div class="ed_transprentbg ed_toppadder80 ed_bottompadder80 ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="ed_blog_all_item">
                        <div class="ed_blog_item ed_bottompadder50">
                            <div class="ed_blog_image">
                                <img src="{{asset($actualite->photo)}}" alt="blog image" />
                            </div>
                        <div class="ed_blog_info">
                            <h2>{{$actualite->titre}}</h2>
                            <ul>
                                
                                <li><a href="#"><i class="fa fa-clock-o"></i> {{$actualite->date}}</a></li>
                                
                            </ul>
                            <p>{{$actualite->resume}}</p>
                            <blockquote>
                                {{$actualite->resume}}
                            </blockquote>
                        </div>
                        
                        </div>
                        
                       
                        
                    </div>
                </div>
    
            </div>
        </div>  
    </div>
    <!--Blog content end-->
@endsection