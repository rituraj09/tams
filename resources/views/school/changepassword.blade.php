@extends('school.layout.default')
@section('content') 

<div class="row">
    <div class="col-lg-12"> 
        <div class="card shadow mb-4">   
            <div class="card-header py-3">
                <div class="row no-gutters align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary col mr-2"><i class="fa fa-lock"></i> Change Password</h6>
                        <div class="pull-right col-auto"> <span class="text-danger">All fields are mandatory!</span></div>
                </div>
            </div>              
            <div class="card-body">
            @include('include.message')  
             
            {!! Form::model('', array('route' => ['school.profile.update_password', Crypt::encrypt(Auth::user()->id)], 'id' => 'school.profile.update_password','class' => 'form-horizontal bucket-form',  'onsubmit' => 'return confirmChange()')) !!}
 
             
<div class="form-group {{ $errors->has('old_password') ? 'has-error' : ''}}">
    <div class="row">
        {!! Form::label('old_password', 'Old Password:', array('class' => 'col-md-2 control-label')) !!}
        <div class="col-md-5">
                <input type="password" name="old_password" class="form-control" placeholder="" required>
          </div>
        {!! $errors->first('old_password', '<span class="text-danger">:message</span>') !!}
        
    </div>
</div>

<div class="form-group {{ $errors->has('new_password') ? 'has-error' : ''}}">
    <div class="row">
        {!! Form::label('new_password', 'New Password:', array('class' => 'col-md-2 control-label')) !!}
        <div class="col-md-5">
                <input type="password" name="new_password" class="form-control" placeholder="" required>
          </div>
        {!! $errors->first('new_password', '<span class="text-danger">:message</span>') !!}
    </div>
</div>
<div class="form-group ">
    <div class="row">
        {!! Form::label('confirm_password', 'Confirm Password:', array('class' => 'col-md-2 control-label')) !!}
        <div class="col-md-5">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>           
        </div> 
    </div>
</div>
 
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
                        
                        </div>
                    </div>
            </div> 
            {!! Form::close() !!} 
            </div>
        </div>
    </div>
</div>
 
@stop