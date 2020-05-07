@extends('admin.layout.admin')
@section('content')


                    <div class="container-fluid">
                        <h4 class="page-title">Dashboard</h4>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="card card-stats card-warning">
                                    <div class="card-body ">
                                        <div class="row">
                                            <div class="col-5">
                                                <div class="icon-big text-center">
                                                    <i class="la la-users"></i>
                                                </div>
                                            </div>
                                            <div class="col-7 d-flex align-items-center">
                                                <div class="numbers">
                                                    <?php
            // $balance = DB::table("orders")->select(DB::raw("SUM(total) as totalsum"))->get();

           $user = DB::table("users")->get();
           $usercount = count($user);
            ?>
                                                    <p class="card-category">Customers</p>
                                                    <h4 class="card-title">{{$usercount}}</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card card-stats card-success">
                                    <div class="card-body ">
                                        <div class="row">
                                            <div class="col-5">
                                                <div class="icon-big text-center">
                                                    <i class="la la-bar-chart"></i>
                                                </div>
                                            </div>
                                            <div class="col-7 d-flex align-items-center">
                                                <div class="numbers">
                                                     <?php
            // $balance = DB::table("orders")->select(DB::raw("SUM(total) as totalsum"))->get();

           $balance = DB::table("orders")->sum('total');
            ?>
                                                    <p class="card-category">Sales</p>
                                                    <h4 class="card-title">Ksh {{$balance}}</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card card-stats card-danger">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-5">
                                                <div class="icon-big text-center">
                                                    <i class="la la-newspaper-o"></i>
                                                </div>
                                            </div>
                                            <div class="col-7 d-flex align-items-center">
                                                <div class="numbers">
                                                     <?php
            // $balance = DB::table("orders")->select(DB::raw("SUM(total) as totalsum"))->get();

           $sub = DB::table("subscribes")->get();
           $subcount = count($sub);
            ?>
                                                    <p class="card-category">Subscribers</p>
                                                    <h4 class="card-title">{{$subcount}}</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card card-stats card-primary">
                                    <div class="card-body ">
                                        <div class="row">
                                            <div class="col-5">
                                                <div class="icon-big text-center">
                                                    <i class="la la-check-circle"></i>
                                                </div>
                                            </div>
                                            <div class="col-7 d-flex align-items-center">
                                                <div class="numbers">
                                                    <?php
            // $balance = DB::table("orders")->select(DB::raw("SUM(total) as totalsum"))->get();

           $order = DB::table("orders")->get();
           $ordercount = count($order);
            ?>
                                                    <p class="card-category">Order</p>
                                                    <h4 class="card-title">{{$ordercount}}</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row row-card-no-pd">
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                            <?php
            // $balance = DB::table("orders")->select(DB::raw("SUM(total) as totalsum"))->get();

           $balance = DB::table("orders")->sum('total');
            ?>

          
                                        <p class="fw-bold mt-1">Total Sales</p>
                                        <h4><b>Ksh {{ $balance }}.00</b></h4>
                                      
                                        <a href="#" class="btn btn-primary btn-full text-left mt-3 mb-3"><i class="la la-plus"></i> Add Balance</a>
                                    </div>
                                    <div class="card-footer">
                                        <ul class="nav">
                                            <li class="nav-item"><a class="btn btn-default btn-link" href="#"><i class="la la-history"></i> History</a></li>
                                            <li class="nav-item ml-auto"><a class="btn btn-default btn-link" href="#"><i class="la la-refresh"></i> Refresh</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="progress-card">
                                            <div class="d-flex justify-content-between mb-1">
                                                <span class="text-muted">Profit</span>
                                                <span class="text-muted fw-bold"> $3K</span>
                                            </div>
                                            <div class="progress mb-2" style="height: 7px;">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: 78%" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title="78%"></div>
                                            </div>
                                        </div>
                                        <div class="progress-card">
                                            <div class="d-flex justify-content-between mb-1">
                                                <span class="text-muted">Orders</span>
                                                <span class="text-muted fw-bold"> 576</span>
                                            </div>
                                            <div class="progress mb-2" style="height: 7px;">
                                                <div class="progress-bar bg-info" role="progressbar" style="width: 65%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title="65%"></div>
                                            </div>
                                        </div>
                                        <div class="progress-card">
                                            <div class="d-flex justify-content-between mb-1">
                                                <span class="text-muted">Tasks Complete</span>
                                                <span class="text-muted fw-bold"> 70%</span>
                                            </div>
                                            <div class="progress mb-2" style="height: 7px;">
                                                <div class="progress-bar bg-primary" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title="70%"></div>
                                            </div>
                                        </div>
                                        <div class="progress-card">
                                            <div class="d-flex justify-content-between mb-1">
                                                <span class="text-muted">Open Rate</span>
                                                <span class="text-muted fw-bold"> 60%</span>
                                            </div>
                                            <div class="progress mb-2" style="height: 7px;">
                                                <div class="progress-bar bg-warning" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title="60%"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card card-stats">
                                    <div class="card-body">
                                        <p class="fw-bold mt-1">Statistic</p>
                                        <div class="row">
                                            <div class="col-5">
                                                <div class="icon-big text-center icon-warning">
                                                    <i class="la la-pie-chart text-warning"></i>
                                                </div>
                                            </div>
                                            <div class="col-7 d-flex align-items-center">
                                                <div class="numbers">
                                                    <p class="card-category">Number</p>
                                                    <h4 class="card-title">150GB</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <hr/>
                                        <div class="row">
                                            <div class="col-5">
                                                <div class="icon-big text-center">
                                                    <i class="la la-heart-o text-primary"></i>
                                                </div>
                                            </div>
                                            <div class="col-7 d-flex align-items-center">
                                                <div class="numbers">
                                                    <p class="card-category">Followers</p>
                                                    <h4 class="card-title">+45K</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

@endsection