@extends('admin.layouts.default')
@section('content')

    <section class="content-header">
        <h1>
            Feedback študentov
            <small>odporúčania</small>
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
                        <h3 class="box-title">Feedback list</h3>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered table-striped" id="feedback_datatable">
                            <thead>
                            <tr>
                                <th>id</th>

                                <th>Fotka</th>
                                <th>Email študenta</th>
                                <th>Odporúčanie</th>
                                <th>Status</th>
                                <th>Vytvorený</th>
                                <th>Operácie</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>id</th>
                                <th>Fotka</th>
                                <th>Email študenta</th>
                                <th>Odporúčanie</th>
                                <th>Status</th>
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

    {{--Definition Modal--}}
    <div class="modal fade" id="ajax-feedback" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="feedbackCrudModal"></h4>
                </div>
                <div class="modal-body">
                    <div id="message-danger"></div>
                    <form id="feedbackForm" name="feedbackForm" class="form-horizontal">
                        <input type="hidden" name="feedback_id" id="feedback_id">

                        <div class="form-group">
                            <label class="col-sm-12" for="name">Publikovaný:</label>
                            <div class="col-sm-12">
                                <input class="pub" type="checkbox" data-toggle="toggle" name="published" id="published" data-on="Publikovaný" data-off="Nepublikovaný">
                            </div>
                        </div>
                        <div class="col">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Zatvor
                            </button>
                            <button type="submit" class="btn btn-success pull-right" id="btn-save" value="create"
                                    data-toggle="modal"
                                    data-target="#create"><i
                                        class="fa fa-edit"></i> Pridaj záznam
                            </button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer"></div>
            </div>
        </div>
    </div>

@endsection