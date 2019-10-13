<div class="site-mobile-menu">
    <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
        </div>
    </div>
    <div class="site-mobile-menu-body"></div>
</div>
<header class="site-navbar py-1" role="banner">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-6 col-xl-2">
                <a href="{{ url('/') }}" class="text-black h2 mb-0"><img src="{{ asset('public/dist/images/ukf_logo.png') }}" alt="Image" class="img-fluid"></a>
            </div>
            <div class="col-10 col-md-8 d-none d-xl-block">
                <nav class="site-navigation position-relative text-right text-lg-center" role="navigation">
                    <ul class="site-menu js-clone-nav mx-auto d-none d-lg-block">
                        <li class="active">
                            <a href="{{ url('/') }}">Domov</a>
                        </li>
                        <li class="has-children">
                            <a href="destination.html">Destinácie</a>
                            <ul class="dropdown">
                                <li><a href="#">Japan</a></li>
                                <li><a href="#">Europe</a></li>
                                <li><a href="#">China</a></li>
                                <li><a href="#">France</a></li>
                            </ul>
                        </li>
                        <li><a href="{{ url('about') }}">O nás</a></li>
                        <li><a href="{{ url('contact') }}">Kontakt</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-6 col-xl-2 text-right">
                <div class="d-none d-xl-inline-block">
                    <ul class="site-menu js-clone-nav ml-auto list-unstyled d-flex text-right mb-0" data-class="social">
                        @if(auth()->check())
                            <li><a href="{{ url('dashboard') }}">Dashboard</a></li>
                        @endif
                        <li>
                            <a href="https://www.facebook.com/UKFvNitre/" class="pl-3 pr-3 text-black" target="_blank"><span class="icon-facebook"></span></a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/ukfvnitre/?hl=sk" class="pl-3 pr-3 text-black" target="_blank"><span class="icon-instagram"></span></a>
                        </li>
                    </ul>
                </div>
                <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a
                            href="#" class="site-menu-toggle js-menu-toggle text-black"><span
                                class="icon-menu h3"></span></a></div>
            </div>
        </div>
    </div>
</header>
