@extends('admin.layouts.default')
@section('content')
    <section class="content-header">
        <h1>
            Dashboard
            <small>správa štatistík</small>
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>{{ $countSchool }}</h3>
                        <p>Evidovaných škôl</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-archive"></i>
                    </div>
                    <a href="{{ route('school.index') }}" class="small-box-footer">
                        Pozri viac <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>{{ $countMobility }}</h3>

                        <p>Evidovaných výziev</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-cubes"></i>
                    </div>
                    <a href="{{ route('mobility.index') }}" class="small-box-footer">
                        Pozri viac <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>{{ $countFeedback }}</h3>

                        <p>Študentských feedbackov</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-chain"></i>
                    </div>
                    <a href="{{ route('feedback.index') }}" class="small-box-footer">
                        Pozri viac <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>{{ $countLogs }}</h3>

                        <p>Logovanie systému</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-unlink"></i>
                    </div>
                    <a href="{{ route('log.index') }}" class="small-box-footer">
                        Pozri viac <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="box box-success">
                    <div class="box-header">
                        <h3 class="box-title">Graf feedbackov</h3>
                    </div>
                    <div class="box-body">
                        {!! $chart->container() !!}
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box box-danger">
                    <div class="box-header">
                        <h3 class="box-title">Graf výziev</h3>
                    </div>
                    <div class="box-body">
                        {!! $chart2->container() !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Status správcov webu</h3>
                </div>
                <div class="box-body">
                    <table class="table table-hover">
                        <tr>
                            <th>Meno</th>
                            <th>Priezvisko</th>
                            <th>Email</th>
                            <th>Vytvorený</th>
                            <th>Status</th>
                        </tr>
                        @foreach ($user as $User)
                            <tr>
                                <td>{{ $User->name }}</td>
                                <td>{{ $User->lname }}</td>
                                <td>{{ $User->email }}</td>
                                <td>{{ date('d.m.Y', strtotime($User->created_at)) }}</td>
                                <td>@if ($User->isOnline())
                                        <li class="text-green">Online</li>
                                    @else
                                        <li class="text-red">Offline</li>
                                    @endif
                                </td>
                            </tr>

                        @endforeach

                    </table>

                </div>
            </div>
        </div>

    </section>
    {!! $chart->script() !!}
    {!! $chart2->script() !!}
    <!-- Chart -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
@endsection