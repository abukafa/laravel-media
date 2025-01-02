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
      <div class="col-xl-6 col-md-3 col-6 mb-4">
        <div class="card">
          <div class="card-header pb-0">
            <h5 class="card-title mb-0">Alquran</h5>
            <small class="text-muted">Average</small>
          </div>
          <div id="salesLastYear"></div>
          <div class="card-body pt-1">
            <div class="d-flex justify-content-between align-items-center mt-3 gap-3">
              <h4 class="mb-0">{{ !$data['average']['adab'] ? 0 : round(($data['average']['adab'] + $data['average']['tahfidzh'] + $data['average']['tajwid'] + $data['average']['tahsin']) / 4, 1) }}</h4>
            </div>
          </div>
        </div>
      </div>
      <!-- Total Tsaqofah -->
      <div class="col-xl-6 col-md-3 col-6 mb-4">
        <div class="card">
          <div class="card-header pb-0">
            <h5 class="card-title mb-0">Tsaqofah</h5>
            <small class="text-muted">Average</small>
          </div>
          <div class="card-body pt-1">
            <div id="sessionsLastMonth"></div>
            <div class="d-flex justify-content-between align-items-center mt-3 gap-3">
              <h4 class="mb-0">{{ !$data['average']['sikap'] ? 0 : round(($data['average']['sikap'] + $data['average']['paham']) / 2, 1) }}</h4>
            </div>
          </div>
        </div>
      </div>
      <!-- Total Dirosah -->
      <div class="col-xl-6 col-md-3 col-6 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="badge p-2 bg-label-info mb-2 rounded"><i class="ti ti-chart-bar ti-md"></i></div>
            <h5 class="card-title mb-1 pt-2">Dirosah</h5>
            <small class="text-muted">Average</small>
            <div class="pt-4">
              <h4 class="mb-2 mt-1">{{ !$data['dirosah']['value'] ? 0 : round(array_sum($data['dirosah']['value']) / count($data['dirosah']['value']), 1) }}</h4>
            </div>
          </div>
        </div>
      </div>
      <!-- Total Multimedia -->
      <div class="col-xl-6 col-md-3 col-6 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="badge p-2 bg-label-danger mb-2 rounded"><i class="ti ti-device-gamepad-2 ti-md"></i></div>
            <h5 class="card-title mb-1 pt-2">Multimedia</h5>
            <small class="text-muted">Average</small>
            <div class="pt-4">
              <h4 class="mb-2 mt-1">{{ !$data['ict']['value'] ? 0 : round(array_sum($data['ict']['value']) / count($data['ict']['value']), 1) }}</h4>
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
            <a href="javascript:void(0);" class="nav-link btn active d-flex flex-column align-items-center justify-content-center" role="tab" data-bs-toggle="tab" data-bs-target="#navs-adabs-id" aria-controls="navs-adabs-id" aria-selected="true">
              <div class="badge bg-label-secondary rounded p-2"><i class="ti ti-album ti-sm"></i></div>
              <h6 class="tab-widget-title mb-0 mt-2">Adab</h6>
            </a>
          </li>
          <li class="nav-item">
            <a href="javascript:void(0);" class="nav-link btn d-flex flex-column align-items-center justify-content-center" role="tab" data-bs-toggle="tab" data-bs-target="#navs-tahfidzh-id" aria-controls="navs-tahfidzh-id" aria-selected="false">
              <div class="badge bg-label-secondary rounded p-2"><i class="ti ti-ad-2 ti-sm"></i></div>
              <h6 class="tab-widget-title mb-0 mt-2">Tahfidz</h6>
            </a>
          </li>
          <li class="nav-item">
            <a href="javascript:void(0);" class="nav-link btn d-flex flex-column align-items-center justify-content-center" role="tab" data-bs-toggle="tab" data-bs-target="#navs-tajwid-id" aria-controls="navs-tajwid-id" aria-selected="false">
              <div class="badge bg-label-secondary rounded p-2"><i class="ti ti-adjustments-horizontal ti-sm"></i></div>
              <h6 class="tab-widget-title mb-0 mt-2">Tajwid</h6>
            </a>
          </li>
          <li class="nav-item">
            <a href="javascript:void(0);" class="nav-link btn d-flex flex-column align-items-center justify-content-center" role="tab" data-bs-toggle="tab" data-bs-target="#navs-tahsin-id" aria-controls="navs-tahsin-id" aria-selected="false">
              <div class="badge bg-label-secondary rounded p-2"><i class="ti ti-activity ti-sm"></i></div>
              <h6 class="tab-widget-title mb-0 mt-2">Fasohah</h6>
            </a>
          </li>
        </ul>
        <div class="tab-content p-0 ms-0 ms-sm-2">
          <div class="tab-pane fade show active" id="navs-adabs-id" role="tabpanel">
            <div id="earningReportsTabsAdabs"></div>
          </div>
          <div class="tab-pane fade" id="navs-tahfidzh-id" role="tabpanel">
            <div id="earningReportsTabsTahfidzh"></div>
          </div>
          <div class="tab-pane fade" id="navs-tajwid-id" role="tabpanel">
            <div id="earningReportsTabsTajwid"></div>
          </div>
          <div class="tab-pane fade" id="navs-tahsin-id" role="tabpanel">
            <div id="earningReportsTabsTahsin"></div>
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

          @for ($i = 0; $i < count($data['ict']['subject']); $i++)
          <li class="d-flex mb-4 pb-1 align-items-center">
            <img src="{{ asset('assets/img/icons/brands/' . $data['ict']['subject'][$i] . '.png') }}" height="28" class="me-3 rounded">
            <div class="d-flex w-100 align-items-center gap-2">
              <div class="d-flex justify-content-between flex-grow-1 flex-wrap">
                <div>
                  <h6 class="mb-0">{{ $data['ict']['subject'][$i] }}</h6>
                </div>
                <div class="user-progress d-flex align-items-center gap-2">
                  <h6 class="mb-0">{{ $data['ict']['value'][$i] }}</h6>
                </div>
              </div>
              <div class="chart-progress" data-color="{{ $colors[$i] }}" data-series="{{ $data['ict']['value'][$i] }}"></div>
            </div>
          </li>
          @endfor

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
          <small class="text-muted">One Semester Progress</small>
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

          @for ($i = 0; $i < count($data['dirosah']['subject']); $i++)
          <li class="mb-3 pb-1 d-flex">
            <div class="d-flex align-items-center me-3">
              <img src="{{asset('assets/img/icons/brands/' . $data['dirosah']['subject'][$i] . '.png')}}" class="me-3" width="35" />
              <div>
                <h6 class="mb-0">{{ $data['dirosah']['subject'][$i] }}</h6>
                <small class="text-muted">Bhs. Arab</small>
              </div>
            </div>
            <div class="d-flex flex-grow-1 align-items-center">
              <div class="progress w-100 me-3" style="height:8px;">
                @php
                    $c = $i > 4 ? $i % 4 : $i;
                @endphp
                <div class="progress-bar bg-{{ $colors[$c] }}" role="progressbar" style="width: {{ $data['dirosah']['value'][$i] }}%" aria-valuemin="0" aria-valuemax="100">
                </div>
              </div>
              <span class="text-muted">{{ $data['dirosah']['value'][$i] }}</span>
            </div>
          </li>
          @endfor

        </ul>
      </div>
    </div>
  </div>

  <!-- Last Project -->
  <div class="col-lg-6 mb-4 mb-lg-0 overflow-auto" style="max-height: 1024px">
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
              <th>NO</th>
              <th>SUBJECT</th>
              <th>DEADLINE</th>
            </tr>
          </thead>
          <tbody>

            @foreach ($projects as $project)
                <tr>
                    <td>
                        <p class="mb-0 fw-medium">{{ $loop->iteration }}</p>
                    </td>
                    <td>
                      <div class="align-self-center">
                        <p class="mb-0 fw-medium">{{ $project->subject }}</p>
                        @php $taskFound = false; @endphp
                        @foreach ($tasks as $task)
                            @if ($project->id == $task->project_id)
                                @php $taskFound = true; @endphp
                                <span class="badge bg-label-{{ $task->status=='Completed' ? 'primary' : ($task->status=='In Progress' ? 'success' : ($task->status=='Not Started' ? 'warning' : 'danger')) }}">{{ $project->theme }}</span>
                                @break
                            @endif
                        @endforeach
                        @if (!$taskFound)
                            <span class="badge bg-label-secondary">{{ $project->theme }}</span>
                        @endif
                      </div>
                    </td>
                    <td>
                        <div class="d-flex flex-column">
                            <p class="mb-0 fw-medium">{{ date_format(date_create($project->end_date), 'd M Y') }}</p>
                            <small class="text-muted text-nowrap">{{ date_format(date_create($project->start_date), 'd M Y') }}</small>
                        </div>
                    </td>
                </tr>
            @endforeach


          </tbody>
        </table>
      </div>
    </div>
  </div>
  <!-- Task Timeline -->
  <div class="col-lg-6 col-md-12" style="max-height: 1024px">

    <!-- Student -->
    <div class="card card-action mb-4 h-100 overflow-auto">
      <div class="card-body text-center">
        <div class="dropdown btn-pinned">
          <button type="button" class="btn dropdown-toggle hide-arrow p-0" data-bs-toggle="dropdown" aria-expanded="false"><i class="ti ti-dots-vertical text-muted"></i></button>
          <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="javascript:void(0);">Share connection</a></li>
            <li><a class="dropdown-item" href="javascript:void(0);">Block connection</a></li>
          </ul>
        </div>
        <div class="mx-auto my-3">
          <img src="{{ Auth::user()->image && file_exists(public_path('storage/member/' . Auth::user()->image)) ? asset('storage/member/' . Auth::user()->image) : asset('assets/img/avatars/no.png') }}" alt="Avatar Image" class="rounded-circle w-px-100" />
        </div>
        <h4 class="mb-1 card-title">{{ implode(' ', array_slice(explode(' ', Auth::user()->name), 0, 2)) }}</h4>
        <span class="pb-1">{{ Auth::user()->role ?: 'Content Creator' }}</span>
        @php
          $total_tasks = 0;
          $total_done = 0;
          $total_rate = 0;
          foreach ($tasks as $key => $value) {
            if ($value->student_id == Auth::user()->id) {
              $total_tasks++;
              if ($value->status == 'Completed') {
                $total_done++;
              }
              $total_rate += $value->rate;
            }
          }
          @endphp
        <div class="my-3">
          @for ($i = 1; $i <= 5 ; $i++)
            @if ($i <= $total_rate/($total_done ?: 1))
              <i class="fa-solid fa-star text-primary"></i>
            @else
              <i class="fa-solid fa-star text-secondary"></i>
            @endif
          @endfor
        </div>
        <div class="d-flex align-items-center justify-content-around my-3 py-1">
          <div>
            <h4 class="mb-0">{{ $total_tasks }}</h4>
            <span>Tasks</span>
          </div>
          <div>
            <h4 class="mb-0">{{ $total_done }}</h4>
            <span>Completed</span>
          </div>
          <div>
            <h4 class="mb-0">{{ $total_rate }}</h4>
            <span>Rates</span>
          </div>
        </div>
      </div>
      <hr class="mt-0 mb-4">
      <div class="card-body pb-0">
        <ul class="timeline ms-1 mb-0">

          @foreach ($tasks as $item)
          <li class="timeline-item timeline-item-transparent">
            <span class="timeline-point timeline-point-{{ $item->status=='Completed' ? 'primary' : ($item->status=='In Progress' ? 'success' : ($item->status=='Not Started' ? 'warning' : 'danger')) }}"></span>
            <div class="timeline-event">
              <div class="timeline-header">
                <h6 class="mb-0">{{ $item->project_name }}</h6>
                <small class="text-muted">{{ date_format(date_create($item->date), 'd M Y') }}</small>
              </div>
              <p class="mb-2">{{ $item->name }}</p>
              @if ($item->accepted)
              <div class="d-flex flex-wrap">
                <div class="avatar me-2">
                  <img src="{{ file_exists(public_path('storage/guru/' . $item->teacher_id)) ? asset('storage/guru/' . $item->teacher_id) : asset('assets/img/avatars/no.png') }}" alt="Avatar" class="rounded-circle" />
                </div>
                <div class="ms-1">
                  <span class="mb-0">Accepted by: {{ $item->teacher_name }}</span>
                  <div style="font-size: 8px;">
                    @for ($i = 1; $i <= 5; $i++)
                      @if ($i <= $item->rate)
                        <i class="fa-solid fa-star text-primary"></i>
                      @else
                        <i class="fa-solid fa-star text-secondary"></i>
                      @endif
                    @endfor
                  </div>
                </div>
              </div>
              <p>{{ $item->review }}</p>
              @else
              <div class="d-flex flex-wrap gap-2 pt-1">
                <a href="javascript:void(0)" class="me-3">
                  <img src="{{asset('assets/img/icons/misc/doc.png') }}" alt="Document image" width="15" class="me-2">
                  <span class="fw-medium text-heading">{{ $item->review ?: $item->status }}</span>
                </a>
              </div>
              @endif
            </div>
          </li>
          @endforeach

        </ul>
      </div>
    </div>
  </div>
