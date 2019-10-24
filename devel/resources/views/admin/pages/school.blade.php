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

    <!-- Main content - TABLE -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Schools</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="box-body"">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>URL</th>
                                <th>Adrress</th>
                                <th>Postcode</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td>UKF</td>
                                <td>ukf@ukf.sk</td>
                                <td>ukf.sk</td>
                                <td>Nitra</td>
                                <td>949 01</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>SPU</td>
                                <td>spu@spu.sk</td>
                                <td>spu.sk</td>
                                <td>Nitra</td>
                                <td>949 01</td>
                            </tr>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

@endsection