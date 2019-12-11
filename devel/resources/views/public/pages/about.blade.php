@extends('public.layouts.default')
@section('content')
    <div class="site-section bg-light">
        <h1 class="text-primary"><center>Univerzita Konštantína Filozofa v Nitre</center></h1>
        <div class="container bg-white pb-3 border shadow">
                <br class="p-4 mb-3 bg-white">
                    <div class="slide-one-item home-slider owl-carousel">
                    <div class="site-blocks-cover overlay" style="background-image: url({{ asset('public/dist/images/ukf1.jpg') }});" data-aos="fade" data-stellar-background-ratio="0.5">
                    </div>
                    <div class="site-blocks-cover overlay" style="background-image: url({{ asset('public/dist/images/ukf2.jpg') }});" data-aos="fade" data-stellar-background-ratio="0.5">
                    </div>
                        <div class="site-blocks-cover overlay" style="background-image: url({{ asset('public/dist/images/ukf3.jpg') }});" data-aos="fade" data-stellar-background-ratio="0.5">
                        </div>
                    </div>
                </br>
            <div style="text-align: justify;">
                    <h3>O univerzite</h3>
                    <p class="mb-4">Univerzita Konštantína Filozofa v Nitre (UKF) je modernou vzdelávacou, vedeckou a umeleckou inštitúciou, ktorá nesie
                        meno významnej osobnosti v histórii Nitry i Slovenska – Konštantína Filozofa (svätého Cyrila, 827 – 869). Jej poslaním je
                        rozvíjať harmonickú osobnosť, vedomosti, múdrosť, dobro a tvorivosť v človeku a prispievať k rozvoju vzdelanosti,
                        vedy, kultúry a zdravia, a teda k rozvoju vedomostnej spoločnosti. Hlavnou úlohou UKF pri napĺňaní jej poslania je poskytovanie
                        vysokoškolského vzdelávania a tvorivé vedecké bádanie alebo tvorivá umelecká činnosť</p>
                    <p class="mb-4">UKF je šiestou najväčšou univerzitou na Slovensku, na ktorej študuje na piatich fakultách 7143 študentov,
                        z toho 5637 v dennej forme. Každoročne láka aj zahraničných študentov. Aktuálne ide o 235 študentov z 24 krajín sveta
                        (údaje k 31. októbru 2018).</p>
                    <p class="mb-4">Na univerzite pracuje 935 zamestnancov. Učitelia a výskumníci sú v počte 564, z toho je 78 profesorov a
                        146 docentov (údaje k 31. augustu 2019).</p>
                    <p class="mb-4">Silnou stránkou univerzity je rozsiahla ponuka študijných programov v bakalárskom, magisterskom a doktorandskom štúdiu.
                        Konkrétne ide o 6 akreditovaných jednopredmetových a 29 dvojpredmetových učiteľských študijných programov, 68 bakalárskych a
                        49 magisterských študijných programov a 37 vedeckých doktorandských študijných programov (údaje k 31. augustu 2019).
                        Univerzita organizuje aj celoživotné vzdelávanie, a to predovšetkým ako doplňujúce pedagogické štúdium, rozširujúce štúdium a
                        záujmové štúdium univerzity tretieho veku.</p>
                    <p class="mb-4">Jednou z hlavných činností univerzity je výskum. Je zameraný na získavanie pôvodných výsledkov smerujúcich k
                        rozvoju poznania a zahŕňa aj aktivity zamerané na efektívne prepojenie vedeckého bádania so vzdelávacím procesom a
                        na podporu odborného rastu zamestnancov. Vedeckovýskumná činnosť sa uskutočňuje predovšetkým prostredníctvom riešenia výskumných,
                        kultúrno-edukačných a ďalších projektov, pričom nosným výstupom sú vedecké a odborné publikácie. Univerzita každoročne organizuje
                        významné vedecké, umelecké a odborné podujatia, prostredníctvom ktorých sa realizuje prezentácia, propagácia a prenos poznatkov a
                        dosiahnutých výsledkov z riešenia vedeckovýskumných projektov.</p>
                    <p class="mb-4">UKF sa zameriava aj na prácu so študentmi a je známa prípravou kultúrno-spoločenských a športových
                        podujatí a aktivít pre študentov, z ktorých mnohé majú dlhú tradíciu. Vydáva univerzitný časopis Náš Čas a
                        študentský časopis s názvom Občas nečas.</p>
            </div>
                </div>
        </div>
    </div>
@endsection
