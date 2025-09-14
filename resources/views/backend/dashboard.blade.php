@extends('backend.master')

@section('content')
    <div class="wrapper">

        <div class="main-panel">
            <div class="main-header">
                <div class="main-header-logo">

                </div>
            </div>


            <div class="container">
                <div class="page-inner">

                    <div class="row">
                        <div class="col-sm-6 col-md-2">
                            <div class="card card-stats card-round">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-icon">
                                            <div class="icon-big text-center icon-primary bubble-shadow-small">

                                                <i class="fa-solid fa-microscope"></i>
                                            </div>
                                        </div>
                                        <div class="col col-stats ms-3 ms-sm-0">
                                            <div class="numbers">
                                                <p class="card-category">Visitors</p>
                                                <h4 class="card-title">1,294</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-2">
                            <div class="card card-stats card-round">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-icon">
                                            <div class="icon-big text-center icon-info bubble-shadow-small">
                                                <i class="fa-solid fa-vial"></i>
                                            </div>
                                        </div>
                                        <div class="col col-stats ms-3 ms-sm-0">
                                            <div class="numbers">
                                                <p class="card-category">Subscribers</p>
                                                <h4 class="card-title">1303</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-2">
                            <div class="card card-stats card-round">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-icon">
                                            <div class="icon-big text-center icon-success bubble-shadow-small">
                                                <i class="fa-solid fa-capsules"></i>
                                            </div>
                                        </div>
                                        <div class="col col-stats ms-3 ms-sm-0">
                                            <div class="numbers">
                                                <p class="card-category">Sales</p>
                                                <h4 class="card-title">$ 1,345</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-2">
                            <div class="card card-stats card-round">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-icon">
                                            <div class="icon-big text-center icon-secondary bubble-shadow-small">
                                                <i class="fa-solid fa-hospital-user"></i>
                                            </div>
                                        </div>
                                        <div class="col col-stats ms-3 ms-sm-0">
                                            <div class="numbers">
                                                <p class="card-category">Order</p>
                                                <h4 class="card-title">576</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-2">
                            <div class="card card-stats card-round">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-icon">
                                            <div class="icon-big text-center icon-danger bubble-shadow-small">
                                                <i class="fa-solid fa-file-contract"></i>
                                            </div>
                                        </div>
                                        <div class="col col-stats ms-3 ms-sm-0">
                                            <div class="numbers">
                                                <p class="card-category">Order</p>
                                                <h4 class="card-title">576</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-2">
                            <div class="card card-stats card-round">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-icon">
                                            <div class="icon-big text-center icon-warning bubble-shadow-small">
                                                <i class="fa-solid fa-house-laptop"></i>
                                            </div>
                                        </div>
                                        <div class="col col-stats ms-3 ms-sm-0">
                                            <div class="numbers">
                                                <p class="card-category">Order</p>
                                                <h4 class="card-title">576</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                {{-- Report --}}
                <div class="col-md-12 px-5">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Today's Report</h4>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-4 col-sm-6 col-12">
                                    <button class="btn btn-success w-100"
                                        style="padding:12px; font-size:15px; border-radius:13px;">
                                        <i class="fa fa-archive"></i> Default <br> tk.120
                                    </button>
                                </div>
                                <div class="col-md-4 col-sm-6 col-12">
                                    <button class="btn btn-success w-100"
                                        style="padding:12px; font-size:15px; border-radius:13px;">
                                        <i class="fa fa-bookmark"></i> Primary <br> tk.120
                                    </button>
                                </div>
                                <div class="col-md-4 col-sm-6 col-12">
                                    <button class="btn btn-success w-100"
                                        style="padding:12px; font-size:15px; border-radius:13px;">
                                        <i class="fa fa-plus"></i> Secondary <br> tk.120
                                    </button>
                                </div>
                                <div class="col-md-4 col-sm-6 col-12">
                                    <button class="btn btn-info w-100"
                                        style="padding:12px; font-size:15px; border-radius:13px;">
                                        <i class="fa fa-info"></i> Info <br> tk.120
                                    </button>
                                </div>
                                <div class="col-md-4 col-sm-6 col-12">
                                    <button class="btn btn-warning w-100"
                                        style="padding:12px; font-size:15px; border-radius:13px;">
                                        <i class="fa fa-check"></i> Success <br> tk.120
                                    </button>
                                </div>
                                <div class="col-md-4 col-sm-6 col-12">
                                    <button class="btn btn-primary w-100"
                                        style="padding:12px; font-size:15px; border-radius:13px;">
                                        <i class="fa fa-exclamation-circle"></i> Warning <br> tk.120
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Active user --}}
                <div>
                    <div class="row">
                        <div class="col-12 px-5" style="padding: 20px;">
                            <button class="btn btn-success"
                                style="width: 100%; display: flex; align-items: center; justify-content: space-between; 
                   padding: 12px 20px; font-size: 16px; border-radius: 12px;">


                                <span style="display: flex; align-items: center; gap: 8px; font-size: 16px; color: #fff;">
                                    <span class="btn-label" style="font-size: 22px; display: flex; align-items: center;">
                                        <i class="fa fa-archive"></i>
                                    </span>
                                    <span>Default</span>
                                </span>


                                <span style="display: flex; align-items: center; gap: 10px; color: #fff; cursor: pointer;">
                                    <span style="font-size: 32px; line-height: 1;">−</span>
                                    <span style="font-size: 32px; line-height: 1;">&times;</span>
                                </span>

                            </button>
                        </div>
                    </div>

                    {{-- Home Shedule --}}

                    <div class="col-md-12 px-4">
                        <div class="card" style="border-radius: 15px; overflow: hidden;">
                            <div style="width: calc(100% - 10px); margin: 0 auto; display: flex; justify-content: center;">
                                <button class="btn btn-danger"
                                    style="padding: 10px 0; font-size: 18px; border-radius: 0; width: 100%; display: flex; justify-content: space-between; align-items: center;">

                                    <span style="display: flex; align-items: center; gap: 15px; padding-left: 20px;">
                                        <span class="btn-label" style="font-size: 22px;">
                                            <i class="fa fa-archive"></i>
                                        </span>
                                        Default
                                    </span>


                                    <span
                                        style="display: flex; gap: 15px; padding-right: 20px; font-size: 28px; cursor: pointer;">
                                        <span style="transform: rotate(0deg);">−</span>
                                        ×
                                    </span>
                                </button>
                            </div>



                            <!-- User Statistics -->
                            <div class="card-body" style="padding: 40px 20px; background-color: #fff; min-height: 150px;">

                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6" style="margin-bottom: 20px;">
                                <div class="card"
                                    style="background: #fff; color: #000; border-radius: 12px; box-shadow: 0 2px 6px rgba(0,0,0,0.1);">
                                    <!-- Header Blue -->
                                    <div class="card-header d-flex justify-content-between align-items-center"
                                        style="background: #177dff; color: #fff; border-bottom: 1px solid rgba(0,0,0,0.1); border-top-left-radius: 12px; border-top-right-radius: 12px;">
                                        <h5 class="mb-0">User Statistics</h5>
                                        <div>
                                            <button class="btn btn-sm btn-light" onclick="printChart()">
                                                <i class="fa fa-print"></i> Print
                                            </button>
                                            <button class="btn btn-sm btn-light" onclick="exportChart()">
                                                <i class="fa fa-download"></i> Export
                                            </button>
                                        </div>
                                    </div>
                                    <!-- Body White -->
                                    <div class="card-body" style="padding: 15px;">
                                        <canvas id="userStatsChartSmall" height="140"></canvas>
                                    </div>
                                </div>
                            </div>

                            <!-- Daily Sales -->
                            <div class="col-md-6" style="margin-bottom: 20px;">
                                <div class="card"
                                    style="background:#177dff; color:#fff; border-radius:12px; box-shadow:0 2px 6px rgba(0,0,0,0.15);">
                                    <!-- Header -->
                                    <div class="card-header d-flex justify-content-between align-items-center"
                                        style="background:transparent; border-bottom:1px solid rgba(255,255,255,0.2);">
                                        <h5 class="mb-0 text-white">Daily Sales</h5>
                                        <button class="btn btn-sm btn-light" onclick="exportSalesChart()">
                                            <i class="fa fa-download"></i> Export
                                        </button>
                                    </div>
                                    <!-- Body -->
                                    <div class="card-body" style="padding:15px;">
                                        <canvas id="dailySalesChart" height="140"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <script>
                            document.addEventListener("DOMContentLoaded", function() {
                                // User Statistics Chart
                                const ctx1 = document.getElementById("userStatsChartSmall").getContext("2d");
                                window.userStatsChart = new Chart(ctx1, {
                                    type: "line",
                                    data: {
                                        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun"],
                                        datasets: [{
                                            label: "Users",
                                            data: [50, 75, 60, 90, 100, 85],
                                            borderColor: "#177dff",
                                            backgroundColor: "rgba(23,125,255,0.2)",
                                            fill: true,
                                            tension: 0.4,
                                            borderWidth: 2,
                                            pointRadius: 4,
                                            pointBackgroundColor: "#177dff"
                                        }]
                                    },
                                    options: {
                                        responsive: true,
                                        plugins: {
                                            legend: {
                                                display: false
                                            }
                                        },
                                        scales: {
                                            x: {
                                                grid: {
                                                    display: false
                                                }
                                            },
                                            y: {
                                                grid: {
                                                    color: "rgba(0,0,0,0.1)"
                                                }
                                            }
                                        }
                                    }
                                });

                                // Daily Sales Chart
                                const ctx2 = document.getElementById("dailySalesChart").getContext("2d");
                                window.dailySalesChart = new Chart(ctx2, {
                                    type: "bar",
                                    data: {
                                        labels: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
                                        datasets: [{
                                            label: "Sales",
                                            data: [120, 150, 100, 180, 200, 170, 140],
                                            backgroundColor: "rgba(255,255,255,0.8)",
                                            borderColor: "#fff",
                                            borderWidth: 1,
                                            borderRadius: 6
                                        }]
                                    },
                                    options: {
                                        responsive: true,
                                        plugins: {
                                            legend: {
                                                display: false
                                            }
                                        },
                                        scales: {
                                            x: {
                                                ticks: {
                                                    color: "#fff"
                                                },
                                                grid: {
                                                    display: false
                                                }
                                            },
                                            y: {
                                                ticks: {
                                                    color: "#fff"
                                                },
                                                grid: {
                                                    color: "rgba(255,255,255,0.2)"
                                                }
                                            }
                                        }
                                    }
                                });
                            });

                            // Print Function
                            function printChart() {
                                const canvas = document.getElementById("userStatsChartSmall");
                                const dataUrl = canvas.toDataURL();
                                const windowContent = '<img src="' + dataUrl + '" style="max-width:100%;">';
                                const printWin = window.open('', '', 'width=900,height=650');
                                printWin.document.write(windowContent);
                                printWin.document.close();
                                printWin.focus();
                                printWin.print();
                                printWin.close();
                            }

                            // Export User Statistics
                            function exportChart() {
                                const canvas = document.getElementById("userStatsChartSmall");
                                const link = document.createElement("a");
                                link.download = "user_statistics.png";
                                link.href = canvas.toDataURL("image/png");
                                link.click();
                            }

                            // Export Daily Sales
                            function exportSalesChart() {
                                const canvas = document.getElementById("dailySalesChart");
                                const link = document.createElement("a");
                                link.download = "daily_sales.png";
                                link.href = canvas.toDataURL("image/png");
                                link.click();
                            }
                        </script>
                    </div>
                    <!-- Custom template | don't include it in your project! -->
                    <!-- End Custom template -->
                </div>
            @endsection
