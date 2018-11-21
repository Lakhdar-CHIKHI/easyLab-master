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
    <div class="ed_transprentbg ed_toppadder80 ed_bottompadder80">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="ed_blog_all_item">
                        <div class="ed_blog_item ed_bottompadder50">
                            <div class="ed_blog_image">
                                <img src="../images/content/2_2.jpg" alt="blog image" />
                            </div>
                        <div class="ed_blog_info">
                            <h2>Are our teachers really skilled in all those areas?</h2>
                            <ul>
                                
                                <li><a href="#"><i class="fa fa-clock-o"></i> January 22, 2015</a></li>
                                
                            </ul>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent vehicula mauris ac facilisis congue. Fusce sem enim, rhoncus volutpat condimentum ac, placerat semper ligula. Suspendisse in viverra justo, eu placerat urna. Vestibulum blandit diam suscipit nibh mattis ullamcorper. Nullam a condimentum nulla, ut facilisis enim. Aliquam sagittis ipsum ex, sed luctus augue venenatis ut. Fusce at rutrum tellus, ac elementum neque. In nec velit orci. Etiam purus felis, pellentesque sit amet tincidunt at, iaculis quis erat. Morbi imperdiet sodales sapien nec rhoncus. Donec placerat mi et libero iaculis, id maximus est vestibulum. Etiam augue augue, auctor at ornare eget, porta ac nisl. Aliquam et mattis dolor, et aliquet ligula. Sed ultricies posuere magna elementum laoreet. Suspendisse elementum sagittis nisl, id pellentesque purus auctor finibus. Donec elementum quam est, a condimentum diam tempor ac. Sed quis magna lobortis, pulvinar est at, commodo mauris. Nunc in mollis erat. Integer aliquet orci non auctor pretium. Pellentesque eu nisl augue. Curabitur vitae est ut sem luctus tristique. Suspendisse euismod sapien facilisis tellus aliquam pellentesque.</p>
                            <blockquote>
                            Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante.
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