@extends('public.layouts.default')
@section('content')
    <div class="site-section bg-light">
        <div class="container">
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

            {{ Form::open(['route' => 'send.feedback', 'files' => 'true', 'method' => 'POST', 'class'=>'form']) }}
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-7">
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
                                <label class="text-black" for="program">Názov programu:</label>
                                <input type="text" id="program" name="program" class="form-control">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="text-black" for="message">Správa:</label>
                                <textarea name="message" id="message" name="message" cols="30" rows="7"
                                          class="form-control"
                                          placeholder="Podel sa o žažitky."></textarea>
                            </div>
                        </div>
                </div>
                <div class="col-md-5">
                    <div class="p-4 mb-3 bg-white">
                        <h6>Zaznamenal / a si svoj zážitok v podobe fotky ? Pošli nám ju a mi ju pridáme ku tvojmu feedbacku</h6>
                        <input type="file" name="myFile" class="form-control">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="text-black" for="subject">Hodnotenie:</label>
                                <select class="form-control" name="rate">
                                    <option value="Odporúčam">Odporúčam</option>
                                    <option value="Neodporúčam">Neodporúčam</option>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <input type="submit" value="Odošli hodnotenie" class="btn btn-primary py-2 px-4 text-white">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection