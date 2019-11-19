@extends('public.layouts.default')
@section('content')

<div class="bg-light">
    <div class="site-section container col-md-9 text-center" >
        <h1 class="font-weight-light text-black pb-5 ">Aktuálne výzvy</h1>
    

        <div class="container bg-light p-5 pb-1 bg-white">
            <div class="container content">
                <div class="row">
                    @foreach($getMobilities as $mobilita)
                    <div class="col-md-6 col-lg-4 mb-4 pb-4 mb-lg-0">
                        <div class="container border pt-3 pb-3" style="border-radius: 20px">
                        {{-- <a href="#" class="unit-1 text-left"> --}}
                            <img src="{{ asset('admin/mobility') }}/{{ $mobilita->title_photo }}" alt="Image" class="img-fluid rounded">
                            <div class="text-left pt-3" style="line-height: 10px">
                                <p style="font-size: 22px">{{ $mobilita->name }}</p>
                                <p>Typ: {{ $mobilita->type }}</p>
                                <p>Prihlášky do: {{ date_format(new DateTime($mobilita->end),"d. m. Y") }}</p>
                                <a class="btn btn-primary" href="#" role="button" style="border-radius: 2px;">Detail výzvy</a>
                            </div>
                        </div>
                        {{-- </a> --}}
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
