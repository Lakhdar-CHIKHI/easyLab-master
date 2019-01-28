@extends('layouts.template')
@section('contenu')
    <!--Breadcrumb start-->
    <div class="ed_pagetitle" data-stellar-background-ratio="0.5" data-stellar-vertical-offset="0" style="background-image: url(http://placehold.it/921X533);">
        <div class="ed_img_overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-4 col-sm-6">
                    <div class="page_title">
                        <h2>Contactez nous</h2>
                    </div>
                </div>
                <div class="col-lg-6 col-md-8 col-sm-6">
                    <ul class="breadcrumb">
                        <li><a href="index.html">accueil</a></li>
                        <li><i class="fa fa-chevron-left"></i></li>
                        <li><a href="contact.html">Contactez Nous</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--Breadcrumb end-->
    <!--Section fourteen Contact form start-->
    
    <div class="ed_transprentbg ed_toppadder80 ed_bottompadder80">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="ed_heading_top">
                            <h3>Envoie-nous un message</h3>
                        </div>
                    </div>
                    
                    <div class="ed_contact_form ed_toppadder60">
                        @if (session()->has('success'))
                            <div class="alert alert-success">
                                {{session('success')}}
                            </div>
                            
                        @endif
                            <form action="{{url('send')}}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <input type="text"  name="uname" class="form-control" placeholder="Votre nom">
                                @if ($errors->has('uname'))
                                    <br>
                                    <div class="alert alert-danger">{{ $errors->first('uname') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <input type="email" name="umail" class="form-control" placeholder="Votre email">
                                @if ($errors->has('umail'))
                                    <br>
                                    <div class="alert alert-danger">{{ $errors->first('umail') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <input type="text" name="sub" class="form-control" placeholder="Sujet">
                                @if ($errors->has('sub'))
                                    <br>
                                    <div class="alert alert-danger">{{ $errors->first('sub') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <textarea name="msg" class="form-control" rows="6" placeholder="Message"></textarea>
                                @if ($errors->has('msg'))
                                    <br>
                                    <div class="alert alert-danger">{{ $errors->first('msg') }}</div>
                                @endif
                            </div>
                            <input type="submit" id="ed_submit" class="btn ed_btn ed_orange pull-right" value="envoyer">
                            <p id="err"></p>
                        </div>
                    </form> 
                    </div>
                
                </div>
            </div>
        </div>
    
        <!--Section fourteen Contact form start-->
        <!--Section fifteen Contact form start-->
        <div class="ed_event_single_contact_address ed_toppadder70 ed_bottompadder70">
            <div class="container">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="ed_heading_top ed_bottompadder70">
                        <h3>Contact  &amp; Trouver</h3>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="row">
                        <div class="ed_event_single_address_info ed_toppadder50 ed_bottompadder50">
                            <h4 class="ed_bottompadder30">Informations de contact</h4>
                            <p class="ed_bottompadder40 ed_toppadder10">Vous pouvez toujours nous joindre via les coordonnées suivantes. Nous ferons de notre mieux pour vous joindre le plus possible.</p>
                            <p>Téléphone: <span>{{$labo->tel}}</span></p>
                            <p>Email: <a href="#">{{$labo->mail}}</a></p>
                            <p>Site Internet: <a href="#">http://www.LRIT.com</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="row">
                        <div class="ed_event_single_address_map">
                            <div id="map"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6545.006324473874!2d-1.3599443700074412!3d34.89382049997425!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd78c8635e9a140d%3A0xda4c5a9fd332e75e!2sUniversit%C3%A9+Abou+Bekr+Belkaid+Nouveau+P%C3%B4le!5e0!3m2!1sfr!2sdz!4v1542494875300" width="560" height="340" frameborder="0" style="border:0" allowfullscreen></iframe></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection