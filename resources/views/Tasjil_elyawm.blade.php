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



<div class="container text-center" >
    <div class="row text-center">

        <form action="/Tasjil_elyawm" method="post" >
            {{ csrf_field() }}


        
            <h2 class="text-center">
                التاريخ :
				 يوم 
				@php
				
          if(date('l')=='Friday'){$jour='الجمعة';};
          if(date('l')=='Thursday'){$jour='الخميس';};
          if(date('l')=='Wednesday'){$jour='الأربعاء';};
          if(date('l')=='Saturday'){$jour='السبت';};
          if(date('l')=='Sunday'){$jour='الأحد';};
          if(date('l')=='Monday'){$jour='الإثنين';};
          if(date('l')=='Tuesday'){$jour='الثلاثاء';};
				echo $jour;
$j=date('l');
@endphp
                {{date("Y/m/d")}}

            </h2>
       

        <table class="table-striped table-hover" style="text-align:center;margin: 20px;" border='2' width="100%" >

            <tr>
                <th>الواجب اليومي </th>
                <th> اضافة ملاحظة </th>

                <th style="width:100px;">أنجز</th>
                <th style="width:100px;">لم ينجز</th>
            </tr>
			@foreach($Tasjil_elyawm as $myTasjil_elyawm)
            @if (!empty($myTasjil_elyawm->$j))

                <tr>
				   
    
    
                
                <th >{{$myTasjil_elyawm->name}}</th>
                <td><div style="border-radius: 20px;
    margin: -5px;
    text-align: center;
    margin-bottom: -8px;" class="col-sm-12 form-group">
                        <input class="form-control styleinput" id="name" name="note{{$myTasjil_elyawm->id}}" value="{{ old('name') }}" placeholder="أضف ملاحظة او يمكنك تركه فارغا" type="text" >

                    </div> </td>

                <th style="width:100px;" >

                   <div class="radio">
                       <label ><input type="radio" value="true" name="{{$myTasjil_elyawm->id}}">  نعم </label>
    </div>

                </th>
                <th style="width:100px;">
                    <div class="radio">
                        <label><input type="radio" value="false" name="{{$myTasjil_elyawm->id}}" checked>لا </label>
    </div>

                </th>
            </tr>
                @endif
			@endforeach
            
        </table>

            <button type="submit" class="btn btn-success btn-lg">حفظ السجل</button>

        </form>
    </div>

</div>


@endsection