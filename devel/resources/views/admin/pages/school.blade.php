@extends('admin.layouts.default')
@section('content')

    <section class="content-header">
        <h1>
            Školy
            <small>evidencia škôl erazmu</small>
            <a class="btn btn-app pull-right" href="javascript:void(0)"
               id="createSchool">
                <i class="fa fa-plus"></i>  Vytvor záznam školy
            </a>
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
                        <h3 class="box-title">Školy</h3>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered table-striped" id="school_datatable">
                            <thead>
                            <tr>
                                <th>id</th>
                                <th></th>
                                <th>Názov školy</th>
                                <th>Email</th>
                                <th>URL</th>
                                <th>Adresa</th>
                                <th>PSČ</th>
                                <th>Vytvorený</th>
                                <th>Operácie</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>id</th>
                                <th></th>
                                <th>Názov školy</th>
                                <th>Email</th>
                                <th>URL</th>
                                <th>Adresa</th>
                                <th>PSČ</th>
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
    <div class="modal fade" id="ajax-school" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="schoolCrudModal"></h4>
                </div>

                <div class="modal-body">

                    <div id="message-danger"></div>

                    <form id="schoolForm" name="schoolForm" class="form-horizontal">
                        <input type="hidden" name="school_id" id="school_id">
                        <div class="form-group">
                            <label class="col-sm-12" for="name">Meno:</label>
                            <div class="col-sm-12">
                                <input id="name" type="text" placeholder="Zadaj meno..." class="form-control" name="name" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12" for="email">Email:</label>
                            <div class="col-sm-12">
                                <input id="email" type="text" placeholder="Zadaj emailovú adresu..." class="form-control" name="email" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12" for="urlEdit">Webová stránka:</label>
                            <div class="col-sm-12">
                                <input id="url" type="text" placeholder="Zadaj webovú stránku..." class="form-control" name="url" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12" for="address">Adresa školy:</label>
                            <div class="col-sm-12">
                                <input id="address" type="text" placeholder="Zadaj adresu školy.." class="form-control" name="address" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12" for="postcode">Poštové číslo:</label>
                            <div class="col-sm-12">
                                <input id="postcode" type="text" placeholder="Zadaj poštové číslo školy.." class="form-control" name="postcode" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12" for="country">Krajina:</label>
                            <div class="col-sm-12">
                                <select id="country" name="category_id" class="form-control" >
                                    <option value="" selected disabled>Select</option>
                                    @foreach($countries as $key => $country)
                                        <option value="{{$key}}"> {{$country}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12" for="state">Okres:</label>
                            <div class="col-sm-12">
                                <select name="state" id="state" class="form-control"></select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12" for="city">Mesto:</label>
                            <div class="col-sm-12">
                                <select name="city" id="city" class="form-control" ></select>
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