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
            
             <h1 class="text-center">تعديل الواجب اليومي </h1>
              <div class="panel-body text-center">
				  <form action="/update/{{$id}}" method="post" >
{{ csrf_field() }}
                <table class="table table-striped table-bordered table-list">
                  <thead>
                    <tr>
                        
                        <th class="hidden-xs">#ID</th>
                        <th>الواجب اليومي </th>
                        <th>  أيام إظهار الواجب </th>
						<th style="width:150px;">تعديل </th>
						
                    </tr> 
                  </thead>
                  <tbody class="text-center">
				
							  <tr>
								
								<td class="hidden-xs">01</td>
								<td>
                                    <input class="form-control styleinput" id="name" name="name" value="{{ $name }}" placeholder=" " type="text" >
								  @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong class="text-danger" style="font-size:20px;">{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
								  </td>
                                  <td>
                                      <div class="form-check" style="font-size: 15px;">
                                          <label class="form-check-label">
                                              <input type="checkbox" class="form-check-input" name="toujour" value="true">يوميا
                                          </label>
                                          <label class="form-check-label">
                                              <input type="checkbox" class="form-check-input" name="sunday" value="true">الأحد
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
								
								  <th>
									  <input type="submit" value="تعديل " class="btn btn-success text-center">
      <span class="glyphicon glyphicon-cog"></span>
 </th>
						
								  
							  </tr>
					


							 
                        </tbody>
                </table>
            </form>
				  
              </div>
              
      
@endsection