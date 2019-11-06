@extends('admin.layout.default')
@section('content')
<h1 class="h3 mb-4 text-gray-800">School</h1>

<div class="row">
    <div class="col-lg-12"> 
        <div class="card shadow mb-4">   
            <div class="card-header py-3">
                <div class="row no-gutters align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary col mr-2"><i class="fa fa-lock"></i> Update Password</h6>
                        <div class="pull-right col-auto"> <span class="text-danger">All fields are mandatory!</span></div>
                </div>
            </div>              
            <div class="card-body">
            @include('include.message')  
             
            {!! Form::model($school, array('route' => ['admin.school.update_password', Crypt::encrypt($school->id)], 'id' => 'admin.school.update_password','class' => 'form-horizontal bucket-form',  'onsubmit' => 'return confirmChange()')) !!}
 
            @include('admin.school._form_password')    
            <div class="form-group">
                <div class="row">
                    {!! Form::label('', '', array('class' => 'col-md-2 control-label')) !!}
                        <div class="col-md-5">
                        <button type="submit"  class="btn btn-success btn-icon-split ">
                            <span class="icon text-white-100">
                                <i class="fas fa-arrow-up"></i>
                            </span>
                            <span class="text ">Update Password </span>
                        </button> 
                        <a class="btn btn-warning btn-icon-split " href="{{ route('admin.school.view') }}">
                            <span class="icon text-white-100">
                                    <i class="fas fa-arrow-left"></i>
                            </span> 
                            <span class="text ">Back</span>
                        </a>
                        </div>
                    </div>
            </div> 
            {!! Form::close() !!} 
            </div>
        </div>
    </div>
</div>
 
@stop