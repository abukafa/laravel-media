@extends('layouts/layoutMaster')

@section('title', 'Academic')

@section('vendor-style')
@vite(['resources/assets/vendor/libs/apex-charts/apex-charts.scss'])
@endsection

@section('vendor-script')
@vite(['resources/assets/vendor/libs/apex-charts/apexcharts.js'])
@endsection

@section('page-script')
@vite(['resources/assets/js/dashboards-crm.js'])
@endsection

@section('content')
<div class="row">

  <!-- Line Area Chart -->
  <div class="col-xl-8 mb-2 h-100">
    <div class="card">
      <div class="card-header d-flex justify-content-between">
      </div>
      <div class="card-body">
        <div id="lineAreaChart"></div>
      </div>
    </div>
  </div>
  <!-- /Line Area Chart -->

  <div class="col-xl-4 mb-2">
    <div class="row">
      <!-- Total Alquran -->
      <div class="col-xl-6 col-md-3 col-6 mb-4 mt-1">
        <div class="card">
          <div class="card-header pb-0">
            <h5 class="card-title mb-0">Alquran</h5>
            <small class="text-muted">Total Score</small>
          </div>
          <div id="salesLastYear"></div>
          <div class="card-body pt-0">
            <div class="d-flex justify-content-between align-items-center mt-3 gap-3">
              <h4 class="mb-0">75.2</h4>
              <small class="text-danger">-16.2%</small>
            </div>
          </div>
        </div>
      </div>
      <!-- Total Tsaqofah -->
      <div class="col-xl-6 col-md-3 col-6 mb-4 mt-1">
        <div class="card">
          <div class="card-header pb-0">
            <h5 class="card-title mb-0">Tsaqofah</h5>
            <small class="text-muted">Total Score</small>
          </div>
          <div class="card-body">
            <div id="sessionsLastMonth"></div>
            <div class="d-flex justify-content-between align-items-center mt-3 gap-3">
              <h4 class="mb-0">45.1</h4>
              <small class="text-success">+12.6%</small>
            </div>
          </div>
        </div>
      </div>
      <!-- Total Dirosah -->
      <div class="col-xl-6 col-md-3 col-6 mb-4 mt-1">
        <div class="card">
          <div class="card-body">
            <div class="badge p-2 bg-label-info mb-2 rounded"><i class="ti ti-chart-bar ti-md"></i></div>
            <h5 class="card-title mb-1 pt-2">Dirosah</h5>
            <small class="text-muted">Total Score</small>
            <p class="mb-2 mt-1">$4,673</p>
            <div class="pt-1">
              <span class="badge bg-label-secondary">+25.2%</span>
            </div>
          </div>
        </div>
      </div>
      <!-- Total Multimedia -->
      <div class="col-xl-6 col-md-3 col-6 mb-4 mt-1">
        <div class="card">
          <div class="card-body">
            <div class="badge p-2 bg-label-danger mb-2 rounded"><i class="ti ti-device-gamepad-2 ti-md"></i></div>
            <h5 class="card-title mb-1 pt-2">Multimedia</h5>
            <small class="text-muted">Total Score</small>
            <p class="mb-2 mt-1">81.2</p>
            <div class="pt-1">
              <span class="badge bg-label-secondary">-12.2%</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Revenue Growth -->
  {{-- <div class="col-xl-4 col-md-8 mb-4">
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between">
          <div class="d-flex flex-column">
            <div class="card-title mb-auto">
              <h5 class="mb-1 text-nowrap">Revenue Growth</h5>
              <small>Weekly Report</small>
            </div>
            <div class="chart-statistics">
              <h3 class="card-title mb-1">$4,673</h3>
              <span class="badge bg-label-success">+15.2%</span>
            </div>
          </div>
          <div id="revenueGrowth"></div>
        </div>
      </div>
    </div>
  </div> --}}

  <!-- Tsaqofah last 6 months -->
  <div class="col-md-6 col-xl-4 mb-4">
    <div class="card h-100">
      <div class="card-header d-flex justify-content-between">
        <div class="card-title mb-0">
          <h5 class="mb-0">Tsaqofah</h5>
          <small class="text-muted">Last 6 Months</small>
        </div>
        <div class="dropdown">
          <button class="btn p-0" type="button" id="salesLastMonthMenu" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="ti ti-dots-vertical ti-sm text-muted"></i>
          </button>
          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="salesLastMonthMenu">
            <a class="dropdown-item" href="javascript:void(0);">View More</a>
            <a class="dropdown-item" href="javascript:void(0);">Delete</a>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div id="salesLastMonth"></div>
      </div>
    </div>
  </div>

  <!-- Alquran Reports Tabs-->
  <div class="col-12 col-xl-8 mb-4">
    <div class="card">
      <div class="card-header d-flex justify-content-between">
        <div class="card-title mb-0">
          <h5 class="mb-0">Alquran</h5>
          <small class="text-muted">Scores Overview</small>
        </div>
        <div class="dropdown">
          <button class="btn p-0" type="button" id="earningReportsTabsId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="ti ti-dots-vertical ti-sm text-muted"></i>
          </button>
          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="earningReportsTabsId">
            <a class="dropdown-item" href="javascript:void(0);">View More</a>
            <a class="dropdown-item" href="javascript:void(0);">Delete</a>
          </div>
        </div>
      </div>
      <div class="card-body">
        <ul class="nav nav-tabs widget-nav-tabs pb-3 gap-4 mx-1 d-flex flex-nowrap" role="tablist">
          <li class="nav-item">
            <a href="javascript:void(0);" class="nav-link btn active d-flex flex-column align-items-center justify-content-center" role="tab" data-bs-toggle="tab" data-bs-target="#navs-orders-id" aria-controls="navs-orders-id" aria-selected="true">
              <div class="badge bg-label-secondary rounded p-2"><i class="ti ti-album ti-sm"></i></div>
              <h6 class="tab-widget-title mb-0 mt-2">Adab</h6>
            </a>
          </li>
          <li class="nav-item">
            <a href="javascript:void(0);" class="nav-link btn d-flex flex-column align-items-center justify-content-center" role="tab" data-bs-toggle="tab" data-bs-target="#navs-sales-id" aria-controls="navs-sales-id" aria-selected="false">
              <div class="badge bg-label-secondary rounded p-2"><i class="ti ti-ad-2 ti-sm"></i></div>
              <h6 class="tab-widget-title mb-0 mt-2">Tahfidz</h6>
            </a>
          </li>
          <li class="nav-item">
            <a href="javascript:void(0);" class="nav-link btn d-flex flex-column align-items-center justify-content-center" role="tab" data-bs-toggle="tab" data-bs-target="#navs-profit-id" aria-controls="navs-profit-id" aria-selected="false">
              <div class="badge bg-label-secondary rounded p-2"><i class="ti ti-adjustments-horizontal ti-sm"></i></div>
              <h6 class="tab-widget-title mb-0 mt-2">Tajwid</h6>
            </a>
          </li>
          <li class="nav-item">
            <a href="javascript:void(0);" class="nav-link btn d-flex flex-column align-items-center justify-content-center" role="tab" data-bs-toggle="tab" data-bs-target="#navs-income-id" aria-controls="navs-income-id" aria-selected="false">
              <div class="badge bg-label-secondary rounded p-2"><i class="ti ti-activity ti-sm"></i></div>
              <h6 class="tab-widget-title mb-0 mt-2">Fasohah</h6>
            </a>
          </li>
        </ul>
        <div class="tab-content p-0 ms-0 ms-sm-2">
          <div class="tab-pane fade show active" id="navs-orders-id" role="tabpanel">
            <div id="earningReportsTabsOrders"></div>
          </div>
          <div class="tab-pane fade" id="navs-sales-id" role="tabpanel">
            <div id="earningReportsTabsSales"></div>
          </div>
          <div class="tab-pane fade" id="navs-profit-id" role="tabpanel">
            <div id="earningReportsTabsProfit"></div>
          </div>
          <div class="tab-pane fade" id="navs-income-id" role="tabpanel">
            <div id="earningReportsTabsIncome"></div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- IT States -->
  <div class="col-md-4 mb-4">
    <div class="card h-100">
      <div class="card-header d-flex justify-content-between">
        <div class="card-title m-0 me-2">
          <h5 class="m-0 me-2">ICT & Multimedia</h5>
          <small class="text-muted">Average Completed</small>
        </div>
        <div class="dropdown">
          <button class="btn p-0" type="button" id="employeeList" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="ti ti-dots-vertical ti-sm text-muted"></i>
          </button>
          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="employeeList">
            <a class="dropdown-item" href="javascript:void(0);">Download</a>
            <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
            <a class="dropdown-item" href="javascript:void(0);">Share</a>
          </div>
        </div>
      </div>
      <div class="card-body">
        <ul class="p-0 m-0">
          <li class="d-flex mb-4 pb-1 align-items-center">
            <img src="{{asset('assets/img/icons/brands/chrome.png')}}" alt="Chrome" height="28" class="me-3 rounded">
            <div class="d-flex w-100 align-items-center gap-2">
              <div class="d-flex justify-content-between flex-grow-1 flex-wrap">
                <div>
                  <h6 class="mb-0">Google Chrome</h6>
                </div>

                <div class="user-progress d-flex align-items-center gap-2">
                  <h6 class="mb-0">90.4%</h6>
                </div>
              </div>
              <div class="chart-progress" data-color="secondary" data-series="85"></div>
            </div>
          </li>
          <li class="d-flex mb-4 pb-1 align-items-center">
            <img src="{{asset('assets/img/icons/brands/safari.png')}}" alt="Safari" height="28" class="me-3 rounded">
            <div class="d-flex w-100 align-items-center gap-2">
              <div class="d-flex justify-content-between flex-grow-1 flex-wrap">
                <div>
                  <h6 class="mb-0">Apple Safari</h6>
                </div>
                <div class="user-progress d-flex align-items-center gap-2">
                  <h6 class="mb-0">70.6%</h6>
                </div>
              </div>
              <div class="chart-progress" data-color="success" data-series="70"></div>
            </div>
          </li>
          <li class="d-flex mb-4 pb-1 align-items-center">
            <img src="{{asset('assets/img/icons/brands/firefox.png')}}" alt="Firefox" height="28" class="me-3 rounded">
            <div class="d-flex w-100 align-items-center gap-2">
              <div class="d-flex justify-content-between flex-grow-1 flex-wrap">
                <div>
                  <h6 class="mb-0">Mozilla Firefox</h6>
                </div>
                <div class="user-progress d-flex align-items-center gap-2">
                  <h6 class="mb-0">35.5%</h6>
                </div>
              </div>
              <div class="chart-progress" data-color="primary" data-series="25"></div>
            </div>
          </li>
          <li class="d-flex mb-4 pb-1 align-items-center">
            <img src="{{asset('assets/img/icons/brands/opera.png')}}" alt="Opera" height="28" class="me-3 rounded">
            <div class="d-flex w-100 align-items-center gap-2">
              <div class="d-flex justify-content-between flex-grow-1 flex-wrap">
                <div>
                  <h6 class="mb-0">Opera Mini</h6>
                </div>

                <div class="user-progress d-flex align-items-center gap-2">
                  <h6 class="mb-0">80.0%</h6>
                </div>
              </div>
              <div class="chart-progress" data-color="danger" data-series="75"></div>
            </div>
          </li>
          <li class="d-flex align-items-center">
            <img src="{{asset('assets/img/icons/brands/brave.png')}}" alt="Brave" height="28" class="me-3 rounded">
            <div class="d-flex w-100 align-items-center gap-2">
              <div class="d-flex justify-content-between flex-grow-1 flex-wrap">
                <div>
                  <h6 class="mb-0">Brave</h6>
                </div>
                <div class="user-progress d-flex align-items-center gap-2">
                  <h6 class="mb-0">46.3%</h6>
                </div>
              </div>
              <div class="chart-progress" data-color="warning" data-series="45"></div>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>

  <!-- Active Dirosah -->
  <div class="col-md-8 mb-4">
    <div class="card h-100">
      <div class="card-header d-flex justify-content-between">
        <div class="card-title mb-0">
          <h5 class="mb-0">Dirosah Islamiyah</h5>
          <small class="text-muted">1 Semester Progress</small>
        </div>
        <div class="dropdown">
          <button class="btn p-0" type="button" id="activeProjects" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="ti ti-dots-vertical ti-sm text-muted"></i>
          </button>
          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="activeProjects">
            <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
            <a class="dropdown-item" href="javascript:void(0);">Download</a>
            <a class="dropdown-item" href="javascript:void(0);">View All</a>
          </div>
        </div>
      </div>
      <div class="card-body">
        <ul class="p-0 m-0">
          <li class="mb-3 pb-1 d-flex">
            <div class="d-flex align-items-center me-3">
              <img src="{{asset('assets/img/icons/brands/laravel-logo.png')}}" alt="laravel-logo" class="me-3" width="35" />
              <div>
                <h6 class="mb-0">Laravel</h6>
                <small class="text-muted">eCommerce</small>
              </div>
            </div>
            <div class="d-flex flex-grow-1 align-items-center">
              <div class="progress w-100 me-3" style="height:8px;">
                <div class="progress-bar bg-danger" role="progressbar" style="width: 54%" aria-valuenow="54" aria-valuemin="0" aria-valuemax="100">
                </div>
              </div>
              <span class="text-muted">54%</span>
            </div>
          </li>
          <li class="mb-3 pb-1 d-flex">
            <div class="d-flex align-items-center me-3">
              <img src="{{asset('assets/img/icons/brands/figma-logo.png')}}" alt="figma-logo" class="me-3" width="35" />
              <div>
                <h6 class="mb-0">Figma</h6>
                <small class="text-muted">App UI Kit</small>
              </div>
            </div>
            <div class="d-flex flex-grow-1 align-items-center">
              <div class="progress w-100 me-3" style="height:8px;">
                <div class="progress-bar bg-primary" role="progressbar" style="width: 86%" aria-valuenow="86" aria-valuemin="0" aria-valuemax="100">
                </div>
              </div>
              <span class="text-muted">86%</span>
            </div>
          </li>
          <li class="mb-3 pb-1 d-flex">
            <div class="d-flex align-items-center me-3">
              <img src="{{asset('assets/img/icons/brands/vue-logo.png')}}" alt="vue-logo" class="me-3" width="35" />
              <div>
                <h6 class="mb-0">VueJs</h6>
                <small class="text-muted">Calendar App</small>
              </div>
            </div>
            <div class="d-flex flex-grow-1 align-items-center">
              <div class="progress w-100 me-3" style="height:8px;">
                <div class="progress-bar bg-success" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">
                </div>
              </div>
              <span class="text-muted">90%</span>
            </div>
          </li>
          <li class="mb-3 pb-1 d-flex">
            <div class="d-flex align-items-center me-3">
              <img src="{{asset('assets/img/icons/brands/react-logo.png')}}" alt="react-logo" class="me-3" width="35" />
              <div>
                <h6 class="mb-0">React</h6>
                <small class="text-muted">Dashboard</small>
              </div>
            </div>
            <div class="d-flex flex-grow-1 align-items-center">
              <div class="progress w-100 me-3" style="height:8px;">
                <div class="progress-bar bg-info" role="progressbar" style="width: 37%" aria-valuenow="37" aria-valuemin="0" aria-valuemax="100">
                </div>
              </div>
              <span class="text-muted">37%</span>
            </div>
          </li>
          <li class="mb-3 pb-1 d-flex">
            <div class="d-flex align-items-center me-3">
              <img src="{{asset('assets/img/icons/brands/bootstrap-logo.png')}}" alt="bootstrap-logo" class="me-3" width="35" />
              <div>
                <h6 class="mb-0">Bootstrap</h6>
                <small class="text-muted">Website</small>
              </div>
            </div>
            <div class="d-flex flex-grow-1 align-items-center">
              <div class="progress w-100 me-3" style="height:8px;">
                <div class="progress-bar bg-primary" role="progressbar" style="width: 22%" aria-valuenow="22" aria-valuemin="0" aria-valuemax="100">
                </div>
              </div>
              <span class="text-muted">22%</span>
            </div>
          </li>
          <li class="d-flex">
            <div class="d-flex align-items-center me-3">
              <img src="{{asset('assets/img/icons/brands/sketch-logo.png')}}" alt="sketch-logo" class="me-3" width="35" />
              <div>
                <h6 class="mb-0">Sketch</h6>
                <small class="text-muted">Website Design</small>
              </div>
            </div>
            <div class="d-flex flex-grow-1 align-items-center">
              <div class="progress w-100 me-3" style="height:8px;">
                <div class="progress-bar bg-warning" role="progressbar" style="width: 29%" aria-valuenow="29" aria-valuemin="0" aria-valuemax="100">
                </div>
              </div>
              <span class="text-muted">29%</span>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>

  <!-- Last Project -->
  <div class="col-lg-6 mb-4 mb-lg-0">
    <div class="card h-100">
      <div class="card-header d-flex justify-content-between">
        <h5 class="card-title m-0 me-2">Projects Planned</h5>
        <div class="dropdown">
          <button class="btn p-0" type="button" id="teamMemberList" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="ti ti-dots-vertical ti-sm text-muted"></i>
          </button>
          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="teamMemberList">
            <a class="dropdown-item" href="javascript:void(0);">Download</a>
            <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
            <a class="dropdown-item" href="javascript:void(0);">Share</a>
          </div>
        </div>
      </div>
      <div class="table-responsive">
        <table class="table table-borderless border-top">
          <thead class="border-bottom">
            <tr>
              <th>CARD</th>
              <th>DATE</th>
              <th>STATUS</th>
              <th>TREND</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <div class="d-flex justify-content-start align-items-center">
                  <div class="me-3">
                    <img src="{{asset('assets/img/icons/payments/visa-img.png')}}" alt="Visa" height="30">
                  </div>
                  <div class="d-flex flex-column">
                    <p class="mb-0 fw-medium">*4230</p><small class="text-muted">Credit</small>
                  </div>
                </div>
              </td>
              <td>
                <div class="d-flex flex-column">
                  <p class="mb-0 fw-medium">Sent</p>
                  <small class="text-muted text-nowrap">17 Mar 2022</small>
                </div>
              </td>
              <td><span class="badge bg-label-success">Verified</span></td>
              <td>
                <p class="mb-0 fw-medium">+$1,678</p>
              </td>
            </tr>
            <tr>
              <td>
                <div class="d-flex justify-content-start align-items-center">
                  <div class="me-3">
                    <img src="{{asset('assets/img/icons/payments/master-card-img.png')}}" alt="Visa" height="30">
                  </div>
                  <div class="d-flex flex-column">
                    <p class="mb-0 fw-medium">*5578</p><small class="text-muted">Credit</small>
                  </div>
                </div>
              </td>
              <td>
                <div class="d-flex flex-column">
                  <p class="mb-0 fw-medium">Sent</p>
                  <small class="text-muted text-nowrap">12 Feb 2022</small>
                </div>
              </td>
              <td><span class="badge bg-label-danger">Rejected</span></td>
              <td>
                <p class="mb-0 fw-medium">-$839</p>
              </td>
            </tr>
            <tr>
              <td>
                <div class="d-flex justify-content-start align-items-center">
                  <div class="me-3">
                    <img src="{{asset('assets/img/icons/payments/american-express-img.png')}}" alt="Visa" height="30">
                  </div>
                  <div class="d-flex flex-column">
                    <p class="mb-0 fw-medium">*4567</p><small class="text-muted">Credit</small>
                  </div>
                </div>
              </td>
              <td>
                <div class="d-flex flex-column">
                  <p class="mb-0 fw-medium">Sent</p>
                  <small class="text-muted text-nowrap">28 Feb 2022</small>
                </div>
              </td>
              <td><span class="badge bg-label-success">Verified</span></td>
              <td>
                <p class="mb-0 fw-medium">+$435</p>
              </td>
            </tr>
            <tr>
              <td>
                <div class="d-flex justify-content-start align-items-center">
                  <div class="me-3">
                    <img src="{{asset('assets/img/icons/payments/visa-img.png')}}" alt="Visa" height="30">
                  </div>
                  <div class="d-flex flex-column">
                    <p class="mb-0 fw-medium">*5699</p><small class="text-muted">Credit</small>
                  </div>
                </div>
              </td>
              <td>
                <div class="d-flex flex-column">
                  <p class="mb-0 fw-medium">Sent</p>
                  <small class="text-muted text-nowrap">8 Jan 2022</small>
                </div>
              </td>
              <td><span class="badge bg-label-secondary">Pending</span></td>
              <td>
                <p class="mb-0 fw-medium">+$2,345</p>
              </td>
            </tr>
            <tr>
              <td>
                <div class="d-flex justify-content-start align-items-center">
                  <div class="me-3">
                    <img src="{{asset('assets/img/icons/payments/visa-img.png')}}" alt="Visa" height="30">
                  </div>
                  <div class="d-flex flex-column">
                    <p class="mb-0 fw-medium">*5699</p><small class="text-muted">Credit</small>
                  </div>
                </div>
              </td>
              <td>
                <div class="d-flex flex-column">
                  <p class="mb-0 fw-medium">Sent</p>
                  <small class="text-muted text-nowrap">8 Jan 2022</small>
                </div>
              </td>
              <td><span class="badge bg-label-danger">Rejected</span></td>
              <td>
                <p class="mb-0 fw-medium">-$234</p>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <!-- Task Timeline -->
  <div class="col-lg-6 col-md-12">
    <div class="card">
      <div class="card-header d-flex justify-content-between">
        <h5 class="card-title m-0 me-2 pt-1 mb-2 d-flex align-items-center"><i class="ti ti-list-details ms-n1 me-2"></i> Tasks Timeline</h5>
        <div class="dropdown">
          <button class="btn p-0" type="button" id="timelineWapper" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="ti ti-dots-vertical ti-sm text-muted"></i>
          </button>
          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="timelineWapper">
            <a class="dropdown-item" href="javascript:void(0);">Download</a>
            <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
            <a class="dropdown-item" href="javascript:void(0);">Share</a>
          </div>
        </div>
      </div>
      <div class="card-body pb-0">
        <ul class="timeline ms-1 mb-0">
          <li class="timeline-item timeline-item-transparent ps-4">
            <span class="timeline-point timeline-point-warning"></span>
            <div class="timeline-event">
              <div class="timeline-header">
                <h6 class="mb-0">Client Meeting</h6>
                <small class="text-muted">Today</small>
              </div>
              <p class="mb-2">Project meeting with john @10:15am</p>
              <div class="d-flex flex-wrap">
                <div class="avatar me-2">
                  <img src="{{asset('assets/img/avatars/3.png')}}" alt="Avatar" class="rounded-circle" />
                </div>
                <div class="ms-1">
                  <h6 class="mb-0">Lester McCarthy (Client)</h6>
                  <span>CEO of Infibeam</span>
                </div>
              </div>
            </div>
          </li>
          <li class="timeline-item timeline-item-transparent ps-4">
            <span class="timeline-point timeline-point-primary"></span>
            <div class="timeline-event">
              <div class="timeline-header">
                <h6 class="mb-0">Create a new project for client</h6>
                <small class="text-muted">2 Day Ago</small>
              </div>
              <p class="mb-0">Add files to new design folder</p>
            </div>
          </li>
          <li class="timeline-item timeline-item-transparent ps-4">
            <span class="timeline-point timeline-point-info"></span>
            <div class="timeline-event">
              <div class="timeline-header">
                <h6 class="mb-0">Shared 2 New Project Files</h6>
                <small class="text-muted">6 Day Ago</small>
              </div>
              <p class="mb-2">Sent by Mollie Dixon</p>
              <div class="d-flex flex-wrap gap-2 pt-1">
                <a href="javascript:void(0)" class="me-3 d-flex align-items-center">
                  <i class="ti ti-file-text text-warning me-2 ti-xs"></i>
                  <span class="fw-medium text-heading">App Guidelines</span>
                </a>
                <a href="javascript:void(0)" class="d-flex align-items-center">
                  <i class="ti ti-table text-success me-2 ti-xs"></i>
                  <span class="fw-medium text-heading">Testing Results</span>
                </a>
              </div>
            </div>
          </li>
          <li class="timeline-item timeline-item-transparent ps-4 border-transparent">
            <span class="timeline-point timeline-point-secondary"></span>
            <div class="timeline-event pb-0">
              <div class="timeline-header">
                <h6 class="mb-0">Project status updated</h6>
                <small class="text-muted">10 Day Ago</small>
              </div>
              <p class="mb-0">Woocommerce iOS App Completed</p>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>
@endsection
