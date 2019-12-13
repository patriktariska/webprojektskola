@extends('public.layouts.default')
@section('content')

    <style>
        ul.pagination li{
            letter-spacing: 7px;
            font-weight: bold;
        }
    </style>

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
            <h4>Feedbacky od študenta {{ $studentName }}</h4>
                        <table id="myfeedback_table" class="table table-striped table-bordered border shadow" style="width:100%;">
                            <thead>
                            <tr>
                                <th>Fotografia</th>
                                <th>Komentár</th>
                                <th>Odporúčanie</th>
                                <th>Publikácia</th>
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
                                         <a href="{{ route('myfeedback.edit' , $Feedback->id) }}" title="Edit"><i class="fa fa-edit"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $feedback->links() }}
            @else
                <div class="row">
                    <div class="col-md-7">
                        <h4>Pre zobrazenie odoziev sa musiš prihlásiť</h4>
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
