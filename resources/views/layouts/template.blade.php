<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Educo Responsive HTML Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="description" content="Educo">
    <meta name="keywords" content="Educo, html template, Education template">
    <meta name="author" content="Kamleshyadav">
    <meta name="MobileOptimized" content="320">
    <!--srart theme style -->
    <!--<link href="css/main.css" rel="stylesheet" type="text/css">-->
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    
    <!-- end theme style -->
    <!-- favicon links -->
    <link rel="shortcut icon" type="image/png" href="../images/header/logo2.png">
</head>
<body>
        <div id="educo_wrapper">
    <!--Header start-->
    <header id="ed_header_wrapper">
            <div class="ed_header_top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <p>Bienvenue au laboratoire ( LRIT ) </p>
                            <div class="ed_info_wrapper">
                                <a href="#" id="login_button">Se Connecter</a>
                                <div id="login_one" class="ed_login_form">
                                    <h3>Se Connecter</h3>
                                    <form class="form">
                                        <div class="form-group">
                                            <label class="control-label">Adresse E-mail :</label>
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Mot de passe :</label>
                                            <input type="password" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <button type="submit">Connexion</button>
                                            <a href="signup.html">sign up</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ed_header_bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-2 col-md-2 col-sm-2">
                            <div class="educo_logo">
                                <a href="index.html"><img src="../images/header/logo2.png" alt="logo" style="margin-top: -13px;"></a>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-8">
                            <div class="edoco_menu_toggle navbar-toggle" data-toggle="collapse" data-target="#ed_menu">Menu <i class="fa fa-bars"></i>
                            </div>
                            <div class="edoco_menu">
                                <ul class="collapse navbar-collapse" id="ed_menu">
                                    <li><a href="{{ url('template/accueil')}}">Accueil</a>                                      
                                    </li>
                                    <li><a href="{{ url('template/apropos')}}">à Propos</a></li>
                                    <li><a href="{{ url('template/actualites')}}">actualités</a></li>
                                    <li><a href="{{ url('template/projets')}}">Projets</a>                                  
                                    </li>
                                    <li><a href="{{ url('template/liste_equipes')}}">équipes</a>                                      
                                    </li>
                                    
                                    <li><a href="{{ url('template/contact')}}">Contact</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2">
                            <div class="educo_call"><i class="fa fa-phone"></i><a href="#">0560457533</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!--header end -->

    @yield('contenu')
    <!--Footer Top section start-->
    <div class="ed_footer_wrapper">
            <div class="ed_footer_top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="widget text-widget">
                                <p>
                                    <a href="index.html"><img src="../images/header/logo2.png" alt="Footer Logo"></a>
                                </p>
                                <p>Edution is an outstanding PSD template targeting educational institutions, helping them establish strong identity on the internet without any real developing knowledge. </p>
                                
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="widget text-widget">
                                <h4 class="widget-title">trouve nous</h4>
                                <p><i class="fa fa-safari"></i>22, Rue Abi Ayed Abdelkrim Fg Pasteur B.P 119 13000, Tlemcen <br> Algérie </p>
                                <p><i class="fa fa-envelope-o"></i><a href="#">info@edutioncollege.gov.co.uk</a> <a href="#">public@edutioncollege.gov.co.uk</a></p>
                                <p><i class="fa fa-phone"></i> Tél : 043.41.11.89 <br>Fax : 043.41.11.91 <br>   Télex : 1871-18034</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="widget text-widget">
                                <h4 class="widget-title">social media</h4>
                                <div class="ed_sociallink">
                                <ul >
                                        <li><a href="#" data-toggle="tooltip" data-placement="bottom" title="Dribble"><i class="fa fa-dribbble"></i></a></li>
                                        <li><a href="#" data-toggle="tooltip" data-placement="bottom" title="Retro"><i class="fa fa-camera-retro"></i></a></li>
                                        <li><a href="#" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i class="fa fa-facebook-official"></i></a></li>
                                    </ul>
                                 </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Footer Top section end-->
        <!--Footer Bottom section start-->
        <div class="ed_footer_bottom">
            <div class="container">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="ed_copy_right">
                                <p>© Copyright 2016, All Rights Reserved, <a href="#">Laboratoire de recherche Tlemcen ( LRIT )</a></p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="ed_footer_menu">
                                <ul>
                                    <li><a href="{{ url('template/accueil')}}">Accueil</a></li>
                                    <li><a href="{{ url('template/apropos')}}">politique de confidentialité</a></li>
                                    <li><a href="{{ url('template/apropos')}}">à Propos</a></li>
                                    <li><a href="{{ url('template/contact')}}">Contactez nous</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Footer Bottom section end-->
        </div>
     <!--main js file start-->
     <script type="text/javascript" src="{{asset('js/jquery-1.12.2.js')}}"></script>
     <script type="text/javascript" src="{{asset('js/bootstrap.js')}}"></script>
     <script type="text/javascript" src="{{asset('js/modernizr.js')}}"></script>
     <script type="text/javascript" src="{{asset('js/owl.carousel.js')}}"></script>
     <script type="text/javascript" src="{{asset('js/jquery.stellar.js')}}"></script>
     <script type="text/javascript" src="{{asset('js/smooth-scroll.js')}}"></script>
     <script type="text/javascript" src="{{asset('js/plugins/revel/jquery.themepunch.tools.min.js')}}"></script>
     <script type="text/javascript" src="{{asset('js/plugins/revel/jquery.themepunch.revolution.min.js')}}"></script>
     <script type="text/javascript" src="{{asset('js/plugins/revel/revolution.extension.layeranimation.min.js')}}"></script>
     <script type="text/javascript" src="{{asset('js/plugins/revel/revolution.extension.navigation.min.js')}}"></script>
     <script type="text/javascript" src="{{asset('js/plugins/revel/revolution.extension.slideanims.min.js')}}"></script>
     <script type="text/javascript" src="{{asset('js/plugins/countto/jquery.countTo.js')}}"></script>
     <script type="text/javascript" src="{{asset('js/plugins/countto/jquery.appear.js')}}"></script>
     <script type="text/javascript" src="{{asset('js/custom.js')}}"></script>


     <!--main js file end-->
</body>
</html>