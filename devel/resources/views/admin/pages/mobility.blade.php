@extends('admin.layouts.default')
@section('content')
    <section class="content-header">
        <h1>
            Výzvy
            <small>správa výziev</small>
            <a class="btn btn-app pull-right" href="{{ route('mobility.create') }}">
                <i class="fa fa-plus"></i> Vytvor záznam výzvy
            </a>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">Zoznam zaevidovaných výziev</h3>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered table-striped" id="mobility_datatable">
                            <thead>
                            <tr>
                                <th>id</th>
                                <th>Názov</th>
                                <th>Škola</th>
                                <th>Typ</th>
                                <th>Začiatok</th>
                                <th>Koniec</th>
                                <th>Vytvorený</th>
                                <th>Operácie</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>id</th>
                                <th>Názov</th>
                                <th>Škola</th>
                                <th>Typ</th>
                                <th>Začiatok</th>
                                <th>Koniec</th>
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