@extends('admin.layout.default')
@section('content')
@inject('provider', 'App\Helpers\Helper')
  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Inspector of Schools Dashboard</h1>
      @if($miss->count() > 0)
      <div class="pull-right col-auto"> <span class="text-danger">
   
      <span class="blinking"><i class="fa  fa-exclamation-triangle text-danger"></i></span> 
      <a href="#">Pending Schools to Upload data:- {{ $miss->count() }}</a>
      </span></div>
        @endif
    </div>

    <!-- Content Row -->
    <div class="row">

      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Schools</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$school}}</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-university fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Teachers</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$teacher}}</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-users fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Teachers on Duty</div>
                <div class="row no-gutters align-items-center">
                  <div class="col-auto">
                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ round($percent_of_Present) }} %</div>
                  </div>
                  <div class="col">
                    <div class="progress progress-sm mr-2">
                      <div class="progress-bar bg-info" role="progressbar" style="width: {{ $percent_of_Present }}%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Pending Requests Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Teachers Absent</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$teacher - $present - $leave}}</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-exclamation-triangle fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Content Row -->

    <div class="row">
  
  @foreach($lastattnd as $k => $v)
  <?php $k=$k+1; 
  $thatday = $provider->totalattendance($v->date);
  $att = $v->val*100/$thatday;
  ?>
    <input id="p_v{{$k}}" type="hidden" value="{{ $att}}" >
    <input id="p_d{{$k}}" type="hidden" value="{{ date('d-M', strtotime($v->date))  }}" >
  @endforeach

      <!-- Area Chart -->
      <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Overview</h6>
            <div class="dropdown no-arrow">
              <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                <div class="dropdown-header">Dropdown Header:</div>
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </div>
          </div>
          <!-- Card Body -->
          <div class="card-body">
            <div class="chart-area">
              <canvas id="myline"></canvas>
            </div>
          </div>
        </div>
      </div>

      <!-- Pie Chart -->
      <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Today Attendance</h6>
            <div class="dropdown no-arrow">
              <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                <div class="dropdown-header">Dropdown Header:</div>
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </div>
          </div>
          <!-- Card Body -->
          <div class="card-body">
            <div class="chart-pie pt-4 pb-2">
              <canvas id="myPie"></canvas>
            </div>
            <div class="mt-4 text-center small">
            @if(!empty($present))
              <span class="mr-2">
                <i class="fas fa-circle text-primary"></i> Present
              </span>
              @endif
              
              @if(!empty($absent))
              <span class="mr-2">
                <i class="fas fa-circle text-danger"></i> Absent
              </span>
              @endif
              
              @if(!empty($leave))
              <span class="mr-2">
                <i class="fas fa-circle text-info"></i> On leave
              </span>
              @endif
              @if(!empty($mis))
              <span class="mr-2">
                <i class="fas fa-circle text-warning"></i> MIS
              </span>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
    <input type="hidden" name="p_fld" id="p_fld" value="{{ $p }}" >
                  <input type="hidden" name="a_fld" id="a_fld" value="{{ $absent }}" >
                  <input type="hidden" name="l_fld" id="l_fld" value="{{ $leave }}" >
                  <input type="hidden" name="m_fld" id="m_fld" value="{{ $mis }}" >
    <!-- Content Row -->
    <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">School Info</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Sl</th>
                      <th>Name</th>
                      <th>Code</th>
                      <th>Total Teachers</th>
                      <th>Present</th>
                      <th>Absent</th>
                      <th>On Leave</th>
                    </tr>
                  </thead>
                 
                  <tbody>
                  @if (!empty($results)) 
                  @foreach($results as $k => $v)
                  
                    <tr>
                    <td>{{  $k+1 }}</td>
                      <td>{{ $v->name }} </td>
                      <td>{{ $v->code }} </td>
                      <td>{{ $provider->teachers($v->id)}}</td>
                     @if( $provider->attendance($v->id, $date)['status'] == 1  )
                      <td>{{ $provider->attendance($v->id, $date)['p']}}</td>
                      <td>{{ $provider->attendance($v->id, $date)['a']}}</td>
                      <td>{{ $provider->attendance($v->id, $date)['l']}}</td>
                      @else
                      <td >
                      <center> <i class="fa fa-flag text-danger" data-toggle="tooltip" data-placement="top"  title="Data not upload"></i></center>
                      </td>
                      <td >
                      <center> <i class="fa fa-flag text-danger" data-toggle="tooltip" data-placement="top"  title="Data not upload"></i></center>
                      </td>
                      <td >
                      <center> <i class="fa fa-flag text-danger" data-toggle="tooltip" data-placement="top"  title="Data not upload"></i></center>
                      </td>
                      @endif
                    </tr>
                    @endforeach
                  @endif
                  </tbody>
                </table>
              </div>
            </div>
          </div>
  </div>
  <!-- /.container-fluid -->
@stop