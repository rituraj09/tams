<div class="form-group {{ $errors->has('school_name') ? 'has-error' : ''}}">
    <div class="row">
    <div class="col-md-2">
        <label class="control-label">Full Name :</label><span class="text-danger">*</span>
        </div>
        <div class="col-md-3">
            {!! Form::text('first_name', null, ['class' => 'form-control', 'id' => 'name', 'placeholder' => 'First Name', 'autocomplete' => 'off', 'required' => 'true']) !!}
        </div> 
         
        <div class="col-md-3">
            {!! Form::text('last_name', null, ['class' => 'form-control', 'id' => 'name', 'placeholder' => 'Last Name', 'autocomplete' => 'off', 'required' => 'true']) !!}
          
        </div>
    </div>
</div>
<div class="form-group {{ $errors->has('school_code') ? 'has-error' : ''}}">
    <div class="row">
        <div class="col-md-2">
            <label class="control-label">Biometrics Code :</label><span class="text-danger">*</span>
        </div>
         <div class="col-md-6">
            {!! Form::text('code', null, ['class' => 'form-control', 'id' => 'code', 'placeholder' => ' ', 'autocomplete' => 'off', 'required' => 'true']) !!}
        </div>
        {!! $errors->first('code', '<span class="text-danger">:message</span>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    <div class="row">
        <div class="col-md-2">
            <label class="control-label">Email :</label> 
        </div>
        <div class="col-md-6">
            {!! Form::email('email', null, ['class' => 'form-control', 'id' => 'email', 'placeholder' => ' ', 'autocomplete' => 'off', 'required' => 'true']) !!}
        </div>
        {!! $errors->first('email', '<span class="text-danger">:message</span>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
    <div class="row">
    <div class="col-md-2">
            <label class="control-label">Mobile No. :</label><span class="text-danger">*</span>
        </div>
        <div class="col-md-6">
            {!! Form::text('phone', null, ['class' => 'form-control', 'id' => 'phone', 'placeholder' => ' ', 'autocomplete' => 'off', 'required' => 'true']) !!}
        </div>
        {!! $errors->first('phone', '<span class="text-danger">:message</span>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
    <div class="row">
    <div class="col-md-2">
            <label class="control-label">Address :</label> 
        </div>
        <div class="col-md-6">
            {!! Form::textarea('address', null, ['class' => 'form-control', 'id' => 'address', 'rows' => 4, 'placeholder' => ' ', 'autocomplete' => 'off', 'required' => 'true']) !!}
        </div>
        {!! $errors->first('address', '<span class="text-danger">:message</span>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('pincode') ? 'has-error' : ''}}">
    <div class="row">
    <div class="col-md-2">
            <label class="control-label">Pin Code :</label> 
        </div>
        <div class="col-md-6">
            {!! Form::text('pincode', null, ['class' => 'form-control', 'id' => 'pincode', 'placeholder' => ' ', 'autocomplete' => 'off', 'required' => 'true']) !!}
        </div>
        {!! $errors->first('pincode', '<span class="text-danger">:message</span>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('employee_type') ? 'has-error' : ''}}">
    <div class="row">
    <div class="col-md-2">
        <label class="control-label">Employee Type :</label><span class="text-danger">*</span>
        </div>
        <div class="col-md-6">
            {!! Form::text('employee_type', null, ['class' => 'form-control', 'id' => 'employee_type', 'placeholder' => ' ', 'autocomplete' => 'off', 'required' => 'true']) !!}
        </div>
        {!! $errors->first('employee_type', '<span class="text-danger">:message</span>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('dor') ? 'has-error' : ''}}">
    <div class="row">
    <div class="col-md-2">
            <label class="control-label">Birth Date :</label> 
        </div>
        <div class="col-md-6">
        <div class="input-group">
            {!! Form::text('dob', null, ['id' => 'dob', 'class' => 'form-control   border-1 small',  'placeholder' => 'dd-mm-yyyy', 'onblur' => 'ValidateDate(this, event.keyCode)',  'onkeydown' => 'return DateFormat(this, event.keyCode)', 'onfocus'=>'this.select()',  'maxlength'=>'10',    'autocomplete' => 'off', 'required' => 'true']) !!}
            <span class="input-group-append">
                <button class="btn btn-primary" type="button"><i class="fa fa-calendar"></i></button>
            </span>
        </div>
        </div>
        {!! $errors->first('dob', '<span class="text-danger">:message</span>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('doj') ? 'has-error' : ''}}">
    <div class="row">
    <div class="col-md-2">
            <label class="control-label">Joining Date:</label> 
        </div>
        <div class="col-md-6">
        <div class="input-group">
            {!! Form::text('doj', null, ['class' => 'form-control   border-1 small',  'placeholder' => 'dd-mm-yyyy', 'onblur' => 'ValidateDate(this, event.keyCode)',  'onkeydown' => 'return DateFormat(this, event.keyCode)', 'onfocus'=>'this.select()',  'maxlength'=>'10', 'id' => 'doj',   'autocomplete' => 'off', 'required' => 'true']) !!}
            <span class="input-group-append">
                <button class="btn btn-primary" type="button"><i class="fa fa-calendar"></i></button>
            </span>
        </div>
        </div>
        {!! $errors->first('doj', '<span class="text-danger">:message</span>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('dor') ? 'has-error' : ''}}">
    <div class="row">
    <div class="col-md-2">
            <label class="control-label">Retirement Date :</label><span class="text-danger">*</span>
        </div>
        <div class="col-md-6">
        <div class="input-group">
            {!! Form::text('dor', null, ['class' => 'form-control   border-1 small',  'placeholder' => 'dd-mm-yyyy', 'onblur' => 'ValidateDate(this, event.keyCode)',  'onkeydown' => 'return DateFormat(this, event.keyCode)', 'onfocus'=>'this.select()',  'maxlength'=>'10', 'id' => 'dor',   'autocomplete' => 'off', 'required' => 'true']) !!}
            <span class="input-group-append">
                <button class="btn btn-primary" type="button"><i class="fa fa-calendar"></i></button>
            </span>
        </div>
        </div>
        {!! $errors->first('dor', '<span class="text-danger">:message</span>') !!}
    </div>
</div>

  
  
 