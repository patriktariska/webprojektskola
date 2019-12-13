@if(Auth::check())
    @if (Auth::user()->isAdmin())
        <div class="container-fluid bg-dark">
            <div class="row">
                <div class="col-md-12">
                    <div class="float-right">
                        <a href="{{ route('dashboard') }}" class="pl-3 pr-3">Dashboard</a>
                        <a href="{{ route('logout') }}" class="pl-3 pr-3"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Odhlásiť
                            sa</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="container-fluid bg-dark">
            <div class="row">
                <div class="col-md-12">
                    <div class="float-right">
                        <a href="{{ route('myfeedback') }}" class="pl-3 pr-3">Správa Feedbackov</a>
                        <a href="{{ route('mychallenges') }}" class="pl-3 pr-3">Prihlásené výzvy</a>
                        <a href="{{ route('logout') }}" class="pl-3 pr-3"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Odhlásiť
                            sa</a>
                    </div>
                </div>
            </div>
        </div>
        
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    @endif
@endif
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
                <a href="{{ url('/') }}" class="text-black h2 mb-0"><img
                            src="{{ asset('public/dist/images/ukf_logo.png') }}" alt="Image" class="img-fluid"
                            style="width: 80px;"></a>
            </div>
            <div class="col-10 col-md-8 d-none d-xl-block">
                <nav class="site-navigation position-relative text-right text-lg-center" role="navigation">
                    <ul class="site-menu js-clone-nav mx-auto d-none d-lg-block">
                        <li class="{{ request()->is('/') ? 'active' : '' }}">
                            <a href="{{ url('/') }}">Domov</a>
                        </li>
                        <li class="has-children {{ request()->is('challenge') ? 'active' : '' }}">
                        <a href="{{ route("public.mobility.challenges") }}">Výzvy</a>
                            <ul class="dropdown">
                                <li><a href="{{ route("public.mobility.erasmus") }}">Erasmus+</a></li>
                                <li><a href="{{ route("public.mobility.ceepus") }}">CEEPUS</a></li>
                            </ul>
                        </li>
                        <li class="{{ request()->is('about') ? 'active' : '' }}"><a href="{{ url('about') }}">O nás</a></li>
                        <li class="{{ request()->is('contact') ? 'active' : '' }}"><a href="{{ url('contact') }}">Kontakt</a></li>
                        <li class="{{ request()->is('feed') ? 'active' : '' }}"><a href="{{ url('feed') }}">Odozva</a></li>
                        @if(!Auth::check())
                        <li class="{{ request()->is('prihlas') ? 'active' : '' }}"><a href="{{ url('prihlas') }}">Prihlásenie</a></li>
                        @endif
                        <li><a href="https://studyabroad.sk" class="btn btn-primary py-1 px-2 text-white" target="_blank">Prihlás sa na výzvu</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="col-6 col-xl-2 text-right">
                <div class="d-none d-xl-inline-block">
                    <ul class="site-menu js-clone-nav ml-auto list-unstyled d-flex text-right mb-0" data-class="social">
                        <li>
                            <a href="https://www.facebook.com/UKFvNitre/" class="pl-3 pr-3 text-black"
                               target="_blank"><span class="icon-facebook"></span></a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/ukfvnitre/?hl=sk" class="pl-3 pr-3 text-black"
                               target="_blank"><span class="icon-instagram"></span></a>
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
