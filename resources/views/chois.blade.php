@extends('layouts.app')

@section('content')



<div class="row text-center" style="padding-top: 60px;">
	<a href="/edit_sijil/{{$y}}/{{$m}}/{{$d}}">
  <div class="col-sm-6">
      <span class="glyphicon glyphicon-copy" style="font-size: 250px;color:rgba(253, 237, 45, 0.95); "></span> <br><br>
      تسجيل حساب يوم
      
      {{$y}}/{{$m}}/{{$d}} </div></a>
    <a href="/mounassaba/{{$y}}/{{$m}}/{{$d}}">
            <div class="col-sm-6">
                <span class="glyphicon glyphicon-grain" style="font-size: 250px;color:rgba(253, 237, 45, 0.95); "></span> <br><br>
                   
                     تسجيل مناسبة ليوم 
{{$y}}/{{$m}}/{{$d}}                </div></a>
</div>


@endsection