@extends('admin.layouts.default')
@section('content')
    <section class="content-header">
        <h1>
            Dashboard
            <small>správa štatistík</small>
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3></h3>
                        <p>Evidovaných škôl</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-archive"></i>
                    </div>
                    <a href="" class="small-box-footer">
                        Pozri viac <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3></h3>

                        <p>Evidovaných mobilít</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-cubes"></i>
                    </div>
                    <a href="" class="small-box-footer">
                        Pozri viac <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3></h3>

                        <p>Študentských feedbackov</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-chain"></i>
                    </div>
                    <a href="" class="small-box-footer">
                        Pozri viac <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3></h3>

                        <p>Logovanie systému</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-unlink"></i>
                    </div>
                    <a href="" class="small-box-footer">
                        Pozri viac <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="box box-success">
                    <div class="box-header">
                        <h3 class="box-title">Graf feedbackov</h3>
                    </div>
                    <div class="box-body">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box box-danger">
                    <div class="box-header">
                        <h3 class="box-title">Graf mobilít</h3>
                    </div>
                    <div class="box-body">
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Status správcov webu</h3>
                </div>
                <div class="box-body">
                    <table class="table table-striped table-bordered">
                        <tr>
                            <th>Meno</th>
                            <th>Priezvisko</th>
                            <th>Email</th>
                            <th>Status</th>
                        </tr>

                    </table>

                </div>
            </div>
        </div>

    </section>
@endsection