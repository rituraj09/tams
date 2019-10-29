@extends('school.layout.default')
@section('content')
<h1 class="h3 mb-4 text-gray-800">Teacher</h1>

<div class="row">
    <div class="col-lg-12"> 
        <div class="card shadow mb-4">   
            <div class="card-header py-3">
                <div class="row no-gutters align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary col mr-2">Add Teacher</h6>
                        <div class="pull-right col-auto"> <span class="text-danger">* fields are mandatory!</span></div>
                </div>
            </div>              
            <div class="card-body">
            @include('include.message')  
           
            {!! Form::open(array('route' => 'school.teacher.save', 'id' => 'school.teacher.save', 'class' => 'form-horizontal bucket-form',  'onsubmit' => 'return confirmSubmit()', 'files' => true)) !!}
            
            @include('school.teacher._form')    
            <div class="form-group">
                <div class="row">
                    {!! Form::label('', '', array('class' => 'col-md-3 control-label')) !!}
                        <div class="col-md-5">
                        <button type="submit"  class="btn btn-success btn-icon-split ">
                            <span class="icon text-white-100">
                                <i class="fas fa-arrow-right"></i>
                            </span>
                            <span class="text ">Submit</span>
                        </button> 
                        </div>
                    </div>
            </div> 
            {!! Form::close() !!} 
            </div>
        </div>
    </div>
</div>
 
@stop