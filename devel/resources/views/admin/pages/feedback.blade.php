@extends('admin.layouts.default')
@section('content')

    <section class="content-header">
        <h1>
            Feedback študentov
            <small>odporúčania</small>
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-5">
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
                <div id="message-success"></div>
            </div>
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Feedback list</h3>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered table-striped" id="feedback_datatable">
                            <thead>
                            <tr>
                                <th>id</th>
                                <th>Fotka</th>
                                <th>Email študenta</th>
                                <th>Odporúčanie</th>
                                <th>Status</th>
                                <th>Vytvorený</th>
                                <th>Operácie</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>id</th>
                                <th>Fotka</th>
                                <th>Email študenta</th>
                                <th>Odporúčanie</th>
                                <th>Status</th>
                                <th>Vytvorený</th>
                                <th>Operácie</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection