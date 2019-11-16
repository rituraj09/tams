  
<div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
    <div class="row">
        {!! Form::label('name', 'School Name :', array('class' => 'col-md-2 control-label')) !!}
        <div class="col-md-5">
        <label  class="control-label" >{{ $school->name}}
        
        </label> 
          </div>
        
    </div>
</div>

<div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
    <div class="row">
        {!! Form::label('password', 'Password :', array('class' => 'col-md-2 control-label')) !!}
        <div class="col-md-5">
                <input type="password" name="password" class="form-control" placeholder="" required>
          </div>
        {!! $errors->first('password', '<span class="text-danger">:message</span>') !!}
    </div>
</div>
<div class="form-group ">
    <div class="row">
        {!! Form::label('confirm_password', 'Confirm Password :', array('class' => 'col-md-2 control-label')) !!}
        <div class="col-md-5">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>           
        </div> 
    </div>
</div>
 