<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Админпанель | @yield('title')</title>
        <link href="{{ asset('bootstrap-admin/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('bootstrap-admin/css/font-awesome.min.css') }}" rel="stylesheet">
        <link href="{{ asset('bootstrap-admin/css/prettyPhoto.css') }}" rel="stylesheet">
        <link href="{{ asset('bootstrap-admin/css/price-range.css') }}" rel="stylesheet">
        <link href="{{ asset('bootstrap-admin/css/animate.css') }}" rel="stylesheet">
        <link href="{{ asset('bootstrap-admin/css/main.css') }}" rel="stylesheet">
        <link href="{{ asset('bootstrap-admin/css/responsive.css') }}" rel="stylesheet">
        
        <script src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>

        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->       
        <!--
        <link rel="shortcut icon" href="/template/bootstrap-admin/images/ico/favicon.ico">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/template/bootstrap-admin/images/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/template/bootstrap-admin/images/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/template/bootstrap-admin/images/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="/template/bootstrap-admin/images/ico/apple-touch-icon-57-precomposed.png">
        -->
    </head><!--/head-->

    <body id="page-top" class="index">
        <div class="page-wrapper">

            @section('header')
            <header id="header"><!--header-->
                <div class="header_top"><!--header_top-->
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="contactinfo">
                                    <h5>
                                        <a href="/admin"><i class="fa fa-edit"></i> Админпанель</a>
                                    </h5>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="social-icons pull-right">
                                    <ul class="nav navbar-nav">
                                        <li><a href="/"><i class="fa fa-sign-out"></i>На сайт</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--/header_top-->
                @show



@yield('content')








                <div class="page-buffer"></div>
        </div>

        @section('footer')
        <footer id="footer" class="page-footer"><!--Footer-->
            <div class="footer-bottom">
                <div class="container">
                    <div class="row">
                        <p class="pull-left">Copyright © {{ date('Y') }}</p>
                        <p class="pull-right">phpAdminka for BIT.TEAM @author NewEXE</p>
                    </div>
                </div>
            </div>
        </footer><!--/Footer-->
        @show



        <script src="{{ asset('bootstrap-admin/js/jquery.js') }}"></script>
        <script src="{{ asset('bootstrap-admin/js/jquery.cycle2.min.js') }}"></script>
        <script src="{{ asset('bootstrap-admin/js/jquery.cycle2.carousel.min.js') }}"></script>
        <script src="{{ asset('bootstrap-admin/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('bootstrap-admin/js/jquery.scrollUp.min.js') }}"></script>
        <script src="{{ asset('bootstrap-admin/js/price-range.js') }}"></script>
        <script src="{{ asset('bootstrap-admin/js/jquery.prettyPhoto.js') }}"></script>
        <script src="{{ asset('bootstrap-admin/js/main.js') }}"></script>
        
        <script src="{{ asset('js/upload-images.js') }}"></script>

    </body>
</html>