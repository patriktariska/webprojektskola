@extends('admin.layouts.default')
@section('content')
    <style>
        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            background-color: #0792e2 !important;
            border-color: #367fa9 !important;
            border: 1px solid #367fa9 !important;
        }
        .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
            color: #FFF !important;
        }
    </style>

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
                    {{ Form::open(['route' => 'mobility.store','files' => 'true', 'method' => 'POST', 'class'=>'form']) }}
                    {{ csrf_field() }}
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Názov mobility</label>
                                    <input type="text" name="name" id="name" class="form-control"
                                           placeholder="Enter ...">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Škola</label>
                                    <select class="form-control select2"  multiple="multiple" name="school_id[]" id="school_id">
                                        @foreach($school as $School)
                                            <option value="{{ $School->id }}">{{ $School->name }}
                                                , {{ $School->address }}, {{ $School->email }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Typ mobility</label>
                                    <select class="form-control select2" name="mobility_id" id="mobility_id">
                                        @foreach($mobility as $Mobilities)
                                            <option value="{{ $Mobilities->id }}" selected>{{ $Mobilities->type }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Kapacita mobility</label>
                                    <input type="number" name="capacity" id="capacity" class="form-control"
                                           placeholder="Enter ...">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Začiatok mobility</label>
                                    <input type="date" name="start" id="start" class="form-control"
                                           placeholder="Enter ...">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Koniec mobility</label>
                                    <input type="date" name="end" id="end" class="form-control" placeholder="Enter ...">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Nahladový obrázok</label>
                                    <input type="file" name="myFile" class="form-control" required>
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <textarea name="description" id="description"></textarea>
                            </div>
                        </div>

                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Pridaj</button>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </section>
    <!-- Select2 -->
    <script src="{{ asset('admin/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
    <!-- EDITOR -->
    <script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
    <script>
        $('.select2').select2();
        tinymce.init({
            selector: "textarea",
            plugins: 'link code preview',
        });
    </script>
@endsection
