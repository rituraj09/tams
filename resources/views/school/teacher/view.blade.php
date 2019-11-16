@extends('school.layout.default')
@section('content')
<h1 class="h3 mb-4 text-gray-800">Teacher</h1>

<div class="row">
    <div class="col-lg-12"> 
        <div class="card shadow mb-4">   
            <div class="card-header py-3">
                <div class="row no-gutters align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary col mr-2">View Teacher</h6>
      
        
                </div>
            </div>              
            <div class="card-body">

            @include('include.message')        
                   
                <div class="row">
                    <div class="col-md-12">     
                        <div class="table-responsive">    
                        <table class="table  table-bordered"  id="dataTable" cellspacing="0">
                            <thead>
                            <tr>
                                <th width="8%"> Sl No</th>
                                <th width="10%">Biometric Code</th> 
                                <th >Full Name</th>
                                <th >Mobile Number</th>
                                <th >Employee type</th> 
                                <th >Retirement Date</th> 
                                <th  >Transactions</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($results as $k => $v)
                                <tr>
                                    <td> {{ $k+1 }} </td>
                                    <td> {{ $v->unique_id  }} </td>
                                    <td>  {{ $v->first_name }} {{ $v->last_name }} </td> 
                                    <td>{{ $v->phone }}</td>
                                    <td> {{ $v->employee_types->name }}</td>
                                    <td>
                                    {{  date('d-M-Y', strtotime($v->dor)) }}
                                        </td>                    
                                    <td> 
                                    <center>
                                    <form id="delete-form" action="{{ route('school.teacher.delete', Crypt::encrypt($v->id)) }}" onsubmit="return confirmDelete();" method="POST" >
                                    
                                        <a href="#" onclick="getdetails({{ $v->id}})"  data-toggle="modal" data-target="#viewModal"    class="btn btn-primary btn-circle btn-sm"><i class="fa fa-search "></i></a>
                                        <a href="{{ route('school.teacher.edit', Crypt::encrypt($v->id)) }}"  data-toggle="tooltip" data-placement="top"  title="Edit" class="btn btn-info  btn-circle btn-sm"><i class="fa fa-pencil "></i></a>
                                        {{ csrf_field() }}
                                        <button   data-toggle="tooltip"  data-placement="top"  title="Delete"    class="btn btn-danger btn-circle btn-sm" ><i class="fa fa-trash-o"></i></button>
                                    </form>
                                    </center>
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