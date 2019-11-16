 
@foreach($val as $k => $v)  
{{$files[$k]}}
<br>
{{$date[$k]}}<br>
    @foreach($v as $k => $value)
        {{ $value['emp_name']}} 
<br>
    @endforeach
<br>
<br>
@endforeach

 
@foreach($name as $k => $v)
   
@endforeach
<br> 
@foreach($name as $k => $v)   
    @foreach($v as $k1 => $vl1)            
        @foreach($vl1 as $key1 => $vaaa)
            {{$vaaa}},
             {{ $value['emp_name']}} 
        @endforeach
    @endforeach
@endforeach
    <br>
