@extends('admin.layouts.default')
@section('content')
    <section class="content-header">
        <h1>
            Mobility
            <small>správa mobilít</small>
            <a class="btn btn-primary pull-right" href="{{ route('mobility.index') }}">
                <i class="fa fa-arrow-circle-left"></i>&nbsp;Späť na mobility
            </a>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Vytvorenie novej mobility</h3>
                    </div>
                    <div class="box-body">

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
