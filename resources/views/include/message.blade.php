 

@if(session('class')=='success') 
        <div class="alert alert-class alert-success"> 
        <button type="button" class="close" data-dismiss="alert">×</button>
       {{ session('msg')}}
        </div> 
@endif
 
@if(session('class')=='failed') 
        <div class="alert alert-class alert-danger"> 
        <button type="button" class="close" data-dismiss="alert">×</button>
       {{ session('msg')}}
        </div> 
@endif
@if(session('error')) 
    <div class="alert alert-class alert-danger">
        <button type="button" class="close" data-dismiss="alert">×</button>
        {{ session('error')}}
    </div> 
@endif 