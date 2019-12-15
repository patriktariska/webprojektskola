@extends('public.layouts.default')
@section('content')

    <style>
        .container-fluid {
            margin-right: auto;
            margin-left: auto;
            padding-left: 15px;
            padding-right: 15px
        }

        .main {
            width: 100%;
            height: 600px;
            background-position: 50%;
            background-size: cover;
            position: relative;
            display: table
        }

        section .main .centered {
            vertical-align: middle;
            display: table-cell;
            text-align: center
        }

        section .main header {
            padding: 30px 50px;
            background-color: #ef6c57;
            background: linear-gradient(135deg, transparent 10px, #ef6c57 0) 0 0, linear-gradient(225deg, transparent 10px, #ef6c57 0) 100% 0, linear-gradient(315deg, transparent 10px, #ef6c57 0) 100% 100%, linear-gradient(45deg, transparent 10px, #ef6c57 0) 0 100%;
            background-size: 51% 51%;
            background-repeat: no-repeat;
            opacity: .9;
            display: inline-block;
            position: relative
        }

        section .main header h1 {
            color: #fff;
            text-align: center;
            font-size: 26px;
            margin: 0 0 3px;
            line-height: 34px;
            letter-spacing: -.01em
        }

        @media (max-width: 600px) {
            section .main header h1 {
                font-size: 23px;
                line-height: 23px
            }
        }

        section .main header p {
            color: #fff;
            text-align: center;
            font-size: 14px;
            margin: 0 0 5px;
            line-height: 16px;
            letter-spacing: -.01em
        }

        section .main header:before {
            width: 14px;
            height: 27px;
            position: absolute;
            right: -14px;
            top: 0;
            bottom: 0;
            margin: auto;
            content: "";
            border-top: 14px solid transparent;
            border-left: 14px solid #ef6c57;
            border-bottom: 14px solid transparent
        }

        section .main.detail header {
            padding: 40px 60px;
            width: 450px
        }

        section .main.detail .centered {
            padding-bottom: 75px
        }

        section .detail-page .navigation {
            position: relative;
            margin-top: 0
        }

        section .detail-page .navigation .box {
            transition: top .2s ease 0s;
            width: 215px;
            position: static;
            top: 115px
        }

        section .detail-page .navigation .box > div {
            float: left
        }

        section .detail-page .navigation ul {
            width: 100%;
            float: left;
            list-style: none
        }

        section .detail-page .navigation ul li {
            background-color: #f6f6f6;
            text-align: left;
            color: #434343;
            font-size: 14px;
            line-height: 22px;
            float: left;
            width: 100%;
            border: 1px solid #eaeaea;
            border-bottom: none;
            list-style: none;
            transition: all .3s ease 0s
        }

        section .detail-page .navigation ul li a {
            width: 100%;
            text-decoration: none;
            padding: 12px 25px;
            color: #434343;
            float: left;
            transition: all .3s ease 0s
        }

        section .detail-page .navigation ul li a:hover, section .detail-page .navigation ul li a:active {
            color: #fff;
            background: #ef6c57
        }

        section .detail-page .navigation ul li:last-of-type {
            border-bottom: 1px solid #eaeaea
        }

        @media (max-width: 1199px) {
            section .detail-page .navigation .box {
                top: 95px
            }
        }
    </style>

    <section>

        <div class="container-fluid main detail "
             style="background-image: url('{{ asset('admin/mobility') }}/{{ $getChallenge->title_photo }}')">
            <div class="centered">
                <header>
                    <div>
                        <h1>
                            {!! $getChallenge->name !!}
                        </h1>
                        <p>
                            {!! $getChallenge->mobility->type !!}
                        </p>
                    </div>
                </header>
            </div>
        </div>
        <div class="container detail-page" style="margin-top: 3%;margin-bottom: 3%;">
            <div class="row mainRow">

                <!-- Nav tabs -->
                <div class="col-lg-3 col-sm-6 col-xs-12 navigation" style="top: auto;">
                    <div class="box">
                        <div>
                            <ul class="nav tab-menu nav-pills nav-stacked pr15">
                                <li><a href="#info" data-toggle="tab"><strong>Základné informácie</strong></a></li>
                                <li><a href="#universities" data-toggle="tab"><strong>Partnerské univerzity</strong></a></li>
                                <li><a href="#conditions" data-toggle="tab"><strong>Podmienky vycestovania</strong></a></li>
                                <li><a href="#before_travel" data-toggle="tab"><strong>Čo zariadiť pred výjazdom</strong></a></li>
                                <li><a href="#after_travel" data-toggle="tab"><strong>Čo odovzdať po návrate</strong></a></li>
                                <li><a href="#messages" data-toggle="tab"><strong>Správy účastníkov</strong></a>
                                <li><a href="#photogallery" data-toggle="tab"><strong>Fotogaléria</strong></a></li>
                                <li>
                                @if(auth()->check())
                                    {{ Form::open(['route' => 'interest.challenges',  'method' => 'POST', 'class'=>'form']) }}
                                    {{ csrf_field() }}
                                    <input type="hidden" value="{{ $getChallenge->id }}" name="getID">
                                    <button type="submit" style="width: 100%; border-radius: 7px;" class="btn btn-primary">Mám záujem o výzvu</button>
                                    {{ Form::close() }}
                                @endif
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="tab-content col-lg-9 col-sm-6 col-xs-12 pageContent">
                    @if ($message = Session::get('success'))
                        <div class="panel-body">
                            <div class="alert alert-dismissible callout callout-success">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
                                </button>
                                <h4>Výborne.</h4>
                                {{ $message }}
                            </div>
                        </div>
                    @endif
                    <div class="tab-pane well active in active p-5 bg-light" id="info" style="text-align: justify;">
                        <h3>Základné informácie</h3>
                        <p>
                            {!! $getChallenge->description !!}
                        </p>
                        <p>
                            <h6>Prihlasovať sa môžete do <strong>{{ date('d.m.Y', strtotime($getChallenge->end)) }}</strong>.</h6>
                        </p>
                    </div>

                    <div class="tab-pane well fade box p-5" id="universities">
                        <h3>Partnerské univerzity</h3>
                        <table style="width:100%;" class="table table-striped table-bordered border shadow">
                            <tbody>
                            <tr>
                                <th>Univerzita</th>
                                <th>Mesto</th>
                                <th>Krajina</th>
                                <th>Kontakt</th>
                            </tr>
                            @foreach($getChallenge->school as $Skola)
                                <tr>
                                    <td><a href="{{ $Skola->url }}" target="_blank">{{ $Skola->name }}</a></td>
                                    <td>{{ $Skola->city_id }}</td>
                                    <td>{{ $Skola->city_id }}</td>
                                    <td>{{ $Skola->email }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="tab-pane well fade p-5 bg-light" id="conditions" style="text-align: justify;">
                        <h3>Podmienky vycestovania</h3>
                        <p>Študent musí mať absolvovaný minimálne prvý ročník štúdia na UKF, tzn. musí byť v dobe
                            výjazdu zapísaný do vyššieho ročníka ako je prvý. Výnimkou sú študenti prvého ročníka
                            nadvezujúceho magisterského štúdia, ktorí absolvovali bakalarské štúdium na UKF.&nbsp;</p>
                        <p>Výber študentov sa uskutoční na úvodnej schôdzke na základe indexu, ktorý odráža počet kreditov
                            získaných v&nbsp;jednotlivých rokoch štúdia na UKF a priemerný prospech. Aby bolo možné obe kvantitatívne charakteristiky zlúčiť, index je
                            daný počtom získaných kreditov lomeno priemerný prospech, a to zpriemerované cez jednotlivé
                            roky študia.</p>
                        <p>Po celé obdobie študijiného pobytu v zahraničí musí byť študent riadne zapísaný ku štúdiu na
                            poslanú inštitúciu, nemôže teda ukončiť štúdium pred ukončením študijiného pobytu v zahraničí.</p>
                    </div>

                    <div class="tab-pane well fade p-5 bg-light" id="before_travel">
                        <h3>Čo zariadiť pred výjazdom</h3>
                        <p>1) Odovzdať prihlášku ku štúdiu na zahraničnú univerzitu na oddelení UKF.</p>
                        <p>2) Očkovanie ak je potrebné, alebo poradanstvo ohľadom možných chôrob a užívania liekov.</p>
                        <p>3) Cestovné poistenie na celú dobu pobytu.</p>
                        <p>4) Vízum ak je to potrebné.</p>
                        <p>5) Zakúpiť letenku alebo iný cestostovný doklad.</p>
                        <p>6) Podpísať finančnú dohodu, v kterej sú špecifikované podmienky stáže a udelenie štipendia.</p>
                    </div>

                    <div class="tab-pane well fade p-5 bg-light" id="after_travel">
                        <h3>Čo odovzdať po návrate</h3>
                        <p>1) Dokument potvrdzujúci obdobie štúdia v zahraničí</p>
                        <p>2) Výpis výsledkov štúdia (úspešné splnenie predmetov)</p>
                        <p>3) Napísať odozvu zo študijiného pobytu - <a href="{{ url('feed') }}"><strong>TU</strong></a></p>
                    </div>

                    <div class="tab-pane well fade p-5" id="messages">
                        <h3>Správy účastníkov</h3>

                        @if (!$getFeedback->isEmpty())
                            <div class="nonloop-block-13 p-5 owl-carousel border shadow bg-light">
                                @foreach ($getFeedback as $Feedback)
                                    <div class="item">
                                                <div class="col-lg-12 p-md-3 align-self-center" style="background:white;text-align: justify;">
                                                    <p class="text-black"><strong><em>"{{ $Feedback->comment }}"</em></strong></p>
                                                    <p><em>{{ date('d.m.Y', strtotime($Feedback->created_at)) }}</em>,
                                                        <a href="mailto:{{ $Feedback->student->email }}">{{ $Feedback->student->name }} {{ $Feedback->student->lname }}</a><br>
                                                        <strong>{{ $Feedback->rate }}</strong>
                                                    </p>
                                                </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p><h5 class="d-flex justify-content-center">Túto výzvu zatiaľ nikto neohodnotil.</h5></p>
                        @endif

                    </div>

                    <div class="tab-pane well fade p-5" id="photogallery">
                        <h3>Fotogaléria</h3>
                        <div class="content gallery">

                            <a class="example-image-link" href="{{ asset('admin/mobility') }}/{{ $getChallenge->title_photo }}" data-lightbox="example-set" data-title="{!! $getChallenge->name !!}">
                                <img src="{{ asset('admin/mobility') }}/{{ $getChallenge->title_photo }}" width="200" height="200" class="example-image border shadow">
                            </a>

                            @foreach($getFeedback as $Feedback)
                                <a class="example-image-link" href="{{ asset('feedback/')}}/{{ $Feedback->photo }}" data-lightbox="example-set" data-title="{!! $getChallenge->name !!}">
                                    <img src="{{ asset('feedback/')}}/{{ $Feedback->photo }}" width="200" height="200" class="example-image border shadow">
                                </a>
                            @endforeach

                        </div>
                    </div>

                </div> <!-- tab-content col-lg-9 col-sm-6 col-xs-12 pageContent -->
            </div><!-- row mainRow -->
        </div><!-- container detail-page -->

    </section>

@endsection
