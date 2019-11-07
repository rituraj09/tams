@extends('school.layout.default')
@section('content')
@inject('provider', 'App\Helpers\Helper')

<h1 class="h3 mb-4 text-gray-800">Preview Attendance</h1>

<div class="row">
    <div class="col-lg-12"> 
    {!! Form::open(array('route' => 'school.attendance.savedata', 'id' => 'school.attendance.savedata', 'class' => 'form-horizontal bucket-form',  'onsubmit' => 'return confirmSubmit()', 'files' => true ,  'method' => 'post' )) !!}
          @csrf
          <?php $nodata=0; ?>
        <div class="card shadow mb-4">   
            <div class="card-header py-3">
                <div class="row no-gutters align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary col mr-2">Attendance for the date: {{ $date }}</h6>
                    <div class="pull-right col-auto">
                     <span class="text-danger">All text fields are mandatory!</span>
                    </div>
           
                </div>
            </div>              
            <div class="card-body">
            <?php $err=0;?>
            @include('include.message')             
                <div class="row">
                    <div class="col-md-12">     
                        <div class="table-responsive">        
                        {{ Form::hidden('school_id', $school_id , array('id' => 'school_id')) }}     
                        {{ Form::hidden('date', $date, array('id' => 'date')) }}        
                        <small> <table class="table  table-bordered"  cellspacing="0">
                        <thead>
                        <tr>
                            <th width="6%"> Sl No</th>
                            <th >Name</th> 
                            <th >Biometric Code</th>
                            <th >Shift Start</th>
                            <th >Shift End</th> 
                            <th >In Time</th> 
                            <th >Out Time</th> 
                            <th  >Status </th>
                            @if($provider->getattand($date, $school_id) > 0) 
                            <th  >Reason</th>
                            @endif
                        </tr>
                        </thead>
                        <tbody>
                        @php
                        try {
                        @endphp
                            @foreach($results as $k => $v)
                            <tr>
                                <td>{{ $c= $k+1 }}</td>
                                <?php $uid= $v['emp_code'] ?> 
                                <?php $emp_id= $provider->getname($uid, $school_id)->id    ?>
                                {{ Form::hidden('sl[]', $c, array('id' => 'sl')) }}
                                {{ Form::hidden('unique_id[]', $emp_id, array('id' => 'unique_id')) }}
                                {{ Form::hidden('shift_start[]', $v['shift_start'], array('id' => 'shift_start')) }}
                                {{ Form::hidden('shift_end[]', $v['shift_end'], array('id' => 'shift_end')) }}
                                {{ Form::hidden('in_time[]', $v['in_time'], array('id' => 'in_time')) }}
                                {{ Form::hidden('out_time[]', $v['out_time'], array('id' => 'out_time')) }}  
                                <td>
                                    @if(empty($provider->getname($uid, $school_id)))
                                    Null
                                      <?php $nodata=1 ?>
                                    @else
                                    {{$provider->getname($uid, $school_id)->first_name  }}  {{$provider->getname($uid, $school_id)->last_name  }}
                                    @endif
                                </td>
                                <td>  {{  $v['emp_code'] }} </td> 
                                <td> {{ $shift_start}} 
                                </td>
                                <td> {{ $shift_end }}<br> 
                               
                                </td>
                                
                                <td>
                          
                                @if($provider->getattand($date, $school_id) > 0)
                                <?php $attndid = $provider->getattand($date, $school_id);
                                
                                $attndtype = $provider->getAttendanceType($emp_id, $attndid)->attendance_type;
                               
                                ?>
                                    @if(empty($v['in_time']) && $attndtype == "2")  
                                        <i class="fa fa-flag text-danger"><i>
                                     
                                    @elseif(empty($v['in_time']) && $attndtype == 3)  
                                        On Leave
                                    @elseif(empty($v['in_time']) && $attndtype == 1)  
                                       <i class="text-danger">ERROR</i>
                                       <?php $err=1; ?>
                                    @else
                                        {{  $v['in_time']->format('H:i:s')    }}
                                    @endif
                                @else 
                                    @if(empty($v['in_time']) )  
                                        <i class="fa fa-flag text-danger"><i> 
                                    @else
                                        {{  $v['in_time']->format('H:i:s')    }}
                                    @endif
                                @endif
                               
                                 </td>
                                <td> 
                                
                                @if($provider->getattand($date, $school_id) > 0)
                                    @if($attndtype == 3)
                                            On Leave
                                    @else
                                        @if(empty($v['out_time'] ))
                                        <i class="fa fa-flag text-danger"><i>
                                    
                                        @else
                                        {{  $v['out_time']->format('H:i:s')  }}
                                        @endif 
                                    @endif
                                @else
                                    @if(!empty($v['out_time'] )) 
                                        {{  $v['out_time']->format('H:i:s')  }}
                                    @endif
                                @endif 
                                </td>       
                                <td>
                                
                                @if($provider->getattand($date, $school_id) == 0)

                                    @if($v['status']=='A')
                                        <select name="attendance_type[]" id="attendance_type">
                                            <option value="2" >Absent</option>
                                            <option value="3"  >Leave</option>
                                        </select>
                                    @else     
                                        Present
                                         {{ Form::hidden('attendance_type[]', 1, array('id' => 'attendance_type')) }}  
                                    
                                    @endif
                                    
                                @elseif($provider->getattand($date, $school_id) > 0) 

                                    @if($v['status']=='P')
                                         Present
                                         {{ Form::hidden('attendance_type[]', 1, array('id' => 'attendance_type')) }} 

                                    @elseif($v['status']=='A')
                                        <select name="attendance_type[]" id="attendance_type">
                                            <option value="2" {{ $provider->getAttendanceType( $emp_id, $attndid)->attendance_type == 2 ? 'selected' : '' }}>Absent</option>
                                            <option value="3" {{ $provider->getAttendanceType( $emp_id, $attndid)->attendance_type == 3 ? 'selected' : '' }}>Leave</option>
                                        </select>
                                    @else                                          
                                    {{ Form::hidden('attendance_type[]', 4, array('id' => 'attendance_type')) }} 
                                                MIS
                                    @endif
                                  @endif
                                </td>
                                @if($provider->getattand($date, $school_id) > 0) 
                                <td>
                                
                                    @if(empty($v['out_time']) && !empty($v['in_time']))
                                    <textarea id="remarks" class="form-control" placeholder="Reason must require!" name="remarks[]" required rows="3"></textarea>
                                    @else
                                    {{ Form::hidden('remarks[]', '', array('id' => 'remarks')) }}
                                    @endif
                                </td>
                                @else 
                                    {{ Form::hidden('remarks[]', '', array('id' => 'remarks')) }}
                                @endif
                            </tr>
                            @endforeach
                            @php
                        } catch (Exception $e) {
        
                            }
                        @endphp
                        </tbody>
                        </table></small>
                       
                        
                        </div>
                    </div>

                </div>  
                @if($provider->getattand($date, $school_id) == '0' && $provider->firsthalf($date) == '1')
                <div class="row">
                     <div class="col-md-12  py-3">
                         <div class="pull-right col-md-3">   

                         <textarea id="reason" class="form-control" placeholder="Reason of late upload must require!" name="reason" required rows="3"></textarea>    
                         </div> 
                     </div>
                     </div>
                @else
                    {{ Form::hidden('reason', '', array('id' => 'reason')) }}
                @endif
                @if($nodata==1)
                <div class="row">
                     <div class="col-md-12  py-3">
                         <div class="pull-right col-md-5">   
                         <div class="alert alert-class alert-danger">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                           New Teacher's record(s) has not added to the database!
                        </div> 
                        </div>
                    </div>
                </div>
                @endif
                    <div class="row">
                        <div class="col-md-12   py-3">
                            <div class="pull-right col-auto">
                                    <a href="{{ route('school.attendance.upload') }}"    class="btn  btn-sm btn-warning btn-icon-split ">
                                        <span class="icon text-white-100">
                                                    <i class="fas fa-arrow-left"></i>
                                                </span>
                                                <span class="text ">Back</span>
                                    </a>
                                    @if($nodata==0)
                                        @if($err==0)
                                            <button type="submit"  class="btn btn-success btn-sm btn-icon-split ">
                                                    <span class="icon text-white-100">
                                                        <i class="fas fa-save"></i>
                                                </span>
                                                <span class="text ">Submit</span>
                                            </button> 
                                        @else
                                        <i class="text-danger"> Error: Excel Sheet has been trying to manupulate!</i>
                                        @endif
                                    @endif
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>

@stop
 
 