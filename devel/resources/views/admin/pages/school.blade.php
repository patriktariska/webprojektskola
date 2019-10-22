@extends('admin.layouts.default')
@section('content')
    <section class="content-header">
        <h1>
            Mobility
            <small>správa mobilít</small>
            <a class="btn btn-app pull-right" data-toggle="modal" data-target="#modal-default">
                <span class="badge bg-teal">67</span>
                <i class="fa fa-inbox"></i> Pridaj Školu
            </a>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="form-group">
            <label for="country">Vyber krajinu:</label>
            <select id="country" name="category_id" class="form-control" >
                @foreach($countries as $key => $country)
                    <option value="{{$key}}"> {{$country}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="title">Vyber okres:</label>
            <select name="state" id="state" class="form-control">
            </select>
        </div>

        <div class="form-group">
            <label for="title">Vyber mesto:</label>
            <select name="city" id="city" class="form-control">
            </select>
        </div>


        <!-- Modal !-->
        <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Evidencia školy</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Názov školy:</label>
                            <input type="text" id="name" name="name" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter email">
                        </div>

                        <div class="form-group">
                            <label for="url">Webová stránka:</label>
                            <input type="text" id="url" name="url" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="address">Adresa školy:</label>
                            <input type="text" id="address" name="address" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="postcode">PSČ:</label>
                            <input type="text" id="postcode" name="postcode" class="form-control">
                        </div>

                        <div class="form-group">
                        <label for="country">Vyber krajinu:</label>
                        <select id="country" name="category_id" class="form-control" >
                            @foreach($countries as $key => $country)
                                <option value="{{$key}}"> {{$country}}</option>
                            @endforeach
                        </select>
                        </div>

                        <div class="form-group">
                            <label for="title">Vyber okres:</label>
                            <select name="state" id="state" class="form-control">
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="title">Vyber mesto:</label>
                            <select name="city" id="city" class="form-control">
                            </select>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>


    </section>
@endsection