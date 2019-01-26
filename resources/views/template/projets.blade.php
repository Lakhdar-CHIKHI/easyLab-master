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
    <div class="container" style="width:97%;">
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                <div class="row">
                    @if (count($projets))
                    @foreach ($projets as $projet)
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <div class="ed_mostrecomeded_course">
                                    <div class="ed_item_img">
                                        @if ($projet->image_projet !='')
                                        <img src="{{asset($projet->image_projet)}} " alt="item1" class="img-responsive">
                                        @else
                                        <img src="{{asset('images/content/'.$projet->type.'.jpg')}} " alt="item1" class="img-responsive">
                                        @endif
                                        </div>
                                <div class="ed_item_description ed_most_recomended_data">
                                    <h4><strong><a href="{{ url('template/'.$projet->id.'/detail_projet')}}">{{ $projet->intitule }} </a></strong></h4>
                                    <div class="row">
                                        <div class="ed_rating">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                
                                                    <div class="course_detail">
                                                        <div class="course_faculty">
                                                                <strong> TYPE  :  <a href="instructor_dashboard.html"> {{ $projet->type }} </a></strong>
                                                        </div>
                                                    </div>
                                                    
                                                
                                            </div>
                                            
                                        </div>
                                    </div>
                                    
                                    <div style="height: 110px;overflow: hidden;margin: 2%;">{!!$projet->resume!!}</div>
                                    <a href="{{ url('template/'.$projet->id.'/detail_projet')}}" class="btn ed_btn ed_orange">Voir Plus &nbsp;&nbsp;&nbsp;<i class="fa fa-long-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @else
                    <div align="center">
                            <h1>Aucun résultat trouvé</h1>
                            <h2>Essayez différents mots-clés ou supprimez les filtres de recherche</h2>
                    </div>
                        
                    @endif
           
            
        </div>
    </div>
    <!--Sidebar Start-->
    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
        <div class="sidebar_wrapper_upper">
            <div class="sidebar_wrapper">
                <aside class="widget widget_search">
                    <div class="input-group">
                        <form action="{{url('/template/projets/search_projet')}}" method="get">
                                {{ csrf_field() }}
                        <input name="search" type="text" style="width: 84%;" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" style="padding: 6px 12px;border-bottom-right-radius: 20px !important;"  type="submit"><i class="fa fa-search"></i></button>
                        
                        </span></form>
                    </div>
                </aside>
            <aside class="widget widget_categories">
                    <h4 class="widget-title">Types</h4>
                    <ul>
                        <li><a href="{{url('/template/projets/tous')}}"><i class="fa fa-chevron-right"></i> Tous les Groupes</a></li>
                        @foreach ($equipes as $equipe)
                        <li><a href="{{url('/template/projets/'.$equipe->id)}}"><i class="fa fa-chevron-right"></i> {{$equipe->intitule}}</a></li>
                        @endforeach
                       
                    </ul>
                </aside>
                
                <aside class="widget widget_tag_cloud">
                    <h4 class="widget-title">Filter par type</h4>
                    <a href="{{url('/template/projets/type/tous')}}" class="ed_btn ed_orange">Tous</a>
                    <a href="{{url('/template/projets/type/Publication(Revue)')}}" class="ed_btn ed_orange">Publication(Revue)</a>
                    <a href="{{url('/template/projets/type/Livre')}}" class="ed_btn ed_orange">Livre</a>
                    
                    <a href="{{url('/template/projets/type/Poster')}}" class="ed_btn ed_orange">Poster</a>
                    
                    <a href="{{url('/template/projets/type/Brevet')}}" class="ed_btn ed_orange">Brevet</a>
                    <a href="{{url('/template/projets/type/Chapitre d\'un livre')}}" class="ed_btn ed_orange">Chapitre d'un Livre</a>
                    <a href="{{url('/template/projets/type/Article court')}}" class="ed_btn ed_orange">Article court</a>
                    <a href="{{url('/template/projets/type/Article long')}}" class="ed_btn ed_orange">Article Long</a>
                    
                    
                </aside>
            </div>
        </div>
    </div>
    <!--Sidebar End-->
        </div>
        <div class="col-lg-12" >
            <div class="ed_blog_bottom_pagination">
                <nav>
                    {!! $projets->appends(["search"=>Request::get('search')])->links() !!}
                </nav>
            </div>
        </div>
        

    </div>
    <!-- /.container -->
</div>

@endsection