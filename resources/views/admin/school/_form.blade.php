<div class="form-group {{ $errors->has('school_name') ? 'has-error' : ''}}">
    <div class="row">
        {!! Form::label('name', 'School Name :', array('class' => 'col-md-2 control-label')) !!}
        <div class="col-md-5">
            {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'placeholder' => ' ', 'autocomplete' => 'off', 'required' => 'true']) !!}
        </div>
        {!! $errors->first('name', '<span class="text-danger">:message</span>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('school_code') ? 'has-error' : ''}}">
    <div class="row">
        {!! Form::label('code', 'School Code :', array('class' => 'col-md-2 control-label')) !!}
        <div class="col-md-5">
            {!! Form::text('code', null, ['class' => 'form-control', 'id' => 'code', 'placeholder' => ' ', 'autocomplete' => 'off', 'required' => 'true']) !!}
        </div>
        {!! $errors->first('code', '<span class="text-danger">:message</span>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    <div class="row">
        {!! Form::label('email', 'Email :', array('class' => 'col-md-2 control-label')) !!}
        <div class="col-md-5">
            {!! Form::email('email', null, ['class' => 'form-control', 'id' => 'email', 'placeholder' => ' ', 'autocomplete' => 'off', 'required' => 'true']) !!}
        </div>
        {!! $errors->first('email', '<span class="text-danger">:message</span>') !!}
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
 