@extends('public.layouts.default')
@section('content')
    <div class="slide-one-item home-slider owl-carousel">
        <div class="site-blocks-cover overlay" style="background-image: url({{ asset('public/dist/images/erasmus.jpg') }});" data-aos="fade" data-stellar-background-ratio="0.5">
            <div class="container">
                <div class="row align-items-center justify-content-center text-center">
                    <div class="col-md-8" data-aos="fade-up" data-aos-delay="400">
                        <h1 class="text-white font-weight-light">Študijný pobyt</h1>
                        <p class="mb-5">Student Mobility for Studies</p>
                        <p><a href="#" class="btn btn-primary py-3 px-5 text-white">Zisti viac!</a></p>

                    </div>
                </div>
            </div>
        </div>
        <div class="site-blocks-cover overlay" style="background-image: url({{ asset('public/dist/images/staz.jpeg') }});" data-aos="fade" data-stellar-background-ratio="0.5">
            <div class="container">
                <div class="row align-items-center justify-content-center text-center">

                    <div class="col-md-8" data-aos="fade-up" data-aos-delay="400">
                        <h1 class="text-white font-weight-light">Stáž</h1>
                        <p class="mb-5">Student Mobility for Traineeships</p>
                        <p><a href="#" class="btn btn-primary py-3 px-5 text-white">Zisti viac!</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="site-blocks-cover overlay" style="background-image: url({{ asset('public/dist/images/prednaska.jpg') }});" data-aos="fade" data-stellar-background-ratio="0.5">
            <div class="container">
                <div class="row align-items-center justify-content-center text-center">

                    <div class="col-md-8" data-aos="fade-up" data-aos-delay="400">
                        <h1 class="text-white font-weight-light">Prednáškový pobyt</h1>
                        <p class="mb-5">Teaching Mobility</p>
                        <p><a href="#" class="btn btn-primary py-3 px-5 text-white">Zisti viac!</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="site-blocks-cover overlay" style="background-image: url({{ asset('public/dist/images/skolenie.jpg') }});" data-aos="fade" data-stellar-background-ratio="0.5">
            <div class="container">
                <div class="row align-items-center justify-content-center text-center">
                    <div class="col-md-8" data-aos="fade-up" data-aos-delay="400">
                        <h1 class="text-white font-weight-light">Školenie</h1>
                        <p class="mb-5">Staff Training Mobility</p>
                        <p><a href="#" class="btn btn-primary py-3 px-5 text-white">Zisti viac!</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container overlap-section">
            <div class="row">
                @foreach($newChallenges as $challenge)
                <div class="col-md-6 col-lg-4 mb-4 pb-4 mb-lg-0">
                    <div class="container border pt-3 pb-3" style="border-radius: 20px">
                        <img src="{{ asset('admin/mobility') }}/{{ $challenge->title_photo }}" alt="Image" class="img-fluid rounded">
                        <div class="text-left pt-3" style="line-height: 10px">
                            <p style="font-size: 22px">{{ $challenge->name }}</p>
                            <p>Typ: {{ $challenge->type }}</p>
                            <p>Prihlášky do: {{ date_format(new DateTime($challenge->end),"d. m. Y") }}</p>
                            <a class="btn btn-primary" href="{{ route('public.mobility.show',$challenge->id) }}" role="button" style="border-radius: 2px;">Detail výzvy</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-7 text-center">
                    <h2 class="font-weight-light text-black">Krajiny pobytu</h2>
                    <p class="color-black-opacity-5">Vyber si svoju vysnívanú krajinu!</p>
                </div>
            </div>
            <div class="row">
                @foreach($challenges as $challenge)
                    <div class="col-md-6 col-lg-4 mb-4 pb-4 mb-lg-0">
                        <div class="container border pt-3 pb-3" style="border-radius: 20px">
                            <img src="{{ asset('admin/mobility') }}/{{ $challenge->title_photo }}" alt="Image" class="img-fluid rounded">
                            <div class="text-left pt-3" style="line-height: 10px">
                                <p style="font-size: 22px">{{ $challenge->name }}</p>
                                <p>Typ: {{ $challenge->type }}</p>
                                <p>Prihlášky do: {{ date_format(new DateTime($challenge->end),"d. m. Y") }}</p>
                                <a class="btn btn-primary" href="{{ route('public.mobility.show',$challenge->id) }}" role="button" style="border-radius: 2px;">Detail výzvy</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- <div class="site-section bg-light">
    </div> -->
    <div class="site-blocks-cover overlay inner-page-cover" style="background-image: url({{ asset('public/dist/images/cesko.jpg') }}); background-attachment: fixed;">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">

                <div class="col-md-7" data-aos="fade-up" data-aos-delay="400">
                    <a href="https://www.youtube.com/watch?v=mucLl6Btdyk" class="play-single-big mb-4 d-inline-block popup-vimeo"><span class="icon-play"></span></a>
                    <h2 class="text-white font-weight-light mb-5 h1">Video účastníkov mobilít Erasmus+</h2>

                </div>
            </div>
        </div>
    </div>

    <div class="site-section bg-light">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-7 text-center">
                    <h2 class="font-weight-light text-black">Výhody ERASMUS+</h2>
                    <p class="color-black-opacity-5">Prečo ísť na Erasmus?</p>
                </div>
            </div>
            <div class="row align-items-stretch text-justify">
                <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
                    <div class="unit-4 d-flex">
                        <div class="unit-4-icon mr-4"><span class="text-primary fa fa-money"></span></div>
                        <div>
                            <h3>Financie</h3>
                            <p>Veľkou výhodou programov sú granty. Vystačí ti grant na uživenie sa počas celého semestra (v normálnom byte a so súcim sociálnym životom)? Nie.
                                Ale zaplatí to cestovné náklady a náklady na bývanie. Ak chceš vedieť viac informácií o grantoch, ich výške a ako sa udeľujú, pozri sa na webstránky
                                <a href="https://www.erasmusplus.sk/">Erasmus+</a> a <a href="https://ceepus.saia.sk/">CEEPUS</a> alebo na <a href="https://ukf.sk/">webstránku</a> tvojej školy, ktorá v sekcii Medzinárodných vzťahov určite bude mať záložku o Erasme.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
                    <div class="unit-4 d-flex">
                        <div class="unit-4-icon mr-4"><span class="text-primary fa fa-plane"></span></div>
                        <div>
                            <h3>Cestovanie</h3>
                            <p>Toto je asi jednoznačné. Môžeš cestovať! A pomerne veľa! Okrem toho, že budeš môcť neznámu krajinu volať domovom a preskúmavať
                                ju s domácimi, takmer na každej škole zapojenej do programu funguje ESN (Erasmus Student Network). ESN organizuje kopec výletov,
                                spoznávacích zájazdov, stretnutí s ostatnými erasmákmi a rozličné párty.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
                    <div class="unit-4 d-flex">
                        <div class="unit-4-icon mr-4"><span class="text-primary fa fa-graduation-cap"></span></div>
                        <div>
                            <h3>Škola</h3>
                            <p>Napriek tomu, že budeš v zahraničí na dlhšiu dobu, nemusíš prerušiť štúdium a prichádzať tak o vzácny čas a peniaze.
                                Stačí, ak si na zahraničnej univerzite nájdeš predmety, ktorých obsah bude korešpondovať aspoň sčasti s obsahom
                                predmetov, ktoré sa v tom čase budú vyučovať u vás doma.</p>
                        </div>
                    </div>
                </div>


                <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
                    <div class="unit-4 d-flex">
                        <div class="unit-4-icon mr-4"><span class="text-primary fa fa-users"></span></div>
                        <div>
                            <h3>Nové Priateľstvá</h3>
                            <p>Cudzie prostredie je pre vás všetkých spoločná novinka a tak sa džungľou neznáma boríte spolu. Bývate spolu,
                                pijete spolu, jedávate spolu, učíte sa pozdraviť (a nadávať) v pomaly každom európskom jazyku, cestujete spolu
                                (odporúčam prenajímať si auto a určite využite Airbnb) a skrze to všetko budujete vzťahy aké nikdy predtým ani
                                potom nezažijete. Naozaj sa netreba ľudí báť, priateľov si nájdeš, len sa netreba báť urobiť prvý krok
                                a povedať Hey!</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
                    <div class="unit-4 d-flex">
                        <div class="unit-4-icon mr-4"><span class="text-primary fa fa-institution"></span></div>
                        <div>
                            <h3>Nová Kultúra</h3>
                            <p>Áno, na dovolenkách si už skúsil všeličo, ale nič nikdy nenahradí dlhodobý pobyt v cudzej krajine, kde sa staneš na chvíľu domácim.
                                Nová kuchyňa, nový jazyk, úplne nová mentalita ľudí, to všetko môže znieť odstrašujúco, no v skutočnosti je to nádherná škola
                                života, a je to zaiste najlepší spôsob spoznávania krajiny.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
                    <div class="unit-4 d-flex">
                        <div class="unit-4-icon mr-4"><span class="text-primary fa fa-language"></span></div>
                        <div>
                            <h3>Cudzí Jazyk</h3>
                            <p>Keď si nútený/á komunikovať v cudzom jazyku, tak je prirodzené, že sa v ňom aj zlepšíš.
                                &Koľko jazykov predsa vieš, toľkokrát si človekom!</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <div class="site-section block-13 bg-light">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-7">
                    <h2 class="font-weight-light text-black text-center">Feedback Študentov</h2>
                </div>
            </div>
            @if (!$feedback->isEmpty())
                <div class="nonloop-block-13 owl-carousel">
                    @foreach ($feedback as $Feedback)
                        <div class="item">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-6 mb-5">
                                        <img src="{{ asset('feedback/')}}/{{ $Feedback->photo }}" alt="Image"
                                             class="img-md-fluid">
                                    </div>
                                    <div class="overlap-left col-lg-6 bg-white p-md-5 align-self-center">
                                        <h4>Hello</h4>
                                        <p class="text-black lead">"{{ $Feedback->comment }}"</p>
                                        <p class=""><em>{{ date('d.m.Y', strtotime($Feedback->created_at)) }}</em>, <a
                                                    href="mailto:{{ $Feedback->student->email }}">{{ $Feedback->student->fname }} {{ $Feedback->student->lname }}</a>
                                        </p>
                                        <p>{{ $Feedback->rate }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <h5 class="d-flex justify-content-center">Momentálne sa nenachádza žiaden feedback študenta</h5>
            @endif
        </div>
    </div>

@endsection