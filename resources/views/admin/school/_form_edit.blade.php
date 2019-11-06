<div class="form-group {{ $errors->has('school_name') ? 'has-error' : ''}}">
    <div class="row">
        {!! Form::label('name', 'School Name :', array('class' => 'col-md-2 control-label')) !!}
        <div class="col-md-5">
            {!! Form::text('name', $school->name , ['class' => 'form-control', 'id' => 'name', 'placeholder' => ' ', 'autocomplete' => 'off', 'required' => 'true']) !!}
        </div>
        {!! $errors->first('name', '<span class="text-danger">:message</span>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('school_code') ? 'has-error' : ''}}">
    <div class="row">
        {!! Form::label('code', 'School Code :', array('class' => 'col-md-2 control-label')) !!}
        <div class="col-md-5">
            {!! Form::text('code', $school->code, ['class' => 'form-control', 'id' => 'code', 'placeholder' => ' ', 'autocomplete' => 'off', 'required' => 'true']) !!}
        </div>
        {!! $errors->first('code', '<span class="text-danger">:message</span>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
    <div class="row">
        {!! Form::label('phone', 'Phone No. :', array('class' => 'col-md-2 control-label')) !!}
        <div class="col-md-5">
            {!! Form::text('phone', $school->phone, ['class' => 'form-control', 'id' => 'phone', 'placeholder' => ' ', 'autocomplete' => 'off', 'required' => 'true']) !!}
        </div>
        {!! $errors->first('phone', '<span class="text-danger">:message</span>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    <div class="row">
        {!! Form::label('email', 'Email :', array('class' => 'col-md-2 control-label')) !!}
        <div class="col-md-5">
            {!! Form::email('email', $school->email, ['class' => 'form-control', 'id' => 'email', 'placeholder' => ' ', 'autocomplete' => 'off', 'required' => 'true']) !!}
        </div>
        {!! $errors->first('email', '<span class="text-danger">:message</span>') !!}
    </div>
</div> 