@extends('public.layouts.default')

@section('content')
<div class="site-section bg-light">
    <div class="container p-4 bg-white border shadow">
        <div class="row">
                <div class="col-md-7">
                    <h4>Prihlásenie študenta do systému</h4>
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
    </div>
</div>
@endsection
