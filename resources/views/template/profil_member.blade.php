@extends('layouts.template')
@section('contenu')
     <!--Breadcrumb start-->
     <div class="ed_pagetitle" data-stellar-background-ratio="0.5" data-stellar-vertical-offset="0" style="background-image: url(http://placehold.it/921X533);">
        <div class="ed_img_overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-4 col-sm-6">
                    <div class="page_title">
                        <h2>{{$membre->name}} {{$membre->prenom}}</h2>
                    </div>
                </div>
                <div class="col-lg-6 col-md-8 col-sm-6">
                    <ul class="breadcrumb">
                        <li><a href="index.html">accueil</a></li>
                        <li><i class="fa fa-chevron-left"></i></li>
                        <li><a href="dashboard.html">Profil member</a></li>
                        <li><i class="fa fa-chevron-left"></i></li>
                        <li><a href="dashboard.html">{{$membre->name}} {{$membre->prenom}}</a></li>
                        
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
                                        @if ($membre->equipe)
                                        <p><strong>équipe : </strong>{{$membre->equipe->intitule}}</p>
                                        @endif
                                        
                                        <p><strong>Email : </strong> {{$membre->email}} </p>
                                        @if ($membre->date_naissance && ( $membre->autorisation_public_date_naiss ))
                                        <p><strong>Date de naissance : </strong>{{$membre->date_naissance}}</p>
                                        @endif
                                        @if ($membre->num_tel && ( $membre->autorisation_public_date_naiss ))
                                        <p><strong>N° De Télépone : </strong>{{$membre->num_tel}}</p>
                                        @endif
                                        <div class="btn-group">
                                                <a href="{{$membre->lien_linkedin}}" class="btn btn-social-icon btn-linkedin" title="Linkedin"><img src="{{asset('images/icons/in.png')}}"></a>
                                                <a href="{{$membre->lien_rg}}" class="btn btn-social-icon" title="Researchgate"><img src="{{asset('images/icons/rg.png')}}"></a>
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
                                                    <div class="ed_course_single_info">
                                                                @if (count($membre->projets))
                                                                
                                                                <h2> &nbsp;Total Projets : <span>{{count($membre->projets)}} projets</span></h2>
            
                                                                @foreach ($membre->projets as $projet)
                                                            <div class=" pub" ><a href="{{url('template/'.$projet->id.'/detail_article')}}">
                                                                <div class="row">
                                                                        <div class="col-md-3">
                                                                                @if ($projet->image !='')
                                                                                <img src="{{asset($projet->image)}} " alt="item1" class="img-thumbnail">
                                                                             @else
                                                                                <img src="{{asset('images/content/'.$projet->type.'.jpg')}}" class="img-thumbnail" alt="" srcset="">
                                                                             @endif
                                                                        </div>    
                                                                        <div>
                                                                                
                                                                                <strong>INTITULE :</strong><span>{{$projet->intitule}}
                                                                                </span><br>
                                                                                <strong>TYPE : {{$projet->type}}</strong>&nbsp;&nbsp;&nbsp;&nbsp;<br>
                                                                                <strong>RESUME :</strong><span>{{$projet->resume}}</span></div> 
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
                                                            <div role="tabpanel" class="tab-pane" id="result" style="">
                                                                    <div class="ed_course_single_info">
                                                                    @if (count($membre->articles))
                                                                    
                                                                    <h2> &nbsp;Total Articles : <span>{{count($membre->articles)}} Articles</span></h2>
                
                                                                    @foreach ($membre->articles as $article)
                                                                <div class=" pub" ><a href="{{url('template/'.$article->id.'/detail_article')}}">
                                                                    <div class="row">
                                                                            <div class="col-md-3"><img src="{{asset('images/content/'.$article->type.'.jpg')}}" class="img-thumbnail" srcset=""></div>    
                                                                            <div> <strong>TYPE : {{$article->type}}</strong>&nbsp;&nbsp;&nbsp;&nbsp;<strong><i class="fa fa-clock-o icon"></i>&nbsp; {{$article->mois}} {{$article->annee}}</strong><br>
                                                                                    <strong>TITRE :</strong><span>{{$article->titre}}</span><br>
                                                                                    <strong>RESUME :</strong><span>{{$article->resume}}</span>
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
                                                                </div> </div>


                                                            <div role="tabpanel" class="tab-pane" id="status" style="">
                                                                    <div class="ed_inner_dashboard_info">
                                                                            
                                                                    @if ($membre->these)
                                                                    <h5><strong>Encadreur :</strong> {{$membre->these->encadreur_int}}{{$membre->these->encadreur_ext}}<br>
                                                                        <strong>Coencadreur :</strong> {{$membre->these->coencadreur_int}}{{$membre->these->coencadreur_ext}} 
                                             @if($these->encext )   <br>  <strong>Encadreur Externe:</strong>{{$membre->these->encext->nom}} {{$membre->these->encext->prenom}}   @endif
                                           @if($these->cooencext )  <br>  <strong>Coencadreur Externe:</strong>{{$membre->these->cooencext->nom}} {{$membre->these->cooencext->prenom}} @endif
                                                                     
                                                                    </h5>
                                                                    <h3><strong>Titre : </strong>{{$membre->these->titre}}</h3>
                                                                    <h3><strong>Resume : </strong></h3>
                                                                    <p>{{$membre->these->sujet}}</p>
                                                                    @if ($membre->these->detail)
                                                                    <h3><strong>Piece Joint : </strong><a href='{{asset($membre->these->detail)}}'>&nbsp;&nbsp;<i class="glyphicon glyphicon-floppy-save"></i> Télécharger Fichier</a></h3>
                                                                    @endif
                                                                
                                                                    @else
                                                                    <div align="center">
                                                                            <h1>Aucun résultat trouvé</h1>
                                                                    </div>
                                                                    @endif
                                                                            
                                                                    
                                                                        
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
                           
                            
                            
                            
                        </div>
                    </div>
                
    <!--single student detail end-->
  
@endsection