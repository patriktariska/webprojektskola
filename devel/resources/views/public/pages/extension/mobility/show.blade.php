@extends('public.layouts.default')
@section('content')

    <style>
        .container-fluid{margin-right:auto;margin-left:auto;padding-left:15px;padding-right:15px}
        .main{width:100%;height:600px;background-position:50%;background-size:cover;position:relative;display:table}
        section .main .centered{vertical-align:middle;display:table-cell;text-align:center}
        section .main header{padding:30px 50px;background-color:#ef6c57;background:linear-gradient(135deg,transparent 10px,#ef6c57 0) 0 0,linear-gradient(225deg,transparent 10px,#ef6c57 0) 100% 0,linear-gradient(315deg,transparent 10px,#ef6c57 0) 100% 100%,linear-gradient(45deg,transparent 10px,#ef6c57 0) 0 100%;background-size:51% 51%;background-repeat:no-repeat;opacity:.9;display:inline-block;position:relative}
        section .main header h1{color:#fff;text-align:center;font-size:26px;margin:0 0 3px;line-height:34px;letter-spacing:-.01em}@media (max-width:600px){section .main header h1{font-size:23px;line-height:23px}}
        section .main header p{color:#fff;text-align:center;font-size:14px;margin:0 0 5px;line-height:16px;letter-spacing:-.01em}
        section .main header:before{width:14px;height:27px;position:absolute;right:-14px;top:0;bottom:0;margin:auto;content:"";border-top:14px solid transparent;border-left:14px solid #ef6c57;border-bottom:14px solid transparent}
        section .main.detail header{padding:40px 60px;width:450px}
        section .main.detail .centered{padding-bottom:75px}
        section .detail-page .navigation{position:relative;margin-top:0}
        section .detail-page .navigation .box{transition:top .2s ease 0s;width:215px;position:static;top:115px}
        section .detail-page .navigation .box>div{float:left}
        section .detail-page .navigation ul{width:100%;float:left;list-style:none}
        section .detail-page .navigation ul li{background-color:#f6f6f6;text-align:left;color:#434343;font-size:14px;line-height:22px;float:left;width:100%;border:1px solid #eaeaea;border-bottom:none;list-style:none;transition:all .3s ease 0s}
        section .detail-page .navigation ul li a{width:100%;text-decoration:none;padding:12px 25px;color:#434343;float:left;transition:all .3s ease 0s}
        section .detail-page .navigation ul li a:hover, section .detail-page .navigation ul li a:active{color:#fff;background: #ef6c57}
        section .detail-page .navigation ul li:last-of-type{border-bottom:1px solid #eaeaea}
        @media (max-width:1199px){section .detail-page .navigation .box{top:95px}}
    </style>

    <section>

        <div class="container-fluid main detail " style="background-image: url('http://edu.uhk.cz/mobility/wp-content/uploads/2016/10/kazach_siberia-63182-1920x1176.jpg')">
            <div class="centered">
                <header>
                    <div>
                        <h1>
                            {!! $getChallenge->name !!}
                        </h1>
                        <p>
                            {!! $getChallenge->type !!}
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
                        <li><a class="active" href="#info" data-toggle="tab">Základné informácie</a></li>
                        <li><a href="#universities"  data-toggle="tab">Partnerské univerzity</a></li>
                        <li><a href="#conditions"  data-toggle="tab">Podmienky vycestovania</a></li>
                        <li><a href="#before_travel"  data-toggle="tab">Čo zariadiť pred výjazdom</a></li>
                        <li><a href="#after_travel"  data-toggle="tab">Čo odovzdať po návrate</a></li>
                        <li><a href="#messages"  data-toggle="tab">Správy účastníkov</a>
                        <li><a href="#photogallery"  data-toggle="tab">Fotogaléria</a></li>
                    </ul>
                    </div>
                </div>
            </div>

            <div class="tab-content col-lg-9 col-sm-6 col-xs-12 pageContent">

                <div class="tab-pane well active in active p-5 bg-light" id="info">
                    <h3>Základné informácie</h3>
                    <p>
                        Univerzita UKF v Nitre stále rozširuje počet partnerských univerzít v zahraničí.
                    </p>
                    <p>
                        {!! $getChallenge->description !!}
                    </p>
                </div>

                <div class="tab-pane well fade box p-5 bg-light" id="universities">
                    <h3>Partnerské univerzity</h3>
                    <table style="width:100%;">
                        <tbody>
                        <tr>
                            <th>Univerzita</th>
                            <th>Mesto</th>
                            <th>Kontaktná osoba</th>
                        </tr>
                        <tr>
                            <td><a href="http://www.kstu.kz/?lang=en">Karaganda State Technical University</a></td>
                            <td>Karaganda</td>
                            <td>Anastassiya Yudintseva</td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <div class="tab-pane well fade p-5 bg-light" id="conditions">
                    <h3>Podmienky vycestovania</h3>
                    <p>Študent musí mať absolvovaný minimálne prvý ročník štúdia na UKF, tzn. musí byť v dobe výjazdu zapísaný do vyššieho ročníka ako je prvý. Výnimkou sú študenti prvého ročníka nadvezujúceho magisterského štúdia, ktorí absolvovali bakalarské štúdium na UKF.&nbsp;</p>
                    <p>Výber studentů bude proveden na úvodní schůzce na základě indexu, který odráží počet kreditů získaných v&nbsp;jednotlivých letech studia na FIM UHK a průměrný prospěch (údaje v systému STAG k&nbsp;31. 8. 2016). Aby bylo možné obě kvantitativní charakteristiky sloučit, index je dán počtem získaných kreditů lomeno průměrný prospěch, a to zprůměrováno přes jednotlivé roky studia.</p>
                    <p>Vyjádřeno formálně</p>
                    <p><img class="aligncenter" title="index_143" src="http://fim.uhk.cz/mobility2/data/images/text/index_143.jpg" alt="index_143" width="143" height="74"></p>
                    <p>kde Ki&nbsp;je počet kreditů získaných v&nbsp;i-tém roce, Pi&nbsp;je průměrný prospěch v&nbsp;i-tém roce a n je počet ukončených roků studia. Na základě takto vypočteného indexu bude vytvořeno pořadí, které bude rozhodující pro udělení stipendií.</p>
                    <p>Po celé období studijního pobytu v zahraničí musí být student řádně zapsán ke studiu na vysílající instituci, nemůže tedy ukončit studium před ukončením studijního pobytu v zahraničí.</p>
                </div>

                <div class="tab-pane well fade p-5 bg-light" id="before_travel">
                    <h3>Čo zariadiť pred výjazdom</h3>
                    <p>Odevzdat přihlášku ke studiu na zahraniční univerzitě na zahr. oddělení FIM.</p>
                    <p>Očkování – Fakultní nemocnice, Centrum očkování a cestovní medicíny.</p>
                    <p>Cestovní pojištění na celou dobu pobytu. Musí být v souladu se <a href="http://fim.uhk.cz/mobility2/data/doc/erasmus/student/stahuj/smernice2_2013.pdf">směrnicí kvestora č. 2/2013</a>.</p>
                    <p>Vízum.</p>
                    <p>Zakoupit letenku. </p>
                    <p>Podepsat finanční dohodu, ve které jsou specifikovány podmínky stáže a udělení stipendia.</p>
                </div>

                <div class="tab-pane well fade p-5 bg-light" id="after_travel">
                    <h3>Čo odovzdať po návrate</h3>
                    <p>1) Dokument potvrzující období studia v zahraničí</p>
                    <p> 2) Výpis výsledků studia (úspěšné splnění min. 3 předmětů)</p>
                    <p> 3) Závěrečná zpráva ze studijiního pobytu (osnovu lze stáhnout <a href="http://fim.uhk.cz/mobility2/data/doc/taiwan/osnova.doc">zde</a>)</p>
                </div>

                <div class="tab-pane well fade p-5 bg-light" id="messages">
                    <h3>Správy účastníkov</h3>
                    <p>Zprávy účastníků studijních pobytů v Kazachstánu najdete <a href="{{ url('feed') }}">TU</a>.</p>
                </div>

                <div class="tab-pane well fade p-5 bg-light" id="photogallery">
                    <h3>Fotogaléria</h3>
                    <div class="content gallery">
                        <a href="http://edu.uhk.cz/mobility/wp-content/uploads/2016/10/slider1-1024x480.jpg" title="" class="fancybox" rel="group1">
                            <img src="http://edu.uhk.cz/mobility/wp-content/uploads/2016/10/slider1-197x160.jpg" alt="" width="197" height="160">
                        </a>
                        <a href="http://edu.uhk.cz/mobility/wp-content/uploads/2016/10/almaty_kazakhstan-1531176-1024x576.jpg" title="" class="fancybox" rel="group1">
                            <img src="http://edu.uhk.cz/mobility/wp-content/uploads/2016/10/almaty_kazakhstan-1531176-197x160.jpg" alt="" width="197" height="160">
                        </a>
                        <a href="http://edu.uhk.cz/mobility/wp-content/uploads/2016/10/kazach_shymkent-1253636-1024x768.jpg" title="" class="fancybox" rel="group1">
                            <img src="http://edu.uhk.cz/mobility/wp-content/uploads/2016/10/kazach_shymkent-1253636-197x160.jpg" alt="" width="197" height="160">
                        </a>
                    </div>
                </div>

            </div> <!-- tab-content col-lg-9 col-sm-6 col-xs-12 pageContent -->
        </div><!-- row mainRow -->
        </div><!-- container detail-page -->

    </section>

@endsection
