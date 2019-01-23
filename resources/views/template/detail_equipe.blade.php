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
                            <img src="{{asset($equipe->logo)}}" alt="item1" class="img-responsive" style="width:100%;">
                        </div>
                        <h3>{{$equipe->intitule}}</h3>
                        
                         <div class="ed_tabs_left">
                            <ul class="nav nav-tabs">
                              <li class="active"><a href="#a" data-toggle="tab">Apropos</a></li>
                              <li><a href="#b" data-toggle="tab">Membres <span>{{count($membres)}}</span></a></li>
                              <li><a href="#d" data-toggle="tab">Projets<span>{{count($projets)}}</span></a></li>
                              <li><a href="#c" data-toggle="tab">Articles<span>{{count($articles)}}</span></a></li>
                         
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
                                            <h2>Apropos de L'équipe</h2>
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
                                                    <h2>&nbsp;Total members : <span>{{count($membres)}} Membre</span></h2>
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
                                        <li role="presentation" class="active"><a href="#py" aria-controls="my" role="tab" data-toggle="tab">Projets</a></li>
                                         </ul>
                        
                                    <!-- Tab panes -->
                                    @if (count($projets))
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane active" id="py">
                                            <div class="ed_inner_dashboard_info">
                                         <div class="ed_course_single_info">
                                                <h2> &nbsp;Total Projets : <span>{{count($projets)}} Projet</span></h2>
                                                   
            
            @foreach ($projets as $projet)
            <div class=" pub" ><a href="{{url('template/'.$projet->id.'/detail_projet')}}">
                <div class="row">
                    <div class="col-md-3">
                        
                        @if ($projet->image !='')
                            <img src="{{asset($projet->image)}} " alt="item1" class="img-thumbnail">
                         @else
                            <img src="{{asset('images/content/'.$projet->type.'.jpg')}}" class="img-thumbnail" alt="" srcset="">
                         @endif
                    </div>    
                    <div>
                            <strong>INTITULE :</strong><span>{{$projet->intitule}}</span><br>
                            <strong>TYPE : {{$projet->type}}</strong>&nbsp;&nbsp;&nbsp;&nbsp;<br>
                            <strong>Résume :</strong><span>{{$projet->resume}}</span>
                        </div> 
            </div>
                    
                
     
                 </a>
                 </div>
                @endforeach
                @else
                <div align="center">
                    <h1>Aucun résultat trouvé</h1>
            </div>
                @endif

            
                                            </div>
                                        </div>
                                     </div>
                                     
                                    </div>
                        
                                </div><!--tab End-->
                            </div>
                        </div>
                        

                        <div class="tab-pane" id="c">
                            <div class="ed_dashboard_inner_tab">
                                <div role="tabpanel">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li role="presentation" class="active"><a href="#py" aria-controls="my" role="tab" data-toggle="tab">Articles</a></li>
                                         </ul>
                        
                                    <!-- Tab panes -->
                                    @if (count($articles))
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane active" id="py">
                                            <div class="ed_inner_dashboard_info">
                                         <div class="ed_course_single_info">
                                                <h2> &nbsp;Total Articles : <span>{{count($articles)}} Articles</span></h2>
                                                   
            
            @foreach ($articles as $article)
            <div class=" pub" ><a href="{{url('template/'.$article->id.'/detail_article')}}">
                <div class="row">
                        <div class="col-md-3"><img src="{{asset('images/content/'.$article->type.'.jpg')}}" class="img-thumbnail" srcset=""></div>    
                        <div>
                                <strong>TYPE : {{$article->type}}</strong>&nbsp;&nbsp;&nbsp;&nbsp;<strong><i class="fa fa-clock-o icon"></i>&nbsp; {{$article->mois}} {{$article->annee}}</strong><br>
                                <strong>TITRE :</strong><span>{{$article->titre}}                           
                                </span><br>
                                <strong>RESUME :</strong><span>{{$article->resume}}                           
                                    </span>
                            </div> 
                </div>
                    
                
     
                 </a>
                 </div>
                @endforeach
                @else
                <div align="center">
                    <h1>Aucun résultat trouvé</h1>
            </div>
                @endif

            
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