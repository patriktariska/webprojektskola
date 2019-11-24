@extends('public.layouts.default')
@section('content')


<style>
    .nadpis header{padding:30px 50px;background-color:#ef6c57;background:linear-gradient(135deg,transparent 10px,#ef6c57 0) 0 0,linear-gradient(225deg,transparent 10px,#ef6c57 0) 100% 0,linear-gradient(315deg,transparent 10px,#ef6c57 0) 100% 100%,linear-gradient(45deg,transparent 10px,#ef6c57 0) 0 100%;background-size:51% 51%;background-repeat:no-repeat;opacity:.9;display:inline-block;position:relative}
    .nadpis header h1{color:#fff;text-align:center;font-size:32px;margin:0 0 3px;line-height:34px;letter-spacing:-.01em}@media (max-width:600px){section .main header h1{font-size:23px;line-height:23px}}
    .nadpis header:before{width:15px;height:27px;position:absolute;right:-14px;top:0;bottom:0;margin:auto;content:"";border-top:14px solid transparent;border-left:14px solid #ef6c57;border-bottom:14px solid transparent}
        
</style>

<div class="bg-light">
    <div class="site-section container col-md-9 text-center" >
        {{-- <h1 class="font-weight-light text-black pb-5 ">Aktuálne výzvy</h1> --}}
        <div class="centered nadpis pb-5">
            <header >
                <div>
                    <h1>
                        Aktuálne výzvy
                    </h1>
                </div>
            </header>
        </div>
    

        <div class="container bg-light p-5 pb-1 bg-white">
            <div class="container content">
                <div class="row">
                    @foreach($getChallenges as $challenge)
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

    </div>
</div>

@endsection
