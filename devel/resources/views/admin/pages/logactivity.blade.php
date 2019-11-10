@extends('admin.layouts.default')
@section('content')
    <section class="content-header">
        <h1>
            Logy správcov webu
            <small>kontrola systému</small>
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-5">
                <div id="message-success"></div>
            </div>
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Logovanie aktivity správcov</h3>
                        <a class="btn btn-danger dropdown-item pull-right" href="{{ route('log.delete-all') }}">
                            <i class="fa fa-trash"></i> Prečistiť Logy</a>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered table-striped" id="logs_datatable">
                            <thead>
                            <tr>
                                <th>id</th>
                                <th>S. No</th>
                                <th>Používateľ</th>
                                <th>Subjekt</th>
                                <th>URL</th>
                                <th>Metóda</th>
                                <th>IP</th>
                                <th>Agent</th>
                                <th>Vytvorený</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>id</th>
                                <th>S. No</th>
                                <th>Používateľ</th>
                                <th>Subjekt</th>
                                <th>URL</th>
                                <th>Metóda</th>
                                <th>IP</th>
                                <th>Agent</th>
                                <th>Vytvorený</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection