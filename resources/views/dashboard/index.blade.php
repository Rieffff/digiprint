@extends('layouts.dashboard')
@section('title', 'Dashboard')
@section('content')
<div class="container-fluid">

    <!-- row -->

    <div class="row">
        <div class="row">
            

            <div class="col">
                <div class="widget-stat card">
                    <div class="card-body p-4">
                        <div class="media ai-icon">
                            <span class="me-3 bgl-info text-info">
                                <svg id="icon-revenue" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign">
                                    <line x1="12" y1="1" x2="12" y2="23"></line>
                                    <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                                </svg>
                            </span>
                            <div class="media-body">
                                <p class="mb-1">Total Nominal Transaksi</p>

                                <h4 class="mb-0">{{ $formattedTotalTabungan }}</h4>
                                <!-- <span class="badge badge-success">-3.5%</span> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
 <div class="col">
                <div class="widget-stat card">
                    <div class="card-body p-4">
                        <div class="media ai-icon">
                            <span class="me-3 bgl-primary text-primary">
                                <!-- <i class="ti-user"></i> -->
                                <svg id="icon-customers" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                            </span>
                            <div class="media-body">
                                <p class="mb-1">Total Admin & Supervisor</p>
                                <h4 class="mb-0">{{ $totalAdminSupervisor }}</h4>
                                <!-- <span class="badge badge-primary">+3.5%</span> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="widget-stat card">
                    <div class="card-body p-4">
                        <div class="media ai-icon">
                            <span class="me-3 bgl-primary text-primary">
                                <!-- <i class="ti-user"></i> -->
                                <svg id="icon-customers" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                            </span>
                            <div class="media-body">
                                <p class="mb-1">Total Customer</p>
                                <h4 class="mb-0">{{ $totalSiswa }}</h4>
                                <!-- <span class="badge badge-primary">+3.5%</span> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>


        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Grafik Bulanan</h4>
                            </div>
                            <div class="card-body">

                                <canvas id="myChart"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Grafik Bulanan</h5>
                                <p class="card-text">Diagram Lingkaran</p>
                                <p class="card-text text-danger">Coming Soon</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- @BEGINOF GRAFIK TOTAL TRANSAKSI DALAM 1 MINGGU TERAKHIR -->
        <!-- <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Grafik Mingguan</h4>
                            </div>
                            <div class="card-body">
                                
                            <canvas id="lineChart_1"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Title</h5>
                                <p class="card-text">Content</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- @ENDOF GRAFIK TOTAL TRANSAKSI DALAM 1 MINGGU TERAKHIR -->


    </div>
</div>
<script>
    var data33 = @json($dataBr);
    var labels = @json($dataYAxis);
    var xAxis = @json($xAxis);
    var yAxis = @json($yAxis);
</script>
@endsection