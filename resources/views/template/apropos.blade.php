@extends('layouts.template')
@section('contenu')
<div class="ed_pagetitle" data-stellar-background-ratio="0.5" data-stellar-vertical-offset="0" style="background-image: url(http://placehold.it/921X533);">
    <div class="ed_img_overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-4 col-sm-6">
                    <div class="page_title">
                            <h2>à Propos</h2>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-8 col-sm-6">
                        <ul class="breadcrumb">
                            <li><a href="index.html">Accueil</a></li>
                            <li><i class="fa fa-chevron-left"></i></li>
                            <li><a href="about.html">à Propos</a></li>
                        </ul>
                    </div>
        </div>
    </div>
</div>
<!--Breadcrumb end-->
<!--chart section start -->
<div class="ed_graysection ed_toppadder90 ed_bottompadder90">
    <div class="container">
        <div class="row">
            <div class="ed_counter_wrapper" style="">
                <div class="col-md-11 col-xs-12 col-sm-12 col-lg-12 text-center" style="">
                    <!--<div class="row">
                        <div class="col-md-12">
                            <h2 class="">LRIT</h2>
                        </div>
                    </div>-->
                    
                    <div class="row">
                            <div class="col-md-6">
                                <img src="../images/content/2_2.jpg" alt="" style="box-shadow:0 0 20px;border-radius:5px;">
                                </div>
                                <p class="col-md-6" style="" contenteditable="true">
                                        <h2 class="">{{$labo->nom}}</h2>
                                    &nbsp;{!!$labo->propos!!}</p>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<!-- chart Section end -->

<!-- team member section end -->
<!--counter section start -->
<div class="ed_graysection ed_toppadder90 ed_bottompadder90" style="padding-top: 0;">
    <div class="container">
        <div class="ed_counter_wrapper">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="ed_counter">
                    <h2 class="timer" data-from="0" data-to="{{count($equipes)}}" data-speed="3000"></h2>
                    <h4><strong>éQUIPES DE LABORATOIRE</strong></h4>
                    <p>Throughout these year we have done amazing work with 250 students..</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="ed_counter">
                    <h2 class="timer" data-from="0" data-to="{{count($membres)}}" data-speed="3000"></h2>
                    <h4><strong>MEMBRES DE LABORATOIRE</strong></h4>
                    <p>Only competitions were the ones in the back of the magazines you find..</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="ed_counter">
                    <h2 class="timer" data-from="0" data-to="{{count($projets)}}" data-speed="3000"></h2>
                    <h4><strong>POJETS DE LABORATOIRE</strong></h4>
                    <p>Can how you setup your classroom impact how students think...</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!--counter section end -->


@endsection