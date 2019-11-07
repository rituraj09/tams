<div class="form-group {{ $errors->has('school_name') ? 'has-error' : ''}}">
    <div class="row">
    <div class="col-md-3">
        <label class="control-label">Full Name :</label><span class="text-danger">*</span>
        </div>
        <div class="col-md-3">
            {!! Form::text('first_name', $teacher->first_name, ['class' => 'form-control', 'id' => 'name', 'placeholder' => 'First Name', 'autocomplete' => 'off', 'required' => 'true']) !!}
        </div> 
         
        <div class="col-md-3">
            {!! Form::text('last_name', $teacher->last_name, ['class' => 'form-control', 'id' => 'name', 'placeholder' => 'Last Name', 'autocomplete' => 'off', 'required' => 'true']) !!}
          
        </div>
    </div>
</div>
<div class="form-group {{ $errors->has('unique_id') ? 'has-error' : ''}}">
    <div class="row">
        <div class="col-md-3">
            <label class="control-label">Biometrics Code :</label><span class="text-danger">*</span>
        </div>
         <div class="col-md-6">
            {!! Form::text('unique_id', $teacher->unique_id, ['class' => 'form-control', 'id' => 'unique_id', 'placeholder' => ' ', 'autocomplete' => 'off', 'required' => 'true']) !!}
        </div>
        <div class="col-md-3">
        {!! $errors->first('unique_id', '<span class="text-danger">:message</span>') !!}
        </div>
    </div>
</div>
<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    <div class="row">
        <div class="col-md-3">
            <label class="control-label">Email :</label> 
        </div>
        <div class="col-md-6">
            {!! Form::email('email', $teacher->email, ['class' => 'form-control', 'id' => 'email', 'placeholder' => ' ', 'autocomplete' => 'off' ]) !!}
        </div>
        {!! $errors->first('email', '<span class="text-danger">:message</span>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
    <div class="row">
    <div class="col-md-3">
            <label class="control-label">Mobile No. :</label><span class="text-danger">*</span>
        </div>
        <div class="col-md-6">
            {!! Form::text('phone', $teacher->phone, ['class' => 'form-control', 'id' => 'phone', 'placeholder' => ' ', 'autocomplete' => 'off', 'required' => 'true']) !!}
        </div>
        {!! $errors->first('phone', '<span class="text-danger">:message</span>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
    <div class="row">
    <div class="col-md-3">
            <label class="control-label">Address :</label> 
        </div>
        <div class="col-md-6">
            {!! Form::textarea('address', $teacher->address, ['class' => 'form-control', 'id' => 'address', 'rows' => 4, 'placeholder' => ' ', 'autocomplete' => 'off' ]) !!}
        </div>
        {!! $errors->first('address', '<span class="text-danger">:message</span>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('pincode') ? 'has-error' : ''}}">
    <div class="row">
    <div class="col-md-3">
            <label class="control-label">Pin Code :</label> 
        </div>
        <div class="col-md-6">
            {!! Form::text('pincode', $teacher->pincode, ['class' => 'form-control', 'id' => 'pincode', 'placeholder' => ' ', 'autocomplete' => 'off' ]) !!}
        </div>
        {!! $errors->first('pincode', '<span class="text-danger">:message</span>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('employee_type') ? 'has-error' : ''}}">
    <div class="row">
    <div class="col-md-3">
        <label class="control-label">Employee Type :</label><span class="text-danger">*</span>
        </div>
        <div class="col-md-6">
        {!! Form::select('employee_type', $empType, $teacher->employee_types->id, ['class' => 'form-control required', 'id' => 'employee_type', 'placeholder' => '---Select---', 'required' => 'true', ]) !!}
       
 
        </div>
        {!! $errors->first('employee_type', '<span class="text-danger">:message</span>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('dor') ? 'has-error' : ''}}">
    <div class="row">
    <div class="col-md-3">
            <label class="control-label">Birth Date :</label> 
        </div>
        <div class="col-md-6">
        <div class="input-group">
            @if($teacher->dob)
                {!! Form::text('dob',  date('d-m-Y', strtotime($teacher->dob )), ['id' => 'dob', 'class' => 'form-control datepicker  border-1 small',  'placeholder' => 'dd-mm-yyyy', 'onblur' => 'ValidateDate(this, event.keyCode)',  'onkeydown' => 'return DateFormat(this, event.keyCode)', 'onfocus'=>'this.select()',  'maxlength'=>'10',    'autocomplete' => 'off' ]) !!}
            @else
                {!! Form::text('dob',  null, ['class' => 'form-control  datepicker border-1 small',  'placeholder' => 'dd-mm-yyyy', 'onblur' => 'ValidateDate(this, event.keyCode)',  'onkeydown' => 'return DateFormat(this, event.keyCode)', 'onfocus'=>'this.select()',  'maxlength'=>'10', 'id' => 'dob',   'autocomplete' => 'off' ]) !!}
            @endif
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
    <div class="col-md-3">
            <label class="control-label">Joining Date:</label> 
        </div>
        <div class="col-md-6">
        <div class="input-group">
            @if($teacher->doj)
                {!! Form::text('doj',  date('d-m-Y', strtotime($teacher->doj )), ['class' => 'form-control  datepicker border-1 small',  'placeholder' => 'dd-mm-yyyy', 'onblur' => 'ValidateDate(this, event.keyCode)',  'onkeydown' => 'return DateFormat(this, event.keyCode)', 'onfocus'=>'this.select()',  'maxlength'=>'10', 'id' => 'doj',   'autocomplete' => 'off' ]) !!}
            @else
                {!! Form::text('doj',  null, ['class' => 'form-control  datepicker border-1 small',  'placeholder' => 'dd-mm-yyyy', 'onblur' => 'ValidateDate(this, event.keyCode)',  'onkeydown' => 'return DateFormat(this, event.keyCode)', 'onfocus'=>'this.select()',  'maxlength'=>'10', 'id' => 'doj',   'autocomplete' => 'off' ]) !!}
            @endif
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
    <div class="col-md-3">
            <label class="control-label">Retirement Date :</label><span class="text-danger">*</span>
        </div>
        <div class="col-md-6">
        <div class="input-group">
            {!! Form::text('dor',  date('d-m-Y', strtotime($teacher->dor )), ['class' => 'form-control  datepicker border-1 small',  'placeholder' => 'dd-mm-yyyy', 'onblur' => 'ValidateDate(this, event.keyCode)',  'onkeydown' => 'return DateFormat(this, event.keyCode)', 'onfocus'=>'this.select()',  'maxlength'=>'10', 'id' => 'dor',   'autocomplete' => 'off', 'required' => 'true']) !!}
            <span class="input-group-append">
                <button class="btn btn-primary" type="button"><i class="fa fa-calendar"></i></button>
            </span>
        </div>
        </div>
        {!! $errors->first('dor', '<span class="text-danger">:message</span>') !!}
    </div>
</div>

  
  
 