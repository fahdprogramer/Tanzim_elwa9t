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
            
             <h2 class="text-center">قائمة الواجبات اليومية</h2>
              <div class="panel-body text-center">
				  <form action="/ta7akoum" method="post" >
{{ csrf_field() }}
                <table class="table table-striped table-bordered table-list">
                  <thead>
                    <tr>
                        
                        <th class="hidden-xs">#ID</th>
                        <th>الواجب اليومي </th>
                        <th>  ايام الاظهار </th>
						<th style="width:150px;">تاريخ الاضافة  </th>

					@isset($ta7akoum[0]->id)  
						<th style="width:100px;">تعديل </th>
						<th style="width:100px;">حذف</th>
					@endempty 
                    </tr> 
                  </thead>
                  <tbody class="text-center">
					@php
					  
					  $var=1;
					  @endphp
					 
					  @foreach($ta7akoum as $myta7akoum)
					  
							  <tr>
								
								<td class="hidden-xs">{{$var}}</td>
								<td>{{$myta7akoum->name}}</td>
                                  <td style="font-size: 15px;">
                                      @if((!empty($myta7akoum->Sunday))&&(!empty($myta7akoum->Monday))&&(!empty($myta7akoum->Tuesday))
                                          &&($myta7akoum->Wednesday)&&(!empty($myta7akoum->Thursday))&&(!empty($myta7akoum->Friday))&&
                                          (!empty($myta7akoum->Saturday)))
                                          <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> يوميا
                                      @else
                                          @php $i=1; @endphp
                                          @if(!empty($myta7akoum->Sunday))<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>  @php $i=$i+1; @endphpالأحد@endif
                                          @if(!empty($myta7akoum->Monday)) <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>@php $i=$i+1; @endphpالإثنين@endif
                                          @if(!empty($myta7akoum->Tuesday)) <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>الثلاثاء@php $i=$i+1; @endphp@endif
                                          @if(!empty($myta7akoum->Wednesday)) <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>الأربعاء@php $i=$i+1;if($i==3){echo '<br>';} @endphp @endif
                                          @if(!empty($myta7akoum->Thursday)) <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>@php $i=$i+1;if($i==3){echo '<br>';} @endphpالخميس@endif
                                          @if(!empty($myta7akoum->Friday)) <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>الجمعة@php $i=$i+1;if($i==3){echo '<br>';} @endphp @endif
                                          @if(!empty($myta7akoum->Saturday)) <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>@php $i=$i+1;if($i==3){echo '<br>';} @endphpالسبت@endif
                                      @endif

                                  </td>
								<td style="width:150px;">{{(new DateTime($myta7akoum->created_at))->format('Y-m-d')}}</td>
								  <th style="width:100px;"><a href="/update/{{$myta7akoum->id}}" class="btn btn-success btn-lg">
      <span class="glyphicon glyphicon-cog"></span>
    </a> </th>
								  
						<th style="width:100px;"><a href="/delete_wajib/{{$myta7akoum->id}}" class="btn btn-danger btn-lg">
      <span class="glyphicon glyphicon-trash"></span>
    </a></th>
								  
							  </tr>
					  @php
					  $var++;
					  @endphp
					  	@endforeach


							<tr>

								<td class="hidden-xs"></td>
								<td><div style="border-radius: 20px;
    margin: -5px;
    text-align: center;
    margin-bottom: -8px;" class="col-sm-12 form-group">
            <input class="form-control styleinput" id="name" name="name" value="{{ old('name') }}" placeholder="أكتب واجبك هنا" type="text" >
									@if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong class="text-danger" style="font-size:20px;">{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
									</div> </td>

                                <td>
                                    <div class="form-check" style="font-size: 15px;">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="toujour" value="true" checked>يوميا
                                        </label>
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="Sunday" value="true">الأحد
                                        </label>
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="Monday" value="true">اللإثنين
                                        </label>
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="Tuesday" value="true">الثلاثاء
                                        </label>
                                        <br>
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="Wednesday" value="true">الأربعاء
                                        </label>
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="Thursday" value="true">الخميس
                                        </label>
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="Friday" value="true">الجمعة
                                        </label>
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="Saturday" value="true">السبت
                                        </label>


                                    </div>

                                </td>
								<td><input type="submit" value="إضافة واجب يومي جديد" class="btn btn-success text-center"></td>

							  </tr>
									 
                        </tbody>
                </table>
            </form>
				
              </div>
              
      
@endsection