</div>

<script>
  var adabData = @json($data['adab'] ?? []);
  var tahfidzhData = @json($data['tahfidzh'] ?? []);
  var tajwidData = @json($data['tajwid'] ?? []);
  var tahsinData = @json($data['tahsin'] ?? []);
  var bulanData = @json($data['bulan'] ?? []);
  var quranSubjectData = @json($data['quran']['subject'] ?? []);
  var quranMonth5Data = @json($data['quran']['month_5'] ?? []);
  var quranMonth6Data = @json($data['quran']['month_6'] ?? []);
  var sikapData = @json($data['sikap'] ?? []);
  var pahamData = @json($data['paham'] ?? []);
  function averageWithoutNull(...arrays) {
      // Flatten the arrays and filter out null values
      const filteredNumbers = arrays
          .flat()
          .filter(value => value !== null);
      // Calculate the sum of numbers
      const sum = filteredNumbers.reduce((accumulator, currentValue) => accumulator + currentValue, 0);
      // Calculate the average
      const average = sum / filteredNumbers.length;
      return average;
  }

  let quranData = [];
  for (let i = 0; i < adabData.length; i++) {
      quranData.push(adabData[i] + tahfidzhData[i] + tajwidData[i] + tahsinData[i]);
  }
</script>

@endsection
