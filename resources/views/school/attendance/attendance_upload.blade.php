@extends('school.layout.default')
@section('content')

<div class="row">
      <div class="col-xl-12 col-lg-12">
      <div class="card shadow   mb-4">
          <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Upload Attendance</h6>
          </div>
          <div class="card-body">
          {!! Form::open(array('route' => 'school.attendance.import', 'id' => 'school.attendance.import', 'class' => 'form-horizontal bucket-form',  'onsubmit' => 'return confirmSubmit()', 'files' => true ,  'method' => 'post' )) !!}
          @csrf
          <input type="file" name="import_file" />
              <button type="submit"  class="btn btn-primary">
                            <span class="icon text-white-100">
                                <i class="fas fa-upload"></i>
                            </span>
                            <span class="text ">Upload</span>
                        </button> 
                        
              {!! Form::close() !!}
          </div>
      </div>  
      </div> 
    </div>
@stop