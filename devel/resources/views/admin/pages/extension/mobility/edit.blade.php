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
            Výzvy
            <small>správa výziev</small>
            <a class="btn btn-primary pull-right" href="{{ route('mobility.index') }}">
                <i class="fa fa-arrow-circle-left"></i>&nbsp;Späť na výzvy
            </a>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">Upravenie výzvy</h3>
                    </div>
                    {{ Form::model($getMobility, ['method' => 'PATCH','files' => 'true','route' => ['mobility.update', $getChallenge->id]]) }}
                    {{ csrf_field() }}
                    <input type="hidden" name="id" id="id">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Názov výzvy</label>
                                    <input type="text" value="{{ $getChallenge->name }}" name="name" id="name" class="form-control"
                                           placeholder="Enter ...">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Škola</label>
                                    <select class="form-control select2"  multiple="multiple" name="school_id[]" id="school_id">
                                        @foreach($school as $School)
                                            <option value="{{ $School->id }}"  {{ $School->id == $selectedID ? 'selected="selected"' : '' }}>{{ $School->name }}
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
                                        @foreach($getMobility as $Mobilities)
                                            <option value="{{ $Mobilities->id }}"
                                            {{ $Mobilities->id == $getChallenge->mobility_id ? 'selected="selected"' : '' }}>
                                                {{ $Mobilities->type }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Kapacita výzvy</label>
                                    <input type="number" value="{{ $getChallenge->capacity }}" name="capacity" id="capacity" class="form-control"
                                           placeholder="Enter ...">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Začiatok výzvy</label>
                                    <input type="date" value="{{ $getChallenge->start }}" name="start" id="start" class="form-control"
                                           placeholder="Enter ...">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Koniec výzvy</label>
                                    <input type="date" value="{{ $getChallenge->end }}" name="end" id="end" class="form-control" placeholder="Enter ...">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Náhľadový obrázok</label>
                                    <img src="{{ asset('/admin/mobility/'.$getChallenge->title_photo) }}" style="width:100px;"/>
                                    <input type="file" name="myFile" class="form-control">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <textarea name="description" id="description">
                                    {{ $getChallenge->description }}
                                </textarea>
                            </div>
                        </div>

                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Uprav</button>
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
