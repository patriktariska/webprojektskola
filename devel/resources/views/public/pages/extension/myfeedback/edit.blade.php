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
                {{ Form::open(['route' => ['myfeedback.update'], 'method' => 'POST', 'class'=>'form']) }}
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-7 bg-white p-4 mb-3 border shadow">
                        <div class="row form-group">
                            <div class="col-md-12">
                                <input type="hidden" value="{{ $myfeed->id }}" name="id" id="id">
                                <label class="text-black" for="email">Email:</label>
                                <input type="email" id="email" name="email" class="form-control"
                                       value="{{ Auth::user()->email }}" disabled>
                            </div>
                        </div>
                        <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}">
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="text-black" for="comment">Správa:</label>
                                <textarea id="comment" name="comment" cols="30" rows="7"
                                          class="form-control"
                                          placeholder="Podel sa o žažitky.">{{ $myfeed->comment }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="p-4 mb-3 bg-white border shadow">
                            <div class="row form-group">
                                <div class="col-md-12">
                                    <label class="text-black" for="subject">Hodnotenie:</label>
                                    {!! Form::select('rate', array('Odporúčam' => 'Odporúčam', 'Neodporúčam' => 'Neodporúčam'), ['value'=>$myfeed->rate],['class' => 'form-control']); !!}
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
                <div class="row">
                    <div class="col-md-7">
                        <h4>Pre pridanie feedbacku sa musiš prihlásiť</h4>
                    </div>
                    <div class="col-md-5">
                        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-12">
                                    <input id="email" type="email" class="form-control" name="email"
                                           value="{{ old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Password</label>

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
                                            <input type="checkbox"
                                                   name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                        </label>
                                        <button type="submit" class="btn btn-primary float-right">
                                            Login
                                        </button>
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