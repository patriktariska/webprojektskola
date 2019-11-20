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
                        <table id="myfeedback_table" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Fotka</th>
                                <th>Komentár</th>
                                <th>Odporúčanie</th>
                                <th>Vytvorený feedback</th>
                                <th>Akcia</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($feedback as $Feedback)
                                <tr>
                                    <td><img src='{{ asset('feedback') }}/{{ $Feedback->photo }}' style="width:100px;"></td>
                                    <td>{{ $Feedback->comment }}</td>
                                    <td>{{ $Feedback->rate }}</td>
                                    <td>{{ $Feedback->created_at }}</td>
                                    <td>
                                         <a href="{{ route('myfeedback.edit' , $Feedback->id) }}" >Edit</a>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Fotka</th>
                                <th>Komentár</th>
                                <th>Odporúčanie</th>
                                <th>Vytvorený feedback</th>
                                <th>Akcia</th>
                            </tr>
                            </tfoot>
                        </table>
                    {{ $feedback->links() }}
            @else
                <div class="row">
                    <div class="col-md-7">
                        <h4>Pre zobrazenie feedback listu sa musiš prihlásiť</h4>
                    </div>
                    <div class="col-md-5">
                        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

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
                                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
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
