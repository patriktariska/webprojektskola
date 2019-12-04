@extends('admin.layouts.default')
@section('content')
    <section class="content-header">
        <h1>
            Úprava feedbacku
            <small>publikovanie feedbacku</small>
            <a class="btn btn-primary pull-right" href="{{ route('feedback.index') }}">
                <i class="fa fa-arrow-circle-left"></i>&nbsp;Späť na feedback
            </a>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-warning">
                    {{ Form::model($getFeedback, ['method' => 'POST','route' => ['feedback.update', $getFeedback->id]]) }}
                    {{ csrf_field() }}
                    <div class="box-header with-border">
                        <h3 class="box-title">Zmena stavu feedbacku</h3>
                        <div class="pull-right">
                            <input type="checkbox" {{$getFeedback->published == 1 ? 'checked' : ''}} data-onstyle="success" data-offstyle="danger" name="published" id="published" data-toggle="toggle"  data-on="Publikovaný" data-off="Nepublikovaný">
                        </div>
                    </div>
                    <input type="hidden" name="id" value="{{ $getFeedback->id }}" id="id">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email študenta</label>
                                    <input type="text" value="{{ $getFeedback->student->email }}" name="email" id="email" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Odporúčanie</label>
                                    <input type="text" value="{{ $getFeedback->rate }}" name="rate" id="rate" class="form-control" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Názov programu</label>
                                    <input type="text" value="{{ $getFeedback->challenge->name }}" name="challenge" id="challenge" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Vytvorený</label>
                                    <input type="text" value="{{ $getFeedback->created_at }}" name="created_at" id="created_at" class="form-control" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <textarea class="form-control" rows="3" disabled="">{{ $getFeedback->comment }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-success pull-right">Publikuj feedback</button>
                    </div>
                </div>
                {{ Form::close() }}
            </div>
        </div>
@endsection
