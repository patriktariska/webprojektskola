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
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">Upravenie mobility</h3>
                    </div>
                    {{ Form::open(['route' => 'mobility.update','files' => 'true', 'method' => 'POST', 'class'=>'form']) }}
                    {{ csrf_field() }}
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Názov mobility</label>
                                    <input type="text" value="{{ $getMobility->name }}" name="name" id="name" class="form-control"
                                           placeholder="Enter ...">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Škola</label>
                                    <select class="form-control select2" name="school_id" id="school_id">
                                        @foreach($school as $School)
                                            <option value="{{ $School->id }}" {{ ( $School->id != $selectedID) ? 'selected' : '' }}>{{ $School->name }}
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
                                    <input type="text" value="{{ $getMobility->type }}" name="type" id="type" class="form-control"
                                           placeholder="Enter ...">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Kapacita mobility</label>
                                    <input type="number" value="{{ $getMobility->capacity }}" name="capacity" id="capacity" class="form-control"
                                           placeholder="Enter ...">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Začiatok mobility</label>
                                    <input type="date" value="{{ $getMobility->start }}" name="start" id="start" class="form-control"
                                           placeholder="Enter ...">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Koniec mobility</label>
                                    <input type="date" value="{{ $getMobility->end }}" name="end" id="end" class="form-control" placeholder="Enter ...">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Nahladový obrázok</label>
                                    <input type="file" name="myFile" class="form-control">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <textarea name="description" id="description">
                                    {{ $getMobility->description }}
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
