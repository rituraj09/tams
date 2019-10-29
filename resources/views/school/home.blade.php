@extends('school.layout.default')
@section('content')
  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">School Dashboard</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

      <!-- Earnings (Monthly) Card Example -->
      

      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Teachers</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">12</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-users fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Teachers on Duty</div>
                <div class="row no-gutters align-items-center">
                  <div class="col-auto">
                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">18</div>
                  </div>
                  <div class="col">
                  
                  </div>
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Pending Requests Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Teachers on Leave</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">2</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-rocket fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Teachers absent</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">1</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-exclamation-triangle fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  
      <div class="row">
      <div class="col-xl-12 col-lg-12">
      <div class="card shadow   mb-4">
          <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Upload Attendance</h6>
          </div>
          <div class="card-body">
          {!! Form::open(array('route' => 'school.teacher.import', 'id' => 'school.teacher.import', 'class' => 'form-horizontal bucket-form',  'onsubmit' => 'return confirmSubmit()', 'files' => true ,  'method' => 'post' )) !!}
          @csrf
              <input type="file">
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
    <!-- Content Row -->

    <div class="row">

      <!-- Area Chart -->
      <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Overview</h6>
            <div class="dropdown no-arrow">
              <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                <div class="dropdown-header">Dropdown Header:</div>
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </div>
          </div>
          <!-- Card Body -->
          <div class="card-body">
            <div class="chart-area">
              <canvas id="myAreaChart"></canvas>
            </div>
          </div>
        </div>
      </div>

      <!-- Pie Chart -->
      <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Teachers On Duty</h6>
            <div class="dropdown no-arrow">
              <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                <div class="dropdown-header">Dropdown Header:</div>
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </div>
          </div>
          <!-- Card Body -->
          <div class="card-body">
            <div class="chart-pie pt-4 pb-2">
              <canvas id="myPieChart"></canvas>
            </div>
            <div class="mt-4 text-center small">
              <span class="mr-2">
                <i class="fas fa-circle text-primary"></i> Present
              </span>
              <span class="mr-2">
                <i class="fas fa-circle text-danger"></i> Absent
              </span>
              <span class="mr-2">
                <i class="fas fa-circle text-info"></i> On leave
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Content Row -->
    <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">School Info</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Code</th>
                      <th>Total Teachers</th>
                      <th>Present</th>
                      <th>Absent</th>
                      <th>On Leave</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Name</th>
                      <th>Code</th>
                      <th>Total Teachers</th>
                      <th>Present</th>
                      <th>Absent</th>
                      <th>On Leave</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <tr>
                      <td>Golaghat Govt. High School</td>
                      <td>0001</td>
                      <td>29</td>
                      <td>22</td>
                      <td>4</td>
                      <td>3</td>
                    </tr>
                    <tr>
                      <td>1 No. Adarsh High School</td>
                      <td>0002</td>
                      <td>29</td>
                      <td>22</td>
                      <td>4</td>
                      <td>3</td>
                    </tr>
                    <tr>
                      <td>Golaghat Girls High School</td>
                      <td>0301</td>
                      <td>29</td>
                      <td>22</td>
                      <td>4</td>
                      <td>3</td>
                    </tr>
                    <tr>
                      <td>Pulibor High School</td>
                      <td>1232</td>
                      <td>29</td>
                      <td>12</td>
                      <td>4</td>
                      <td>3</td>
                    </tr>
                    <tr>
                      <td>Bengenakhowa High Schools</td>
                      <td>4312</td>
                      <td>21</td>
                      <td>20</td>
                      <td>1</td>
                      <td>0</td>
                    </tr>
                    <tr>
                      <td>Kumargaon High School</td>
                      <td>553</td>
                      <td>14</td>
                      <td>14</td>
                      <td>0</td>
                      <td>0</td>
                    </tr>
                    <tr>
                      <td>Desoi LP School</td>
                      <td>1256</td>
                      <td>19</td>
               
                      <td><i class="fa fa-flag text-danger"></i></td>
                      <td><i class="fa fa-flag text-danger"></i</td>
                      <td><i class="fa fa-flag text-danger"></i</td>
                    </tr>
                    <tr>
                      <td>Modhya Mohora LP School</td>
                      <td>0182</td>
                      <td>30</td>
                      <td>20</td>
                      <td>5</td>
                      <td>5</td>
                    </tr>
                    <tr>
                      <td>Madhya Kaziranga LP School</td>
                      <td>2102</td>
                      <td>20</td>
                      <td>18</td>
                      <td>0</td>
                      <td>2</td>
                    </tr>
                    <tr>
                      <td>Sankardev Shiksha Nikatan</td>
                      <td>421</td>
                      <td>21</td>
                      <td>19</td>
                      <td>1</td>
                      <td>1</td>
                    </tr>
                    <tr>
                      <td>Morangi LP School</td>
                      <td>224</td>
                      <td>12</td>
                      <td>12</td>
                      <td>0</td>
                      <td>0</td>
                    </tr>
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>
  </div>
  <!-- /.container-fluid -->
@stop