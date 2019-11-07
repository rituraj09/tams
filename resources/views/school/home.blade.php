@extends('school.layout.default')
@section('content')
@inject('provider', 'App\Helpers\Helper')
 
  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">School Dashboard</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

      <!-- Earnings (Monthly) Card Example -->
      

      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Staff</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $teacher}}</div>
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
                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Today Present</div>
                <div class="row no-gutters align-items-center">
                  <div class="col-auto">
                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $present }}</div>
                  </div>
                  <div class="col">
            
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
                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Today on Leave</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $leave }}</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-rocket fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Today absent</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $absent }}</div>
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

      <!-- Area Chart -->
      <div class="col-xl-8 col-lg-8">
        <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Upload Attendance</h6>
            
          </div>
          <!-- Card Body -->
          <div class="card-body">
            <div class="chart-area">
                {!! Form::open(array('route' => 'school.attendance.import', 'id' => 'school.attendance.import', 'class' => 'form-horizontal bucket-form',  'files' => true ,  'method' => 'post' )) !!}
                @csrf
                <input type="file" name="import_file" />
                    <button type="submit"  class="btn btn-primary">
                                  <span class="icon text-white-100">
                                      <i class="fas fa-upload"></i>
                                  </span>
                                  <span class="text ">Upload</span>
                              </button> 
                              
                    {!! Form::close() !!}
                    
              <input type="hidden" name="p_fld" id="p_fld" value="{{ $p }}" >
              <input type="hidden" name="a_fld" id="a_fld" value="{{ $absent }}" >
              <input type="hidden" name="l_fld" id="l_fld" value="{{ $leave }}" >
              <input type="hidden" name="m_fld" id="m_fld" value="{{ $mis }}" >

            
                    <div class="h-100 py-4">   
                      <div id="clock" class="dark">
                        <div class="display">
                          <div class="weekdays"></div>
                          <div class="ampm"></div>
                          <div class="alarm"></div>
                          <div class="digits" > </div>
                          <div class="todate">
                            <center> 
                              <span id="todate" style="font-family: 'Orbitron', sans-serif; text-align:center;"></span>       
                            </center>
                            </div>
                        </div>
                      </div>  
                    </div>
         
            </div>
          </div>
        </div>
      </div>

      <!-- Pie Chart -->
      <div class="col-xl-4 col-lg-4">
        <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Attendance Status</h6>
            
          </div>
          <!-- Card Body -->
          <div class="card-body">
            <div class="chart-pie pt-4 pb-2">
              <canvas id="myPie" ></canvas>
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

    <!-- Content Row -->
    <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Attendance Report</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
        
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                    <th>Sl</th>
                      <th>Name</th>
                      <th> Code</th>
                      <th>Shift Start</th>
                      <th>Shift End</th>
                      <th>In Time</th>
                      <th>Out Time</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                   
                  <tbody>
                  @if (!empty($results)) 
                  @foreach($results as $k => $v)
                  
                    <tr> 
                    <td>{{  $k+1 }}</td>
                      <td>{{ $v->emp->first_name }} {{ $v->emp->last_name }}
                       
                      </td>
                      <td>{{ $v->unique_id }}</td>
                      <td>{{ $provider->dateformatcontrol($v->shift_start)  }}</td>
                      <td>{{ $provider->dateformatcontrol($v->shift_end)  }}</td>
                      <td>
                   
                        @if( $v->attendance_type == "2")
                        <center> <i class="fa fa-flag text-danger"  data-toggle="tooltip" data-placement="top"  title="Absent"></i></center>
                        @elseif( $v->attendance_type == "3")
                        <center> <i class="fa fa-flag text-info" data-toggle="tooltip" data-placement="top"  title="On Leave"></i></center>
                        @else 
                          {{ date('H:i:s', strtotime($v->in_time )) }}
                        @endif 
                      </td>
                      <td>
                      @if(($v->upload_status=='0' && empty($v->out_time)) && $v->attendance_type == "1") 
                      <center> 
                        <i id="hhrs"></i>
                        <span class="blinking palybtn"  data-toggle="tooltip" data-placement="top"  title="Shift Running!"><i class=" fa fa-play-circle text-success"></i></span>
                        <span class="over blinking" data-toggle="tooltip" data-placement="top"  title="Shift Over, Please Upload the attendance!"> 
                          <i class="fas fa-upload text-danger"></i>
                      </span> 
                      </center>
                      @elseif( empty($v->out_time)  && ($v->attendance_type == "2" || $v->attendance_type == "3"))
                        @if( $v->attendance_type == "2")
                        <center><i class="fa fa-flag text-danger"  data-toggle="tooltip" data-placement="top"  title="Absent"></i></center>
                        @elseif( $v->attendance_type == "3")
                        <center><i class="fa fa-flag text-info"  data-toggle="tooltip" data-placement="top"  title="On Leave"></i></center>
                        @endif 
                      @elseif(( $v->upload_status == '1' && empty($v->out_time)) && $v->attendance_type == "4") 
                      <center><i class="fa fa-battery-quarter text-warning"  data-toggle="tooltip" data-placement="top"  title="Remarks: {{$v->remarks}}"></i></center>
                      @else 
                        {{ date('H:i:s', strtotime($v->out_time )) }} 
                      @endif
                      </td>
                      <td>
                       @if( $v->attendance_type == "1")
                       <i class="text-success"  data-toggle="tooltip" data-placement="top"  title="Present">Present</i>
                       @elseif( $v->attendance_type == "2")
                       <i class="text-danger"  data-toggle="tooltip" data-placement="top"  title="Absent">Absent</i>
                       @elseif( $v->attendance_type == "3")
                       <i class="text-info"  data-toggle="tooltip" data-placement="top"  title="On Leave">On Leave</i>
                       @else 
                       <i class="text-warning" data-toggle="tooltip" data-placement="top"  title="Remarks: {{$v->remarks}}">MIS</i>
                       @endif
                      </td>
                    </tr> 
                  @endforeach
                  @endif
                  </tbody>
                </table>
                  
              </div>
            </div>
          </div>
  </div>  
@stop