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
            @if(auth()->check())
                {{ Form::open(['route' => 'send.feedback', 'files' => 'true', 'method' => 'POST', 'class'=>'form']) }}
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-7 bg-white border shadow p-4" >
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="text-black" for="email">Email:</label>
                                <input type="email" id="email" name="email" class="form-control" value="{{ Auth::user()->email }}" disabled>
                            </div>
                        </div>
                        <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}">
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="text-black" for="program">Názov programu:</label>
                                    <select class="form-control select2" name="challenge_id" id="challenge_id">
                                        @foreach($getChallenge as $challenge)
                                            @foreach($challenge->school as $school)
                                            <option value="{{ $challenge->id }}">{{ $challenge->name }}, {{ $school->name }}</option>
                                            @endforeach
                                        @endforeach
                                    </select>

                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="text-black" for="comment">Správa:</label>
                                <textarea id="comment" name="comment" cols="30" rows="7"
                                          class="form-control"
                                          placeholder="Podel sa o žažitky."></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="p-4 mb-3 bg-white border shadow">
                            <h6>Zaznamenal / a si svoj zážitok v podobe fotky ? Pošli nám ju a mi ju pridáme ku tvojmu
                                feedbacku</h6>
                            <input type="file" name="myFile" class="form-control" required>
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
                                    <input type="submit" value="Odošli hodnotenie"
                                           class="btn btn-primary py-2 px-4 text-white">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                {{ Form::close() }}
                @else
                    <div class="row p-4 bg-white border shadow">
                        <div class="col-md-7">
                            <h4>Pre pridanie odozvy sa musíš prihlásiť</h4>
                        </div>
                        <div class="col-md-5">
                            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                {{ csrf_field() }}
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="col-md-4 control-label">E-Mail adresa</label>

                                    <div class="col-md-12">
                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" class="col-md-4 control-label">Heslo</label>

                                    <div class="col-md-12">
                                        <input id="password" type="password" class="form-control" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12 col-md-offset-4">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Zapamätať
                                            </label>
                                            <button type="submit" class="btn btn-primary float-right">
                                                Prihlásiť
                                            </button>
                                            <div>
                                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                                    Zabudnuté heslo?
                                                </a>
                                                <a href="{{ route('register') }}" class="btn btn-link">Registrácia</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
            @endif
        </div>
    </div>
@endsection