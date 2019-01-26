@extends('layouts.template')
@section('contenu')
     <!--Breadcrumb start-->
     <div class="ed_pagetitle" data-stellar-background-ratio="0.5" data-stellar-vertical-offset="0" style="background-image: url(http://placehold.it/921X533);">
        <div class="ed_img_overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-4 col-sm-6">
                    <div class="page_title">
                        <h2>{{$article->titre}}</h2>
                    </div>
                </div>
                <div class="col-lg-6 col-md-8 col-sm-6">
                    <ul class="breadcrumb">
                        <li><a href="index.html">home</a></li>
                        <li><i class="fa fa-chevron-left"></i></li>
                        <li><a href="courses.html">article</a></li>
                        <li><i class="fa fa-chevron-left"></i></li>
                        <li><a href="course_single.html">{{$article->titre}}</a></li>
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
                                
                                <img src="{{asset('images/content/'.$article->type.'.jpg')}} " alt="item1" class="img-responsive">
                                
                        </div>

                        <div class="ed_course_single_info">
                            <h2>{{$article->titre}}</h2>


                        
                            <div class="row">
                                <div class="col-lg-8 col-md-4 col-sm-6 col-xs-6">
                                   <h4> <div class="course_detail">
                                        <div class="course_faculty">
                                                <strong> TYPE  :  <a href="instructor_dashboard.html"> {{ $article->type }} </a></strong>
                                        </div>
                                    </div></h4>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                                        <h4><span><div class="ed_views">
                                                <i class="fa fa-users"></i>
                                                <span>&nbsp;  {{count($membres)}} members</span>
                                            </div> </span></h4>
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
                                        <div class="ed_course_tabconetent" >
                                                <table class="table table-striped">
                                                    @if($article->conference)
                                                    <tr>
                                                        <td>Nom de la conférence</td>
                                                        <td>{{$article->conference}}</td>
                                                    </tr>  
                                                    @endif
                                                    @if($article->journal)  
                                                    <tr>
                                                        <td>Nom du journal</td>
                                                        <td>{{$article->journal}}</td>
                                                    </tr> 
                                                    @endif
                                                    @if($article->ISSN)  
                                                       <tr>
                                                    <td> ISSN</td>
                                                    <td>{{$article->ISSN}}</td>
                                                    </tr> 
                                                    @endif
                                                    @if($article->ISBN)  
                                                    <tr>
                                                        <td>ISBN</td>
                                                        <td>{{$article->ISBN}}</td>
                                                    </tr> 
                                                    @endif
                                                    <tr>
                                                        <td>Lieu</td>
                                                        <td>@if($article->lieu_ville){{$article->lieu_ville}}, @endif @if($article->lieu_pays ){{$article->lieu_pays}}@endif</td>
                                                    </tr> 
                                                    <tr>
                                                        <td>Date</td>
                                                        <td>@if($article->mois){{$article->mois}}, @endif @if($article->annee) {{$article->annee}}@endif</td>
                                                    </tr> 
                                                    @if($article->doi)
                                                    <tr>
                                                        <td>DOI</td>
                                                        <td>{{$article->doi }}</td>
                                                    </tr> 
                                                    @endif
                                                    
                                                </table>
                                                <h4>Résumé</h4>
                                                <p>{!! $article->resume !!}</p>
                                                <br>
                                             
                                        </div>
                                        
                                    </div>

                                    <div role="tabpanel" class="tab-pane" id="students">
                                        <div class="ed_inner_dashboard_info">
                                            <div class="ed_course_single_info">
                                                <h2>&nbsp;Total members : <span>{{count($membres)}}</span></h2>
                                                @foreach ($membres as $membre)
                                                <div class="ed_add_students">
                                                    <a href="{{ url('template/'.$membre->id.'/profil_member')}}"><img src="{{asset($membre->photo)}}" alt="">
                                                        <span>{{$membre->name}} {{$membre->prenom}}</span></a>
                                                    
                                                    
                                                </div>
                                                @endforeach
                                                
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