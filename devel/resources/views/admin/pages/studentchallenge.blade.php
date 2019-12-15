@extends('admin.layouts.default')
@section('content')

    <section class="content-header">
        <h1>
            Prihlásení študenti
            <small>Študenti prihlásení na výzvy</small>
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
                        <h3 class="box-title">Prihlásení</h3>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered table-striped" id="students_datatable">
                            <thead>
                            <tr>
                                <th>id</th>
                                <th>Meno</th>
                                <th>Priezvisko</th>
                                <th>Email</th>
                                <th>Názov výzvy</th>
                                <th>ID výzvy</th>
                                <th>Dátum prihlásenia</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>id</th>
                                <th>Meno</th>
                                <th>Priezvisko</th>
                                <th>Email</th>
                                <th>Názov výzvy</th>
                                <th>ID výzvy</th>
                                <th>Dátum prihlásenia</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection