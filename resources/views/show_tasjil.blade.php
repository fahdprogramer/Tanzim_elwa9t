@extends('layouts.app')

@section('content')
<a href="/tasjil_yawm_madi/{{ $show_tasjil[0]->id }}">

<button style="padding:15px;margin-left:20px;" type="button" class="btn btn-default btn-lg btn-danger" aria-label="Left Align">
  <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
</button>
</a>
<div class="container text-center" style="padding:25px;">
    <div class="row text-center">

        <form action="/Tasjil_elyawm" method="post" >
            {{ csrf_field() }}


        
        <div class="text-center">
			 التاريخ : يوم
            @php
                $date_day=new DateTime($show_tasjil[0]->created_at);
                if($date_day->format('l')=='Friday'){$jour='الجمعة';};
                if($date_day->format('l')=='Thursday'){$jour='الخميس';};
                if($date_day->format('l')=='Wednesday'){$jour='الأربعاء';};
                if($date_day->format('l')=='Saturday'){$jour='السبت';};
                if($date_day->format('l')=='Sunday'){$jour='الأحد';};
                if($date_day->format('l')=='Monday'){$jour='الإثنين';};
                if($date_day->format('l')=='Tuesday'){$jour='الثلاثاء';};
                      echo $jour;

            @endphp
            {{
                $date_day->format('d-m-Y')
            }}
		
        </div>
       

        <table class="table-striped table-hover" style="text-align:center;margin: 20px;" border='2' width="100%" >

            <tr>
                <th>الواجب اليومي </th>
                <th> الملاحظات </th>
                <th style="width:100px;"> أنجز أم لم ينجز</th>
                
            </tr>
			@foreach($show_tasjil as $myshow_tasjil)
            <tr>
				   
    
    
                
                <th >{{$myshow_tasjil->name }}</th>

                <th >
                    @if (!empty($myshow_tasjil->note))
                    {{$myshow_tasjil->note }}
                        @else
                    لم تسجل ملاحظة
                        @endif

                </th>
                
                <th style="width:150px;" >

                   @if($myshow_tasjil->radio=='true')
                     <b style="font-size: 25px;color: greenyellow;">  <span class="glyphicon glyphicon-ok" aria-hidden="true"></span></b>
                    @else  
                    
                        <b style="font-size: 25px;color:red ;">  <span class="glyphicon glyphicon-remove" aria-hidden="true"></span></b>

                    @endif
  

                </th>
                
            </tr>
			@endforeach
            
        </table>

          

        </form>
    </div>

</div>


@endsection