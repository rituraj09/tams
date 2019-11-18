@extends('school.layout.default')
@section('content') 

<div class="row">
    <div class="col-lg-12"> 
        <div class="card shadow mb-4">   
            <div class="card-header py-3">
                <div class="row no-gutters align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary col mr-2"><i class="fa fa-user"></i> Profile</h6>
                            </div>
            </div>              
            <div class="card-body">
            @include('include.message')  
        
             
<div class="form-group">
    <div class="row">
        {!! Form::label('name', 'School Name:', array('class' => 'col-md-2 control-label')) !!}
       
        <label  class="control-label" >{{ Auth::user()->name }} 
        </label>  
        
    </div>
</div>

<div class="form-group">
    <div class="row">
        {!! Form::label('code', 'Code:', array('class' => 'col-md-2 control-label')) !!}
        <label  class="control-label" >{{ Auth::user()->code }} 
        </label> 
    </div>
</div>
<div class="form-group ">
    <div class="row">
        {!! Form::label('email', 'Email:', array('class' => 'col-md-2 control-label')) !!}
        <label  class="control-label" >{{ Auth::user()->email }} 
        </label> 
    </div>
</div>
<div class="form-group ">
    <div class="row">
        {!! Form::label('address', 'Address:', array('class' => 'col-md-2 control-label')) !!}
        <label  class="control-label" >{{ Auth::user()->address }} 
        </label> 
    </div>
</div>
<div class="form-group ">
    <div class="row">
        {!! Form::label('district', 'District:', array('class' => 'col-md-2 control-label')) !!}
        <label  class="control-label" >{{ $school->districtName->name }} 
        </label> 
    </div>
</div>
<div class="form-group ">
    <div class="row">
        {!! Form::label('state', 'State:', array('class' => 'col-md-2 control-label')) !!}
        <label  class="control-label" >{{ $school->stateName->name }} 
        </label> 
    </div>
</div>
<div class="form-group ">
    <div class="row">
        {!! Form::label('pin', 'Pin Code:', array('class' => 'col-md-2 control-label')) !!}
        <label  class="control-label" >{{ Auth::user()->pin }} 
        </label> 
    </div>
</div>
<div class="form-group ">
    <div class="row">
        {!! Form::label('phone', 'Phone:', array('class' => 'col-md-2 control-label')) !!}
        <label  class="control-label" >{{ Auth::user()->phone }} 
        </label> 
    </div>
</div>
            </div>
        </div>
    </div>
</div>
 
@stop