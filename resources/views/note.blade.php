@extends('layouts.app')

@section('content')



<div class="title">
       <h2> الملاحظة الخاصة ب:

              <i class="text-success">  {{$note->name}}</i>
       </h2>
@if (empty($note->note))
       لم تقم بتسجيل ملاحظة
       @else
       <i> {{$note->note}}</i>
       @endif
</div>


@endsection
