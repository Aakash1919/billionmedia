@extends('layouts.app')

@section('content')
<div class="page-wrapper">
    <div class="page-content">
    
      <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-4">
        <div class="col">
                <div class="card radius-10 overflow-hidden bg-danger">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-white">Total Orders</p>
                                <h5 class="mb-0 text-white">867</h5>
                            </div>
                            <div class="ms-auto text-white">	<i class='bx bx-cart font-30'></i>
                            </div>
                        </div>
                    </div>
                    <div class="" id="chart1"></div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10 overflow-hidden bg-primary">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-white">Total Income</p>
                                <h5 class="mb-0 text-white">$52,945</h5>
                            </div>
                            <div class="ms-auto text-white">	<i class='bx bx-wallet font-30'></i>
                            </div>
                        </div>
                    </div>
                    <div class="" id="chart2"></div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10 overflow-hidden bg-warning">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-dark">Total Users</p>
                                <h5 class="mb-0 text-dark">24.5K</h5>
                            </div>
                            <div class="ms-auto text-dark">	<i class='bx bx-group font-30'></i>
                            </div>
                        </div>
                    </div>
                    <div class="" id="chart3"></div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10 overflow-hidden bg-success">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-white">Comments</p>
                                <h5 class="mb-0 text-white">869</h5>
                            </div>
                            <div class="ms-auto text-white">	<i class='bx bx-chat font-30'></i>
                            </div>
                        </div>
                    </div>
                    <div class="" id="chart4"></div>
                </div>
            </div>
      </div><!--end row-->
      
      
      {{-- <div class="row">
        <div class="col-12 col-xl-8 d-flex">
          <div class="card radius-10 w-100">
                <div class="card-body">
                    <div class="" id="chart5"></div>
                </div>
            </div>
        </div>
        <div class="col-12 col-xl-4 d-flex">
          <div class="card radius-10 w-100">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                            <div>
                                <h5 class="mb-1">Sales Target</h5>
                            </div>
                            <div class="font-22 ms-auto"><i class="bx bx-dots-horizontal-rounded"></i>
                            </div>
                        </div>
                    <div class="mt-4" id="chart6"></div>
                    <div class="d-flex align-items-center">
                            <div>
                                <h2 class="mb-0">2248</h2>
                                <p class="mb-0">/2,800 target</p>
                            </div>
                            <div class="ms-auto d-flex align-items-center border radius-10 px-2">
                              <i class='bx bxs-checkbox font-22 me-1 text-primary'></i><span>Marketing Sales</span>
                            </div>
                      </div>
                </div>
            </div>
        </div>
      </div><!--end row-->


      <div class="row row-cols-1 row-cols-xl-2">
        <div class="col d-flex">
            <div class="card radius-10 w-100">
                <div class="card-body">
                    <div class="" id="chart7"></div>
                </div>
            </div>
        </div>
        <div class="col d-flex">
            <div class="card radius-10 w-100">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <h5 class="mb-1">Sales Report</h5>
                        </div>
                        <div class="font-22 ms-auto"><i class="bx bx-dots-horizontal-rounded"></i>
                        </div>
                    </div>
                    <div class="" id="chart8"></div>
                </div>
            </div>
        </div>
      </div><!--end row-->

      <div class="row">
        <div class="col-12 col-xl-4 col-xxl-3 d-flex">
            <div class="card radius-10 w-100 overflow-hidden">
                <div class="card-body">
                    <p class="mb-1">Overall Sales Performance</p>
                    <div class="">
                        <h2 class="mb-0">$84,126.5</h2>
                        <p class="mb-0 text-success">+2.5% vs last month</p>
                    </div>
                </div>
                <div class="" id="chart9"></div>
            </div>
        </div>
        <div class="col-12 col-xl-8 col-xxl-9 d-flex">
            <div class="card w-100 radius-10">
                <div class="row g-0">
                  <div class="col-md-4 border-end">
                    <div class="card-body">
                      <h5 class="card-title">Top Sales Locations</h5>
                      <h2 class="mt-4 mb-1">25.860 <i class="flag-icon flag-icon-us rounded"></i></h2>
                      <p class="mb-0 text-secondary">Our Most Customers in US</p>
                    </div>
                    <ul class="list-group mt-4 list-group-flush">
                        <li class="list-group-item d-flex align-items-center">
                          <i class='bx bxs-circle me-1 text-success'></i>
                          <span>Massive</span>
                          <strong class="ms-auto">18.4k</strong>
                        </li>
                        <li class="list-group-item d-flex align-items-center">
                          <i class='bx bxs-circle me-1 text-danger'></i>
                          <span>Large</span>
                          <strong class="ms-auto">6.9k</strong>
                        </li>
                        <li class="list-group-item d-flex align-items-center">
                          <i class='bx bxs-circle me-1 text-primary'></i>
                          <span>Medium</span>
                          <strong class="ms-auto">5.4k</strong>
                        </li>
                        <li class="list-group-item d-flex align-items-center">
                          <i class='bx bxs-circle me-1 text-warning'></i>
                          <span>Small</span>
                          <strong class="ms-auto">875</strong>
                        </li>
                    </ul>
                  </div>
                  <div class="col-md-8">
                      <div class="p-3">
                        <div class="" id="geographic-map"></div>
                      </div>
                  </div>
                </div>
              </div>
        </div>
      </div>
    {{-- </div> --}}
</div>
@endsection
@push('javascript')
<script src="{{ asset('assets/js/index.js')}}"></script>
<script src="{{ asset('assets/plugins/simplebar/js/simplebar.min.js')}}"></script>
<script src="{{ asset('assets/plugins/metismenu/js/metisMenu.min.js')}}"></script>
<script src="{{ asset('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
<script src="{{ asset('assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
<script src="{{ asset('assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<script src="{{ asset('assets/plugins/highcharts/js/highcharts.js')}}"></script>
<script src="{{ asset('assets/plugins/highcharts/js/exporting.js')}}"></script>
<script src="{{ asset('assets/plugins/highcharts/js/variable-pie.js')}}"></script>
<script src="{{ asset('assets/plugins/highcharts/js/export-data.js')}}"></script>
<script src="{{ asset('assets/plugins/highcharts/js/accessibility.js')}}"></script>
<script src="{{ asset('assets/plugins/apexcharts-bundle/js/apexcharts.min.js')}}"></script>
@endpush