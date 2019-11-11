@extends('admin.layout.default')
@section('content')

<h1 class="h3 mb-4 text-gray-800">Schools</h1>
<small>
<div class="row">
    <div class="col-lg-12"> 
        <div class="card shadow mb-4">   
            <div class="card-header py-3">
                <div class="row no-gutters align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary col mr-2">View Schools</h6>
        
                </div>
            </div>              
            <div class="card-body">
            @include('include.message')             
                <div class="row">
                    <div class="col-md-12">     
                        <div class="table-responsive">               
                        <table class="table  table-bordered"  cellspacing="0">
                        <thead>
                        <tr>
                            <th width="8%"> Sl No</th>
                            <th >School Name</th> 
                            <th >School Code</th>
                            <th >Phone No.</th>
                            <th >Email</th> 
                            <th  >Status</th>
                            <th  ></th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($results as $k => $v)
                            <tr>
                                <td> {{ $k+1 }} </td>
                                <td>{{ $v->name  }} </td>
                                <td>{{ $v->code  }}</td> 
                                <td>{{ $v->phone  }}</td> 
                                <td>{{ $v->email }}</td> 
                                <td>
                                <center>
                                @if($v->isactive==1)
                                <?php $class1 ="btn btn-xs btn-success" ;
                                $class2 ="btn  btn-xs btn-secondary " ;
                                ?>  
                                @else
                                <?php $class1 ="btn btn-xs btn-secondary" ;
                                $class2 ="btn  btn-xs btn-danger" ;
                                    ?>  
                                @endif 
                                <a id="active_btn{{ $v->id}}" href="vascript:void(0)"  onclick="return block({{ $v->id}}, 1)"  class='{{ $class1 }}'  ><i class="fa fa-check-circle" data-toggle="tooltip" data-placement="top"  title="Active" ></i></a> 
                                <a id="block_btn{{ $v->id}}" href="vascript:void(0)" onclick="return block({{ $v->id}}, 0)"  class='{{ $class2 }}' ><i class="fa fa-ban"  data-toggle="tooltip" data-placement="top"  title="Block" ></i></a>   
                                </center>
                                </td>
                                <td> 
                                <center>
                                <form id="delete-form" action="{{ route('admin.school.delete', Crypt::encrypt($v->id)) }}" onsubmit="return confirmDelete();" method="POST" >
                               
                                      <a href="{{ route('admin.school.edit', Crypt::encrypt($v->id)) }}"  data-toggle="tooltip" data-placement="top"  title="Edit" class="btn btn-warning btn-circle btn-sm"><i class="fa fa-pencil "></i></a>  
                                    <a href="{{ route('admin.school.password', Crypt::encrypt($v->id)) }}"  data-toggle="tooltip" data-placement="top"  title="Change Password" class="btn btn-success btn-circle btn-sm"><i class="fa fa-lock "></i></a>  
                                    {{ csrf_field() }}
                                            <button   data-toggle="tooltip"  data-placement="top"  title="Delete"    class="btn btn-danger btn-circle btn-sm" ><i class="fa fa-trash-o"></i></button>
                                </form>
                                </center>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
 </small>

 <script> 
function block(id,block) {   
v=0;
if(block == 1)
{
    var result = confirm('Are you sure, you want to active the account?'); 
    
    if (result) {
            v=1; 
        } else {
            return false;
    }
}
else
{
    var result = confirm('Are you sure, you want to block the account?'); 
    
    if (result) {
            v=1;
        } else {
            return false;
    }
}
if(v == 1)
{
if(id != '') {
    url = data = '';  
    data = 'id='+id + '&block='+block;
    url  = "{{ route('post_block') }}";  
        $.ajax({ 
            data : data,
            url  : url,
            type : 'post', 
            success:function(data) {    
                $("#msg").html('Success!'); 
                debugger;
                if(data =='1')
                {
                    $("#block_btn"+id).attr('class','btn btn-xs btn-secondary');
                    $("#active_btn"+id).attr('class','btn btn-xs btn-success');
                }
                else
                {
                    $("#block_btn"+id).attr('class','btn btn-xs btn-danger');
                    $("#active_btn"+id).attr('class','btn btn-xs btn-secondary');
                }
            },
            error:function (data) { 
                console.log(data);
                $("#msg").html('Somethings went wrong!');
            }
        });
    }
    
    return true;
}
};  
</script>
@stop