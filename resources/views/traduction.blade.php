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

	<h2 class="text-center">ترجمة الكلمات </h2>
	<div class="panel-body text-center">
		<form action="/traduction" method="post" >
			{{ csrf_field() }}
			<table class="table table-striped table-bordered table-list">
				<thead>
				<tr>

					<th class="hidden-xs">#ID</th>
					<th>الكلمة </th>
					<th>  الترجمة الخاصة بها </th>
					<th style="width:150px;">تاريخ الاضافة  </th>

					@isset($traduction[0]->id)
						<th style="width:100px;">تعديل </th>
						<th style="width:100px;">حذف</th>
						@endempty
				</tr>
				</thead>
				<tbody class="text-center">
				@php

					$var=1;
				@endphp

				@foreach($traduction as $mytraduction)

					<tr>

						<td class="hidden-xs">{{$var}}</td>
						<td>{{$mytraduction->mot}}</td>
						<td >
							{{$mytraduction->traduction}}

						</td>
						<td style="width:150px;">{{(new DateTime($mytraduction->created_at))->format('Y-m-d')}}</td>
						<th style="width:100px;"><a href="/update_traduction/{{$mytraduction->id}}" class="btn btn-success btn-lg">
								<span class="glyphicon glyphicon-cog"></span>
							</a> </th>

						<th style="width:100px;"><a href="" class="btn btn-danger btn-lg">
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
							<input class="form-control styleinput" id="name" name="mot" value="{{ old('mot') }}" placeholder="أكتب هنا الكلمة اللتي ستترجمها" type="text" >
							@if ($errors->has('mot'))
								<span class="help-block">
                                        <strong class="text-danger" style="font-size:20px;">{{ $errors->first('mot') }}</strong>
                                    </span>
							@endif
						</div> </td>

					<td>
						<div style="border-radius: 20px;
    margin: -5px;
    text-align: center;
    margin-bottom: -8px;" class="col-sm-12 form-group">
							<input class="form-control styleinput" id="name" name="traduction" value="{{ old('traduction') }}" placeholder="أكتب هنا الترجمة " type="text" >
							@if ($errors->has('traduction'))
								<span class="help-block">
                                        <strong class="text-danger" style="font-size:20px;">{{ $errors->first('traduction') }}</strong>
                                    </span>
							@endif
						</div>
					</td>
					<td><input type="submit" value="إضافة ترجمه جديدة" class="btn btn-success text-center"></td>

				</tr>

				</tbody>
			</table>
		</form>

	</div>


@endsection