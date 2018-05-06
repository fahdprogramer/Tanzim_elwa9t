@extends('layouts.app')

@section('content')

<style>
.panel-table .panel-body{
  padding:0;
}

.panel-table .panel-body .table-bordered{
  border-style: none;
  margin:0;
}

.panel-table .panel-body .table-bordered > thead > tr > th:first-of-type {
    text-align:center;
    width: 100px;
}

.panel-table .panel-body .table-bordered > thead > tr > th:last-of-type,
.panel-table .panel-body .table-bordered > tbody > tr > td:last-of-type {
  border-right: 0px;
}

.panel-table .panel-body .table-bordered > thead > tr > th:first-of-type,
.panel-table .panel-body .table-bordered > tbody > tr > td:first-of-type {
  border-left: 0px;
}

.panel-table .panel-body .table-bordered > tbody > tr:first-of-type > td{
  border-bottom: 0px;
}

.panel-table .panel-body .table-bordered > thead > tr:first-of-type > th{
  border-top: 0px;
}

.panel-table .panel-footer .pagination{
  margin:0;
}

/*
used to vertically center elements, may need modification if you're not using default sizes.
*/
.panel-table .panel-footer .col{
 line-height: 34px;
 height: 34px;
}

.panel-table .panel-heading .col h3{
 line-height: 30px;
 height: 30px;
}

.panel-table .panel-body .table-bordered > tbody > tr > td{
  line-height: 34px;
}

.styleinput {
    border-radius: 20px;
    margin: 1px;
    text-align: center;
    margin-bottom: -11px;
}

</style>
      @php

$date1= new DateTime($jadwal_ousbou3i[0]->created_at);

             $date= new DateTime($date1->format("Y").'-'.$date1->format("m").'-'.$date1->format("d"));
             $date->modify('-1 day');

             $date2= new DateTime($date1->format("Y").'-'.$date1->format("m").'-'.$date1->format("d"));
             $date2->modify('+1 day');

             $date3= new DateTime($date1->format("Y").'-'.$date1->format("m").'-'.$date1->format("d"));
             $date3->modify('+2 day');

             $date4= new DateTime($date1->format("Y").'-'.$date1->format("m").'-'.$date1->format("d"));
             $date4->modify('+3 day');

             $date5= new DateTime($date1->format("Y").'-'.$date1->format("m").'-'.$date1->format("d"));
             $date5->modify('+4 day');

             $date6= new DateTime($date1->format("Y").'-'.$date1->format("m").'-'.$date1->format("d"));
             $date6->modify('+5 day');

             $date7= new DateTime($date1->format("Y").'-'.$date1->format("m").'-'.$date1->format("d"));
             $date7->modify('+6 day');

              $date8= new DateTime($date1->format("Y").'-'.$date1->format("m").'-'.$date1->format("d"));
             $date8->modify('+7 day');

 function month($month){
            if ($month==1){$m='جانفي';return $m;};
            if ($month==2){$m='فيفري';return $m;};
            if ($month==3){$m='مارس';return $m;};
            if ($month==4){$m='أفريل';return $m;};
            if ($month==5){$m='ماي';return $m;};
            if ($month==6){$m='جوان';return $m;};
            if ($month==7){$m='جويلية';return $m;};
            if ($month==8){$m='أوت';return $m;};
            if ($month==9){$m='سبتمبر';return $m;};
            if ($month==10){$m='أكتوبر';return $m;};
            if ($month==11){$m='نوفمبر';return $m;};
            if ($month==12){$m='ديسمبر';return $m;};
          }


          if($date1->format('l')=='Friday'){$jour='الجمعة';};
          if($date1->format('l')=='Thursday'){$jour='الخميس';};
          if($date1->format('l')=='Wednesday'){$jour='الأربعاء';};
          if($date1->format('l')=='Saturday'){$jour='السبت';};
          if($date1->format('l')=='Sunday'){$jour='الأحد';};
          if($date1->format('l')=='Monday'){$jour='الإثنين';};
          if($date1->format('l')=='Tuesday'){$jour='الثلاثاء';};

@endphp

          <ul class="pager">

    <div class="row">
	<div class="col-sm-4 text-danger" >
	@if($test_last!=0)
  <li ><a href="/last_week/{{$date->format('d')}}/{{$date->format('m')}}/{{$date->format('Y')}}"><span class="glyphicon glyphicon glyphicon-arrow-right" aria-hidden="true"></span>    الأسبوع السابق</a></li>
     @endif
	</div>
	<div class="col-sm-4 text-success" >
	<h2 class="text-center">الجدول الاسبوعي </h2>
	</div>
	<div class="col-sm-4 text-danger" >
	@if($test_next!=0)
        @php
            if ($date1->format('l')=='Sunday'){$date_next_week=$date1;}
        if ($date2->format('l')=='Sunday'){$date_next_week=$date2;}
        if ($date3->format('l')=='Sunday'){$date_next_week=$date3;}
        if ($date4->format('l')=='Sunday'){$date_next_week=$date4;}
        if ($date5->format('l')=='Sunday'){$date_next_week=$date5;}
        if ($date6->format('l')=='Sunday'){$date_next_week=$date6;}
        if ($date7->format('l')=='Sunday'){$date_next_week=$date7;}
        if ($date8->format('l')=='Sunday'){$date_next_week=$date8;}
        @endphp
  <li ><a href="/next_week/{{$date_next_week->format('d')}}/{{$date_next_week->format('m')}}/{{$date_next_week->format('Y') }}">الأسبوع التالي <span class="glyphicon glyphicon glyphicon-arrow-left" aria-hidden="true"></span> </a></li>
	@endif
	</div></div>
</ul>
              <div class="panel-body text-center">

				  <form action="/jadwal_ousbou3i" method="post" >
{{ csrf_field() }}
                <table class="table table-striped table-bordered table-list">
                  <thead>
                    <tr>

                        <th style="width:70px;"><p>#ID</p></th>
                        <th><p>الواجب اليومي</p> </th>
                        @php $test=1;
                        @endphp
                        @if(($nbr_jour-$nbr_jour_groupe)<1)
						<th style="width:100px;">{{$jour}}
                                                    <p style="font-size: 12px;">{{$date1->format('d').' '.month($date1->format('m')).' '.$date1->format('Y')}}</p>
                                                </th>
                            @php $test=$test+1;
                            $d1=$date1;
                            @endphp
                        @endif

                        @if(($nbr_jour-$nbr_jour_groupe)<2)
                                                @if($nbr_jour>='2')
                                @php
                                    if($test==1){$date_act=$date1;}
                                 if($test==2){$date_act=$date2;}
                                if($test==3){$date_act=$date3;}
                                 if($test==4){$date_act=$date4;}
                                if($test==5){$date_act=$date5;}
                                 if($test==6){$date_act=$date6;}
                                if($test==7){$date_act=$date7;}
                                $d2=$date_act;
                                $test=$test+1;
                                @endphp
                                                <th style="width:100px;">الإثنين

                                                <p style="font-size: 12px;">{{$date_act->format('d').' '.month($date_act->format('m')).' '.$date_act->format('Y')}}</p>
                                                </th>
                               
                                                @endif
                        @endif
                        @if(($nbr_jour-$nbr_jour_groupe)<3)
                                                @if($nbr_jour>='3')
                                @php
                                    if($test==1){$date_act=$date1;}
                                 if($test==2){$date_act=$date2;}
                                if($test==3){$date_act=$date3;}
                                 if($test==4){$date_act=$date4;}
                                if($test==5){$date_act=$date5;}
                                 if($test==6){$date_act=$date6;}
                                if($test==7){$date_act=$date7;}
                                $d3=$date_act;
                                @endphp
                                                <th style="width:100px;">الثلاثاء
                                                    <p style="font-size: 12px;">{{$date_act->format('d').' '.month($date_act->format('m')).' '.$date_act->format('Y')}}</p>
                                                </th>
                                @php $test=$test+1; @endphp
                                                @endif
                        @endif
                        @if(($nbr_jour-$nbr_jour_groupe)<4)
                                                @if($nbr_jour>='4')
                                @php
                                    if($test==1){$date_act=$date1;}
                                 if($test==2){$date_act=$date2;}
                                if($test==3){$date_act=$date3;}
                                 if($test==4){$date_act=$date4;}
                                if($test==5){$date_act=$date5;}
                                 if($test==6){$date_act=$date6;}
                                if($test==7){$date_act=$date7;}
                                $d4=$date_act;

                                @endphp
                                                <th style="width:100px;">الأربعاء
                                                <p style="font-size: 12px;">{{$date_act->format('d').' '.month($date_act->format('m')).' '.$date_act->format('Y')}}</p>
                                                </th>
                                @php $test=$test+1; @endphp
                                                @endif
                        @endif
                        @if(($nbr_jour-$nbr_jour_groupe)<5)
                                                @if($nbr_jour>='5')
                                @php
                                    if($test==1){$date_act=$date1;}
                                 if($test==2){$date_act=$date2;}
                                if($test==3){$date_act=$date3;}
                                 if($test==4){$date_act=$date4;}
                                if($test==5){$date_act=$date5;}
                                 if($test==6){$date_act=$date6;}
                                if($test==7){$date_act=$date7;}
                                $d5=$date_act;
                                @endphp
                                                <th style="width:100px;">الخميس
                                                <p style="font-size: 12px;">{{$date_act->format('d').' '.month($date_act->format('m')).' '.$date_act->format('Y')}}</p>
                                                </th>
                                @php $test=$test+1; @endphp
                                                @endif
                        @endif
                        @if(($nbr_jour-$nbr_jour_groupe)<6)
                                                @if($nbr_jour>='6')
                                @php
                                    if($test==1){$date_act=$date1;}
                                 if($test==2){$date_act=$date2;}
                                if($test==3){$date_act=$date3;}
                                 if($test==4){$date_act=$date4;}
                                if($test==5){$date_act=$date5;}
                                 if($test==6){$date_act=$date6;}
                                if($test==7){$date_act=$date7;}
                                $d6=$date_act;
                                @endphp
                                                <th style="width:100px;">الجمعة
                                                <p style="font-size: 12px;">{{$date_act->format('d').' '.month($date_act->format('m')).' '.$date_act->format('Y')}}</p>
                                                </th>
                                @php $test=$test+1; @endphp
                                                @endif
                        @endif

                                                @if($nbr_jour=='7')
                            @php
                                if($test==1){$date_act=$date1;}
                             if($test==2){$date_act=$date2;}
                            if($test==3){$date_act=$date3;}
                             if($test==4){$date_act=$date4;}
                            if($test==5){$date_act=$date5;}
                             if($test==6){$date_act=$date6;}
                            if($test==7){$date_act=$date7;}
                            $d7=$date_act;
                            @endphp
                                                <th style="width:100px;">السبت
                                                <p style="font-size: 12px;">{{$date_act->format('d').' '.month($date_act->format('m')).' '.$date_act->format('Y')}}</p>
                                                </th>
                            @php $test=$test+1; @endphp
                                                @endif

                    </tr>
                  </thead>
                  <tbody class="text-center">
					@php

					  $var=1;
					  @endphp

					  @foreach($jadwal_ousbou3i_groupe as $myjadwal_ousbou3i_groupe)


							  <tr>

								<td class="hidden-xs">{{$var}}</td>
								<td>

                                                                    {{$myjadwal_ousbou3i_groupe->name}}


                                                                </td>

                                  @if(($nbr_jour-$nbr_jour_groupe)<1)
								<td style="width:100px;">
                                                                    @foreach($jadwal_ousbou3i as $myjadwal_ousbou3i)
                                                                     @if($d1->format('Y-m-d')==(new DateTime($myjadwal_ousbou3i->created_at))->format('Y-m-d'))
                                                                     @if($myjadwal_ousbou3i_groupe->name==$myjadwal_ousbou3i->name)
                                                                    @if($myjadwal_ousbou3i->radio=='true')
                                                    <a href="note/{{$myjadwal_ousbou3i->id}}" class="btn btn-success btn-lg">   <span class="glyphicon glyphicon-ok"></span></a>
                                                                    @elseif($myjadwal_ousbou3i->radio=='false')
                                                    <a href="note/{{$myjadwal_ousbou3i->id}}" class="btn btn-danger btn-lg">   <span class="glyphicon glyphicon-remove"></span></a>
                                                                    @endif
                                                                    @endif
                                                                    @endif
                                                                    @endforeach
                                                                   </td>
                                  @endif
                                  @if(($nbr_jour-$nbr_jour_groupe)<2)
                                                                   @if($nbr_jour>='2')
                                                                   <th style="width:100px;">
                                                                       @foreach($jadwal_ousbou3i as $myjadwal_ousbou3i)
                                                                     @if($d2->format('Y-m-d')==(new DateTime($myjadwal_ousbou3i->created_at))->format('Y-m-d'))
                                                                     @if($myjadwal_ousbou3i_groupe->name==$myjadwal_ousbou3i->name)
                                                                    @if($myjadwal_ousbou3i->radio=='true')
                                                                                       <a href="note/{{$myjadwal_ousbou3i->id}}" class="btn btn-success btn-lg">  <span class="glyphicon glyphicon-ok"></span></a>
                                                                    @elseif($myjadwal_ousbou3i->radio=='false')
                                                                                       <a href="note/{{$myjadwal_ousbou3i->id}}" class="btn btn-danger btn-lg">  <span class="glyphicon glyphicon-remove"></span></a>
                                                                    @endif
                                                                    @endif
                                                                    @endif
                                                                    @endforeach
                                                                   </th>
                                                                   @endif
                                  @endif
                                  @if(($nbr_jour-$nbr_jour_groupe)<3)
                                                                   @if($nbr_jour>='3')
                                                                   <th style="width:100px;">
                                                                       @foreach($jadwal_ousbou3i as $myjadwal_ousbou3i)
                                                                     @if($d3->format('Y-m-d')==(new DateTime($myjadwal_ousbou3i->created_at))->format('Y-m-d'))
                                                                     @if($myjadwal_ousbou3i_groupe->name==$myjadwal_ousbou3i->name)
                                                                    @if($myjadwal_ousbou3i->radio=='true')
                                                                                       <a href="note/{{$myjadwal_ousbou3i->id}}" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-ok"></span></a>
                                                                    @elseif($myjadwal_ousbou3i->radio=='false')
                                                                                       <a href="note/{{$myjadwal_ousbou3i->id}}" class="btn btn-danger btn-lg"><span class="glyphicon glyphicon-remove"></span></a>
                                                                    @endif
                                                                    @endif
                                                                    @endif
                                                                    @endforeach
                                                                   </th>
                                                                   @endif
                                  @endif
                                  @if(($nbr_jour-$nbr_jour_groupe)<4)
                                                                   @if($nbr_jour>='4')
                                                                   <th style="width:100px;">
                                                                       @foreach($jadwal_ousbou3i as $myjadwal_ousbou3i)
                                                                     @if($d4->format('Y-m-d')==(new DateTime($myjadwal_ousbou3i->created_at))->format('Y-m-d'))
                                                                     @if($myjadwal_ousbou3i_groupe->name==$myjadwal_ousbou3i->name)
                                                                    @if($myjadwal_ousbou3i->radio=='true')
                                                                   <a href="note/{{$myjadwal_ousbou3i->id}}" class="btn btn-success btn-lg"> <span class="glyphicon glyphicon-ok"></span></a>
                                                                    @elseif($myjadwal_ousbou3i->radio=='false')
                                                                                       <a href="note/{{$myjadwal_ousbou3i->id}}" class="btn btn-danger btn-lg"> <span class="glyphicon glyphicon-remove"></span></a>
                                                                    @endif
                                                                    @endif
                                                                    @endif
                                                                    @endforeach
                                                                   </th>
                                                                   @endif
                                  @endif
                                  @if(($nbr_jour-$nbr_jour_groupe)<5)
                                                                   @if($nbr_jour>='5')
                                                                   <th style="width:100px;">
                                                                       @foreach($jadwal_ousbou3i as $myjadwal_ousbou3i)
                                                                     @if($d5->format('Y-m-d')==(new DateTime($myjadwal_ousbou3i->created_at))->format('Y-m-d'))
                                                                     @if($myjadwal_ousbou3i_groupe->name==$myjadwal_ousbou3i->name)
                                                                    @if($myjadwal_ousbou3i->radio=='true')
                                                                                       <a href="note/{{$myjadwal_ousbou3i->id}}" class="btn btn-success btn-lg"> <span class="glyphicon glyphicon-ok"></span></a>
                                                                    @elseif($myjadwal_ousbou3i->radio=='false')
                                                                                       <a href="note/{{$myjadwal_ousbou3i->id}}" class="btn btn-danger btn-lg">  <span class="glyphicon glyphicon-remove"></span></a>
                                                                    @endif
                                                                    @endif
                                                                    @endif
                                                                    @endforeach
                                                                   </th>
                                                                   @endif
                                  @endif
                                  @if(($nbr_jour-$nbr_jour_groupe)<6)
                                                                   @if($nbr_jour>='6')
                                                                   <th style="width:100px;">
                                                                       @foreach($jadwal_ousbou3i as $myjadwal_ousbou3i)
                                                                     @if($d6->format('Y-m-d')==(new DateTime($myjadwal_ousbou3i->created_at))->format('Y-m-d'))
                                                                     @if($myjadwal_ousbou3i_groupe->name==$myjadwal_ousbou3i->name)
                                                                    @if($myjadwal_ousbou3i->radio=='true')
                                                                                       <a href="note/{{$myjadwal_ousbou3i->id}}" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-ok"></span></a>
                                                                    @elseif($myjadwal_ousbou3i->radio=='false')
                                                                                       <a href="note/{{$myjadwal_ousbou3i->id}}" class="btn btn-danger btn-lg">  <span class="glyphicon glyphicon-remove"></span></a>
                                                                    @endif
                                                                    @endif
                                                                    @endif
                                                                    @endforeach
                                                                   </th>
                                                                   @endif
                                  @endif

                                                                   @if($nbr_jour=='7')
                                                                   <th style="width:100px;">
                                                                       @foreach($jadwal_ousbou3i as $myjadwal_ousbou3i)
                                                                     @if($d7->format('Y-m-d')==(new DateTime($myjadwal_ousbou3i->created_at))->format('Y-m-d'))
                                                                     @if($myjadwal_ousbou3i_groupe->name==$myjadwal_ousbou3i->name)
                                                                    @if($myjadwal_ousbou3i->radio=='true')
                                                                                       <a href="note/{{$myjadwal_ousbou3i->id}}" class="btn btn-success btn-lg">  <span class="glyphicon glyphicon-ok"></span></a>
                                                                    @elseif($myjadwal_ousbou3i->radio=='false')
                                                                                       <a href="note/{{$myjadwal_ousbou3i->id}}" class="btn btn-danger btn-lg">  <span class="glyphicon glyphicon-remove"></span></a>
                                                                    @endif
                                                                    @endif
                                                                    @endif
                                                                    @endforeach
                                                                   </th>
                                                                   @endif



							  </tr>
					  @php
					  $var++;
					  @endphp

					  	@endforeach




                        </tbody>
                </table>
            </form>

              </div>


@endsection