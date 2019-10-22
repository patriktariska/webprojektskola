@extends('admin.layouts.default')
@section('content')
    <section class="content-header">
        <h1>
            Profil
            <small>Správa profilového účtu</small>
        </h1>
    </section>
    <section class="content">
        {{ Form::open(['route' => ['profile.update', Auth::user()->id], 'method' => 'PATCH', 'class'=>'form']) }}
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-12">
                <div class="box box-widget widget-user">
                    <div class="widget-user-header bg-black"
                         style="background: url('{{ asset('admin/dist/img/profile-title.png') }}') center center;">
                        <h3 class="widget-user-username">{{  Auth::user()->name }}</h3>
                        <h5 class="widget-user-desc">{{  Auth::user()->email }}</h5>
                    </div>
                    <div class="widget-user-image">
                        <img class="img-circle" src="{{ asset('admin/dist/img/avatar.png') }}" alt="User Avatar">
                    </div>
                    <div class="box-footer">
                        <div class="row">
                            <div class="col-sm-12 pull-right">
                                <div class="description-block">
                                    <button type="submit" class="btn btn-block btn-success float-right">Uprav Profil
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
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
            <div class="col-md-6">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                        class="fa fa-minus"></i></button>
                        </div>
                    </div>

                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <input type="hidden" value="{{ Auth::user()->id }}" id="user_id" name="user_id">
                                <div class="form-group">
                                    <label for="name">Meno účtu:</label>
                                    <input type="text" class="form-control" value="{{  Auth::user()->name }}" id="name"
                                           name="name"
                                           placeholder="Zadajte meno účtu ...">
                                </div>

                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control" value="{{  Auth::user()->email }}"
                                           id="email" name="email"
                                           placeholder="Zadaj emailovú adresu ...">
                                </div>

                                <div class="form-group">
                                    <label for="password">Heslo:</label>
                                    <input type="password" id="password" name="password" class="form-control"
                                           placeholder="Zadaj heslo ...">
                                </div>

                                <div class="form-group">
                                    <label for="password_confirmation">Zopakovanie hesla:</label>
                                    <input type="password" id="password_confirmation" name="password_confirmation"
                                           class="form-control" placeholder="Zopakuj heslo ...">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{ Form::close() }}
    </section>
@endsection