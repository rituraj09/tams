@extends('school.layout.default')
@section('content')
@inject('provider', 'App\Helpers\Helper')

<h1 class="h3 mb-4 text-gray-800">Preview Attendance</h1>

<div class="row">
    <div class="col-lg-12"> 
        <div class="card shadow mb-4">   
            <div class="card-header py-3">
                <div class="row no-gutters align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary col mr-2">Attendance for the date: {{ $date }}</h6>
        
                </div>
            </div>              
            <div class="card-body">
            @include('include.message')             
                <div class="row">
                    <div class="col-md-12">     
                        <div class="table-responsive">               
                        <table class="table  table-bordered"  cellspacing="0">
                        <thead>
                        <tr>
                            <th width="8%"> Sl No</th>
                            <th >Name</th> 
                            <th >Code</th>
                            <th >Shift Start</th>
                            <th >Shift End</th> 
                            <th >In Time</th> 
                            <th >Out Time</th> 
                            <th  >Attendance Status</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($results as $k => $v)
                            <tr>
                                <td> {{ $k+1 }}</td>
                                <?php $uid= $v['emp_code'] ?>

                                <td>{{$provider->getname($uid, $school_id)->first_name  }}  {{$provider->getname($uid, $school_id)->last_name  }}</td>
                                <td>  {{  $v['emp_code'] }} </td> 
                                <td> {{ $shift_start}}</td>
                                <td> {{ $shift_end }}</td>
                                <td> {{  $v['in_time']->format('H:i:s')    }}</td>
                                <td> {{  $v['out_time']->format('H:i:s')  }}</td>       
                                <td>
                                  @if($v['status']=='P')
                                    Present
                                    @else
                                    Absent
                                  @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@stop
 
 