@extends('layouts.app')

@section('content')


  <style>
	  @font-face{
            font-family:GretaTextArabicBold;
            src:url(../fonts/GretaTextArabicBold.ttf);
            font-style:normal;

        }
        @font-face{
            font-family:dthuluth2;
            src:url(../fonts/dthuluth2.ttf);
            font-style:normal;

        }
        html, body {
            background-color: #fff;
            color:black;
            font-family:GretaTextArabicBold;
            font-size: 25px;
            padding-bottom: 50px;


        }
  .jumbotron {
      background-color: #f4511e;
      color: #fff;
      padding: 100px 25px;
  }
  .container-fluid {
      padding: 60px 50px;
  }
  .bg-grey {
      background-color: #f6f6f6;
  }
  .logo-small {
      color: #f4511e;
      font-size: 50px;
  }
  .logo {
      color: #f4511e;
      font-size: 200px;
  }
  @media screen and (max-width: 768px) {
    .col-sm-4 {
      text-align: center;
      margin: 25px 0;
    }
  }
  </style>

@php
$date= new DateTime($tasjil_elyawm[0]->created_at);
if (($date->format('m'))==1){$m='جانفي';};
if (($date->format('m'))==2){$m='فيفري';};
if (($date->format('m'))==3){$m='مارس';};
if (($date->format('m'))==4){$m='أفريل';};
if (($date->format('m'))==5){$m='ماي';};
if (($date->format('m'))==6){$m='جوان';};
if (($date->format('m'))==7){$m='جويلية';};
if (($date->format('m'))==8){$m='أوت';};
if (($date->format('m'))==9){$m='سبتمبر';};
if (($date->format('m'))==10){$m='أكتوبر';};
if (($date->format('m'))==11){$m='نوفمبر';};
if (($date->format('m'))==12){$m='ديسمبر';};
@endphp
<ul class="pager">
    
    <div class="row">
	<div class="col-sm-4 text-danger" >
	@if($test_last!=0)
  <li ><a href="/last_month/{{$date->format('m')}}/{{$date->format('Y')}}"><span class="glyphicon glyphicon glyphicon-arrow-right" aria-hidden="true"></span>    الشهر السابق</a></li>
     @endif
	</div>
	<div class="col-sm-4 text-success" >
	<h1> {{$m.' '.$date->format('Y')}} </h1>
	</div>
	<div class="col-sm-4 text-danger" >
	@if($test_next!=0)
  <li ><a href="/next_month/{{$date->format('m')}}/{{$date->format('Y') }}">الشهر التالي <span class="glyphicon glyphicon glyphicon-arrow-left" aria-hidden="true"></span> </a></li>
	@endif
	</div></div>
</ul>
<!-- Container (Services Section) -->
<div class="container-fluid text-center">

  
  <br>
  <div class="row">
	  @foreach ($tasjil_elyawm as $mytasjil_elyawm)
          @php
          $j=(new DateTime($mytasjil_elyawm->created_at))->format('l');
          if($j=='Friday'){$jour='الجمعة';};
          if($j=='Thursday'){$jour='الخميس';};
          if($j=='Wednesday'){$jour='الأربعاء';};
          if($j=='Saturday'){$jour='السبت';};
          if($j=='Sunday'){$jour='الأحد';};
          if($j=='Monday'){$jour='الإثنين';};
          if($j=='Tuesday'){$jour='الثلاثاء';};
          
            $date_time= new DateTime($mytasjil_elyawm->created_at);
            @endphp

	  @if(empty($mytasjil_elyawm->radio))
          
	
	  <a href="/tasjil_yawm_madi/{{ $mytasjil_elyawm->id }}"  >
		 
    <div class="col-sm-4 text-danger" style="padding-bottom: 70px;">
        <span class="glyphicon glyphicon-leaf logo-small" style="font-size:50px;"></span>
        <h2>{{ $jour }}</h2>
        <h3>{{ $date_time->format('Y-m-d') }}</h3>
   
		  </div>
	 
	  </a>
          
          

          @else
          
	
	  <a href="/show_tasjil/{{ $date_time->format('Y') }}/{{ $date_time->format('m') }}/{{ $date_time->format('d') }}"  >
		
    <div class="col-sm-4 text-success" style="padding-bottom: 70px;">
      <span class="glyphicon glyphicon-leaf logo-small" style="font-size:50px;"></span>
      <h2>{{ $jour }}</h2>
      <h3>{{ $date_time->format('Y-m-d') }}</h3>
     
		  </div>
		 
	  </a>
	 
          
	  @endif
    @endforeach
  </div>
  <br><br>
						


  
</div>
@endsection