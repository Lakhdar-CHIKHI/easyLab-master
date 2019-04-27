@extends('layouts.template')
@section('contenu')
    <!--Page main section start-->
    
        
        <div class="ed_slider_form_section">
            <!--Slider start-->
            <section class="ed_mainslider">
                <article class="content">
                    <div class="rev_slider_wrapper">
                        <!-- START REVOLUTION SLIDER 5.0 auto mode -->
                        <div id="rev_slider_4_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" data-alias="classicslider1" style="margin:0px auto;background-color:transparent;padding:0px;margin-top:0px;margin-bottom:0px;">
                            <div id="rev_slider" class="rev_slider " data-version="5.0">
                                <ul>
                                    <!-- SLIDE  -->
                                    <li data-transition="slotslide-horizontal">
                                        <!-- MAIN IMAGE -->
                                        <img src="{{asset('images/content/labo.jpg')}}" alt="">
                                        <div class="ed_course_single_image_overlay"></div>
                                        <!-- LAYER NR. 1 -->
                                        <div class="tp-caption NotGeneric-Title   tp-resizeme rs-parallaxlevel-0" data-x="['left','left','left','left']" data-hoffset="['45','60','60','40']" data-y="['top','top','top','top']" data-voffset="['170','175','155','115']" data-width="none" data-height="none"
                                            data-whitespace="nowrap" data-transform_idle="o:1;" data-transform_in="x:-50px;skX:100px;opacity:0;s:2000;e:Power4.easeInOut;" data-transform_out="s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" data-start="1510"
                                            data-splitin="none" data-splitout="none" data-responsive_offset="on" data-elementdelay="0.05" style="z-index: 5; white-space: nowrap; font-size: 50px; color:#fff;     font-family: 'Roboto Slab', serif;">Pour en savoir plus sur laboratoire ( LRIT )</div>
                                        <div class="tp-caption NotGeneric-Title   tp-resizeme rs-parallaxlevel-0" data-x="['left','left','left','left']" data-hoffset="['45','60','60','40']" data-y="['top','top','top','top']" data-voffset="['230','215','180','170']" data-width="none" data-height="none"
                                            data-whitespace="nowrap" data-transform_idle="o:1;" data-transform_in="x:-50px;skX:100px;opacity:0;s:2000;e:Power4.easeInOut;" data-transform_out="s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" data-start="1810"
                                            data-splitin="none" data-splitout="none" data-responsive_offset="on" data-elementdelay="0.05" style="z-index: 5; white-space: nowrap; font-size: 50px; color:#fff;     font-family: 'Roboto Slab', serif;">laboratoire de Recheche Informatique Tlemcen </div>
                                        <!-- LAYER NR. 2 -->
                                        <div class="li_slide tp-caption NotGeneric-CallToAction ed_btn ed_green tp-resizeme rs-parallaxlevel-0" data-x="['left','left','left','left']" data-hoffset="['50','65','65','45']" data-y="['top','top','top','top']" data-voffset="['350','276','226','151']" data-whitespace="nowrap"
                                            data-transform_idle="o:1;" data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;" data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                                            data-mask_in="x:0px;y:[100%];s:inherit;e:inherit;" data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" data-start="2000" data-splitin="none" data-splitout="none" data-responsive_offset="on" style="z-index: 7; white-space: nowrap; "><a href="{{ url('template/apropos')}}" class="voir"> voir plus </a></div>
                                    </li>
                                    <li data-transition="slotslide-vertical">
                                        <!-- MAIN IMAGE -->
                                        <img src="{{asset('images/content/2_2.jpg')}}" alt="">
                                        <div class="ed_course_single_image_overlay"></div>
                                        <!-- LAYER NR. 1 -->
                                        <div class="tp-caption NotGeneric-Title   tp-resizeme rs-parallaxlevel-0" data-x="['left','left','left','left']" data-hoffset="['45','60','60','40']" data-y="['top','top','top','top']" data-voffset="['170','175','155','115']" data-width="none" data-height="none"
                                            data-whitespace="nowrap" data-transform_idle="o:1;" data-transform_in="x:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power3.easeInOut;" data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                                            data-mask_in="x:0px;y:0px;s:inherit;e:inherit;" data-start="1510" data-splitin="none" data-splitout="none" data-responsive_offset="on" data-elementdelay="0.05" style="z-index: 5; white-space: nowrap; font-size: 50px; color:#fff;     font-family: 'Roboto Slab', serif;">Pour voir toutes les équipes</div>
                                        <div class="tp-caption NotGeneric-Title   tp-resizeme rs-parallaxlevel-0" data-x="['left','left','left','left']" data-hoffset="['45','60','60','40']" data-y="['top','top','top','top']" data-voffset="['230','215','180','170']" data-width="none" data-height="none"
                                            data-whitespace="nowrap" data-transform_idle="o:1;" data-transform_in="x:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power3.easeInOut;" data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                                            data-mask_in="x:0px;y:0px;s:inherit;e:inherit;" data-start="1810" data-splitin="none" data-splitout="none" data-responsive_offset="on" data-elementdelay="0.05" style="z-index: 5; white-space: nowrap; font-size: 50px; color:#fff;     font-family: 'Roboto Slab', serif;">Du Laboratoire </div>
                                        <!-- LAYER NR. 2 -->
                                        <div class="li_slide tp-caption NotGeneric-CallToAction ed_btn ed_green tp-resizeme rs-parallaxlevel-0" data-x="['left','left','left','left']" data-hoffset="['45','60','60','40']" data-y="['top','top','top','top']" data-voffset="['350','276','226','151']" data-whitespace="nowrap"
                                            data-transform_idle="o:1;" data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;" data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                                            data-mask_in="x:0px;y:[100%];s:inherit;e:inherit;" data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" data-start="1500" data-splitin="none" data-splitout="none" data-responsive_offset="on" style="z-index: 7; white-space: nowrap; "><a href="{{ url('template/liste_equipes')}}" class="voir"> voir plus </a></div>
                                    </li>
                                    <li data-transition="slotslide-horizontal">
                                            <!-- MAIN IMAGE -->
                                            <img src="{{asset('images/content/labo.jpg')}}" alt="">
                                            <div class="ed_course_single_image_overlay"></div>
                                            <!-- LAYER NR. 1 -->
                                            <div class="tp-caption NotGeneric-Title   tp-resizeme rs-parallaxlevel-0" data-x="['left','left','left','left']" data-hoffset="['45','60','60','40']" data-y="['top','top','top','top']" data-voffset="['170','175','155','115']" data-width="none" data-height="none"
                                                data-whitespace="nowrap" data-transform_idle="o:1;" data-transform_in="x:-50px;skX:100px;opacity:0;s:2000;e:Power4.easeInOut;" data-transform_out="s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" data-start="1510"
                                                data-splitin="none" data-splitout="none" data-responsive_offset="on" data-elementdelay="0.05" style="z-index: 5; white-space: nowrap; font-size: 50px; color:#fff;     font-family: 'Roboto Slab', serif;">Pour voir tous les Projets </div>
                                            <div class="tp-caption NotGeneric-Title   tp-resizeme rs-parallaxlevel-0" data-x="['left','left','left','left']" data-hoffset="['45','60','60','40']" data-y="['top','top','top','top']" data-voffset="['230','215','180','170']" data-width="none" data-height="none"
                                                data-whitespace="nowrap" data-transform_idle="o:1;" data-transform_in="x:-50px;skX:100px;opacity:0;s:2000;e:Power4.easeInOut;" data-transform_out="s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" data-start="1810"
                                                data-splitin="none" data-splitout="none" data-responsive_offset="on" data-elementdelay="0.05" style="z-index: 5; white-space: nowrap; font-size: 50px; color:#fff;     font-family: 'Roboto Slab', serif;"> De Laboratoire de Recheche Informatique  </div>
                                            <!-- LAYER NR. 2 -->
                                            <div class="li_slide tp-caption NotGeneric-CallToAction ed_btn ed_green tp-resizeme rs-parallaxlevel-0" data-x="['left','left','left','left']" data-hoffset="['50','65','65','45']" data-y="['top','top','top','top']" data-voffset="['350','276','226','151']" data-whitespace="nowrap"
                                                data-transform_idle="o:1;" data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;" data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                                                data-mask_in="x:0px;y:[100%];s:inherit;e:inherit;" data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" data-start="2000" data-splitin="none" data-splitout="none" data-responsive_offset="on" style="z-index: 7; white-space: nowrap; "><a href="{{ url('template/projets')}}" class="voir"> voir plus </a> </div>
                                        </li>
                                    <!-- SLIDE  -->
                                </ul>
                            </div>
                            <!-- END REVOLUTION SLIDER -->
                        </div>
                        <!-- END  -->
                    </div>
                    <!-- END REVOLUTION SLIDER WRAPPER -->
                </article>
            </section>
            <!--Slider end-->
            <!--Slider form start-->
            <!--<div class="ed_form_box">
                <div class="container">
                    <div class="ed_search_form">
                <form class="form-inline form-search" action="{{url('chercher')}}" method="post"  id="contact_form" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                            <div class="form-group">
                                    <select type="text" name="choix_pub"  class="form-control"  value="{{old('choix_pub')}}">*
                                            
                                            <option>Projets</option>
                                            <option>Articles</option>
                                            
                                          </select>
                                
                            </div>
                            <div class="form-group">
                                    <select type="text" name="choix_pub_detail" class="form-control" value="{{old('choix_pub_detail')}}">*
                                        <option></option>
                                            <option>Poster</option>
                                            <option>Article court</option>
                                            <option>Article long</option>
                                            <option>Publication(Revue)</option>
                                            <option>Chapitre d'un livre</option>
                                            <option>Livre</option>
                                            <option>Brevet</option> 
                                          </select>
                                
                            </div>
                            <div class="form-group">
                                <input type="text" placeholder="Nom" name="nom" class="form-control" id="nom_pub">
                            </div>
                            
                            <div class="form-group">
                                
                                <button type="submit" class="btn ed_btn pull-right ed_orange">Chercher</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>-->
           <div class="ed_form_box">
                <div class="container">
                    <div class="ed_search_form" align="center" style="padding:30px;border-radius: 10px;">
                            
                                    
                                        <div class="ed_counter_wrapper" style="padding:30px 30px 10px 30px;border-radius: 10px;
                                        box-shadow: 0 0 80px;">
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                        <div class="ed_counter">
                                                            <h2 class="timer"  data-from="0" data-to="{{count($equipes)}}" data-speed="3000"></h2>
                                                            <h4><strong >EQUIPES</strong></h4>
                                                        </div>
                                                    </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                <div class="ed_counter">
                                                    <h2 class="timer"  data-from="0" data-to="{{count($membres)}}" data-speed="3000"></h2>
                                                    <h4><strong >MEMBRES</strong></h4>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                <div class="ed_counter">
                                                    <h2 class="timer" data-from="0" data-to="{{count($projets)}}" data-speed="3000"></h2>
                                                    <h4><strong >POJETS</strong></h4>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    
                                
                            </div>
                </div>
            </div>
            <!--Slider form end-->
        </div>
        <!--Our expertise section one start -->
        <div class="ed_transprentbg ed_toppadder100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="ed_heading_top ed_toppadder50">
                            <h3>Actualites du Laboratoire ( LRIT )</h3>
                        </div>  
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="ed_populer_areas_slider">
                            <div class="owl-carousel owl-theme">
                                    @foreach ($actualites as $actualite)
                                    
                                
                                    <div class="item ed_mostrecomeded_course projet_style">
                                        <div class="ed_item_img img_pr">
                                            
                                            <img src="{{asset($actualite->photo)}} " alt="item1" class="img-responsive" style="height: 143px;">
                                                                                   </div>
                                        <div class="ed_item_description ed_most_recomended_data">
                                            <h4 class="fixed_taille"><strong><a href="{{ url('template/'.$actualite->id.'/detail_actualite')}}">{{ $actualite->titre }} </a></strong></h4>
                                            <div class="row">
                                                    <div class="ed_rating">
                                                        <div class="col-lg-12 col-md-7 col-sm-7 col-xs-7">
                                                            
                                                                <div class="course_detail" style="height:20px;">
                                                                    <div class="course_faculty fixed_taille">
                                                                            <strong><i class="fa fa-users"></i> &nbsp;&nbsp;&nbsp;{{$actualite->createur->name}} {{$actualite->createur->prenom}}</strong>
                                                                    </div>
                                                                </div>
                                                                
                                                            
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            <div class="row">
                                                <div class="ed_rating">
                                                    <div class="col-lg-12 col-md-7 col-sm-7 col-xs-7">
                                                        
                                                            <div class="course_detail" style="height:20px;">
                                                                <div class="course_faculty fixed_taille">
                                                                        <strong><i class="fa fa-clock-o"></i> &nbsp;&nbsp;&nbsp;{{$actualite->date}}</strong>
                                                                </div>
                                                            </div>
                                                            
                                                        
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            
                                            
                                            <div ><div class="fixed_taille_p">{!!$actualite->resume!!}</div></div>
                                            
                                            <a href="{{ url('template/'.$actualite->id.'/detail_actualite')}}" class="btn ed_btn ed_orange">Voir plus &nbsp;&nbsp;&nbsp;<i class="fa fa-long-arrow-right"></i></a>
                                        </div>
                                    </div>
                                    @endforeach
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container -->
        </div>
        <!--Our expertise section one end -->
        <!--skill section start -->
        <!--skill section end -->
        <!--video_section Section three start -->
        <div class="ed_parallax_section" data-stellar-background-ratio="0.5" data-stellar-vertical-offset="100" style="">
            <div class="ed_img_overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="ed_video_section">
                            <div class="embed-responsive embed-responsive-16by9">
                                
                                <video class="video-fluid z-depth-1" autoplay loop controls muted>
                                    <source src="{{asset($labo->video)}}" type="video/mp4" />
                                  </video>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="ed_video_section_discription">
                            <h4>{{$labo->nom}}</h4>
                            {!!$labo->propos!!}
                            <span><a href="{{url('template/apropos')}}" class="btn ed_btn ed_orange">Voir Plus</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--video_section Section three end -->
        <!-- Most recomended Courses Section four start -->
        <div class="ed_transprentbg ed_toppadder80 ed_bottompadder80">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="ed_heading_top ed_bottompadder80">
                            <h3>Memebres de Laboratoire ( LRIT )</h3>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="ed_mostrecomeded_course_slider ed_mostrecomededcourseslider">
                            <div id="owl-demo3" class="owl-carousel owl-theme">
                                    @foreach ($membres as $membre)
                                    <div class="item membre_style">
                                            <div class="ed_item_img accueil_profil">
                                                <img src="{{asset($membre->photo)}}" alt="item1" class="img-responsive">
                                            </div>
                                            <div class="ed_item_description center">
                                                <h4><a href="{{ url('template/'.$membre->id.'/profil_member')}}">{{$membre->name}} {{$membre->prenom}}</a></h4>
                                                <h5><strong>Grade : </strong> {{$membre->grade}}</h5>
                                                <div class="btn-group">
                                                    <a href="{{$membre->lien_linkedin}}" class="btn btn-social-icon btn-linkedin" title="Linkedin"><img src="{{asset('images/icons/in.png')}}"></a>
                                                    <a href="{{$membre->lien_rg}}" class="btn btn-social-icon" title="Researchgate"><img src="{{asset('images/icons/rg.png')}}"></a>
                                                </div>
                                            </div>
                                        </div>  
                                    @endforeach
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container -->
        </div>
        <!--Most recomended Courses Section four end -->
        <!--Latest news start -->
        <!--Latest news end -->
        <!--Newsletter Section six start-->
        <!--Newsletter Section six end-->
        
    
    <!--Page main section end-->
@endsection