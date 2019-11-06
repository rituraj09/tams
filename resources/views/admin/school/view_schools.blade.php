@extends('admin.layout.default')
@section('content')

<h1 class="h3 mb-4 text-gray-800">Schools</h1>
<small>
<div class="row">
    <div class="col-lg-12"> 
        <div class="card shadow mb-4">   
            <div class="card-header py-3">
                <div class="row no-gutters align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary col mr-2">View Schools</h6>
        
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
                            <th >School Name</th> 
                            <th >School Code</th>
                            <th >Phone No.</th>
                            <th >Email</th> 
                            <th  ></th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($results as $k => $v)
                            <tr>
                                <td> {{ $k+1 }} </td>
                                <td>{{ $v->name  }} </td>
                                <td>{{ $v->code  }}</td> 
                                <td>{{ $v->phone  }}</td> 
                                <td>{{ $v->email }}</td> 
                                <td> 
                                <center>
                                    <a href="{{ route('admin.school.edit', Crypt::encrypt($v->id)) }}" class="btn btn-warning btn-circle btn-sm"><i class="fa fa-pencil "></i></a>  
                                    <a href="{{ route('admin.school.password', Crypt::encrypt($v->id)) }}" class="btn btn-success btn-circle btn-sm"><i class="fa fa-lock "></i></a>  
                          
                                      <center>
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
 </small>
@stop