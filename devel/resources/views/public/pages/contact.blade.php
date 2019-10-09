@extends('public.layouts.default')
@section('content')
    <div class="site-section bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-7 mb-5">
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
                    @if ($errors->any())
                        <div class="panel-body">
                            <div class="alert alert-dismissible callout callout-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
                                </button>
                                <h4>Chyba !</h4>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif

                    <form action="{{ url('contact') }}" method="POST" class="p-5 bg-white">
                        {{ csrf_field() }}
                        <div class="row form-group">
                            <div class="col-md-6 mb-3 mb-md-0">
                                <label class="text-black" for="fname">Meno:</label>
                                <input type="text" id="fname" name="fname" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label class="text-black" for="lname">Priezvisko:</label>
                                <input type="text" id="lname" name="lname" class="form-control">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="text-black" for="email">Email:</label>
                                <input type="email" id="email" name="email" class="form-control">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="text-black" for="subject">Subjekt:</label>
                                <input type="subject" id="subject" name="subject" class="form-control">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="text-black" for="message">Správa:</label>
                                <textarea name="message" id="message" name="message" cols="30" rows="7"
                                          class="form-control"
                                          placeholder="Otázka alebo dotaz ? Sem sním !"></textarea>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <input type="submit" value="Odošli správu" class="btn btn-primary py-2 px-4 text-white">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-5">
                    <div class="p-4 mb-3 bg-white">
                        <h4>Univerzita Konštantína Filozofa v Nitre</h4>
                        <img src="{{ asset('public/dist/images/img_contact.jpg') }}" alt="Image" class="img-fluid mb-4 rounded">
                        <p class="mb-0 font-weight-bold">Adresa</p>
                        <p class="mb-4">Tr. A. Hlinku 1, 949 74 Nitra</p>
                        <p class="mb-0 font-weight-bold">Telefón</p>
                        <p class="mb-3"><a href="#">+421 37 6408 111</a></p>
                        <p class="mb-0 font-weight-bold">Email</p>
                        <p class="mb-3"><a href="#">ukf@ukf.sk</a></p>
                        <p class="mb-0 font-weight-bold">IČO / DIČ</p>
                        <p class="mb-0">00157716 / 2021246590</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection