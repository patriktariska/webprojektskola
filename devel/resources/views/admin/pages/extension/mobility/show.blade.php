@extends('admin.layouts.default')
@section('content')
    <section class="content-header">
    </section>
    <section class="invoice">
        <!-- title row -->
        <div class="row">
            <div class="col-xs-12">
                <h2 class="page-header">
                    <i class="fa fa-globe"></i> {{ $getMobilities->name }}
                    <small class="pull-right">Posledná uprava: {{ $getMobilities->updated_at }}</small>
                </h2>
            </div>
            <!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
                <img src="{{ asset('admin/mobility') }}/{{ $getMobilities->title_photo }}" alt="Image" class="img-fluid" style="width:50%">
            </div>
            <div class="col-sm-4 invoice-col">
                <address>
                    Názov mobility: <strong>{{ $getMobilities->name }}</strong><br>
                    Typ mobility: {{ $getMobilities->type }}<br>
                    Kapacita: {{ $getMobilities->capacity }}<br>
                    Začiatok: {{ $getMobilities->start }}<br>
                    Koniec: {{ $getMobilities->end }}
                </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
                @foreach($getMobilities->school as $schools)
                <address>
                    Názov školy: <strong>{{ $schools->name }}</strong><br>
                    Email školy: {{ $schools->email }}<br>
                    Webová stránka: {{ $schools->url }}<br>
                    Adresa školy: {{ $schools->address }}<br>
                    PSČ: {{ $schools->postcode }}<br>
                </address>
                @endforeach
            </div>
            <!-- /.col -->
        </div>
        <div class="row">
            <div class="col-xs-12">
                <p class="lead">Popis mobility:</p>
                <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                    {{ strip_tags($getMobilities->description) }}
                </p>
            </div>
        </div>

        <!-- Table row -->
        <div class="row">
            <div class="col-xs-12 table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Študent</th>
                        <th>Feedback</th>
                        <th>Odporúčanie</th>
                        <th>Vytvorený</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($getFeedback as $Feedback)
                    <tr>
                        <td>{{ $Feedback->student->name }}</td>
                        <td>{{ $Feedback->comment }}</td>
                        <td>{{ $Feedback->rate }}</td>
                        <td>{{ $Feedback->created_at }}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12">
                <a href="{{ route('mobility.index') }}" class="btn btn-primary pull-right" style="margin-right: 5px;">
                    <i class="fa fa-angle-left"></i> Späť na mobility
                </a>
            </div>
        </div>
    </section>
@endsection
