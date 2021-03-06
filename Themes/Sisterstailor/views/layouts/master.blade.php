<!DOCTYPE html>
<html lang="zxx" class="no-js">
<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/fav.png">
    <!-- Author Meta -->
    <meta name="author" content="CodePixar">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>Shop</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
    <!--
    CSS
    ============================================= -->
    @yield('link')
    <link rel="stylesheet" href="{{asset('themes/sisterstailor/css/linearicons.css')}}">
    <link rel="stylesheet" href="{{asset('themes/sisterstailor/css/font-awesome.min.css')}}">
    <!-- <link rel="stylesheet" href="{{asset('themes/sisterstailor/css/nice-select.css')}}"> -->
    <link rel="stylesheet" href="{{asset('themes/sisterstailor/css/ion.rangeSlider.css')}}" />
    <link rel="stylesheet" href="{{asset('themes/sisterstailor/css/ion.rangeSlider.skinFlat.css')}}" />
    <link rel="stylesheet" href="{{asset('themes/sisterstailor/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('themes/sisterstailor/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('themes/sisterstailor/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('themes/sisterstailor/css/style.css')}}">
    <script src="{{asset('vendor/sweetalert/sweetalert.all.js')}}"></script>
</head>
<body>

<!-- Start Header Area -->
<header class="default-header">
    <div class="menutop-wrap">
        <div class="menu-top container">
            <div class="d-flex justify-content-between align-items-center">
                <ul class="list">
                    <li><a href="tel:+84905 911 432">+84905 911 432</a></li>
                    <li><a href="http://facebook.com/sisterstailor">facebook.com/sisterstailor</a></li>
                </ul>

            </div>            
        </div>
    </div>
    <nav class="navbar navbar-expand-lg  navbar-light">
        <div class="container">
            <a class="navbar-brand" href="{{route('homepage')}}">
                <img src="{{asset('themes/sisterstailor/img/logo_st.png')}}" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end align-items-center" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li><a href="{{route('homepage')}}">Home</a></li>
                    <!-- Dropdown -->
                    <li class="dropdown menu-mobile">
                        <a class="page-scroll dropdown-toggle" href="#catagory"
                           data-toggle="dropdown">Category<b class="caret"></b></a>
                        <ul class="dropdown-menu menu-li">
                            @foreach($othercategory as $other)
                                <li class="dropdown-item"><a href="{{route('products.index',[$other->slug])}}" class="btn-modal-about">{{$other->name }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="dropdown menu-mobile">
                        <a class="page-scroll dropdown-toggle" href="#men"
                           data-toggle="dropdown">Men<b class="caret"></b></a>
                        <ul class="dropdown-menu menu-li">
                            @foreach($nameMen as $mencate)
                                <li class="dropdown-item"><a href="{{route('products.index',[$mencate->slug])}}" class="btn-modal-about">{{$mencate->name }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="dropdown menu-mobile">
                        <a class="page-scroll dropdown-toggle" href="#women"
                           data-toggle="dropdown">Women<b class="caret"></b></a>
                        <ul class="dropdown-menu menu-li">
                            @foreach($nameWomen as $womencate)
                                <li class="dropdown-item"><a href="{{route('products.index',[$womencate->slug])}}" class="btn-modal-about">{{$womencate->name }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li><a href="{{route('news')}}">News</a></li>
                    <li><a href="{{route('contact.contacts')}}">Contact</a></li>

                </ul>
                <div class="headerItem_37vW">
                <a class="headerCart_3pLj" href="{{url('/orders')}}">
                    <svg viewBox="0 0 24 24" width="1em" height="1em" class="undefined icon-large icon-inverse">
                        <path fill-rule="evenodd" d="M8 18c-1.104 0-1.99.895-1.99 2 0 1.104.886 2 1.99 2a2 2 0 0 0 0-4m10 0c-1.104 0-1.99.895-1.99 2 0 1.104.886 2 1.99 2a2 2 0 0 0 0-4M4 2H1.999v1.999H4l3.598 7.588-1.353 2.451A2 2 0 0 0 8 17h12v-2H8.423a.249.249 0 0 1-.249-.25l.03-.121L9.102 13h7.449c.752 0 1.408-.415 1.75-1.029l3.574-6.489A1 1 0 0 0 21 3.999H6.213l-.406-.854A1.997 1.997 0 0 0 4 2">
                        </path>
                    </svg><span class="badge_2k15 badgeNumber_ebbk">0</span>
                </a>
            </div>
            </div>
        </div>
    </nav>
</header>
<!-- End Header Area -->
@yield('content')
@include('sweetalert::alert')
<!-- start banner Area -->

<!-- End brand Area -->

<!-- start footer Area -->
<footer class="footer-area section-gap">
    <div class="container">
        <div class="footer-bottom d-flex justify-content-center align-items-center flex-wrap">
            <div class="footer-des">
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            {{--<p>Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a></p>--}}
                <h2 style="color:#777777">Quàn Lý Giặc Ủi</h2>
            </br>
                <address>Add: 60 Bach Dang St, Hoi An, Quang Nam, Viet Nam</address>
                </br>
                <p>Tel: +84905 911 432</p>
            </br>
                <p>Web: <a class="name-products" href="{{route('homepage')}}">http://sisterstailor.com</a></p>
                </br>
                <p>Fb: <a class="name-products" href="https://www.facebook.com/sisterstailor">https://www.facebook.com/sisterstailor</a></p>
            </br>
                <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved </p>

            </div>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        </div>
    </div>
</footer>
<!-- End footer Area -->

<script src="{{asset('themes/sisterstailor/js/vendor/jquery-2.2.4.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="{{asset('themes/sisterstailor/js/vendor/bootstrap.min.js')}}"></script>
<script src="{{asset('themes/sisterstailor/js/jquery.ajaxchimp.min.js')}}"></script>
<script src="{{asset('themes/sisterstailor/js/jquery.nice-select.min.js')}}"></script>
<script src="{{asset('themes/sisterstailor/js/jquery.sticky.js')}}"></script>
<script src="{{asset('themes/sisterstailor/js/ion.rangeSlider.js')}}"></script>
<script src="{{asset('themes/sisterstailor/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('themes/sisterstailor/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('themes/sisterstailor/js/main.js')}}"></script>
<script>
    $(document).ready(function () {
        $.get('{{route('order.get_cart')}}', function (data) {
            $('.badgeNumber_ebbk').text(data.total);
        });
    })
</script>
@stack('js')
</body>
</html>