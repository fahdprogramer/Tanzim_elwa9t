
@extends('layouts.app')

@section('content')
<div class="well" text-center>
<h1 style="font-family:monospace;"><b>السيرة الذاتية </b></h1>
	<div class="row">
	<div class="col-sm-6 col-sm-push-3">
<hr class="hr1">
	</div>
	</div>
	<div class="row1 row ">
		<div class="col-sm-4">
<h2>الاسم الكامل :</h2>
 
		</div>
		<div class="col-sm-8">
<h2 style="color:blue;">{{ $employe->nom.' '.$employe->prenom }}</h2>
 
		</div>
		
	
	<div class="col-sm-10 col-sm-push-1">
<hr class="hr2">
	</div>

	<div class="col-sm-4">
<h2>تاريخ الميلاد</h2>
 
		</div>
		<div class="col-sm-8">
<h2 style="color:blue;">{{ $employe->date_de_N }}</h2>
 
		</div>
		
	
	<div class="col-sm-10 col-sm-push-1">
<hr class="hr2">
	</div>
		
		<div class="col-sm-4">
<h2>الحالة العائلية </h2>
 
		</div>
		<div class="col-sm-8">
<<<<<<< HEAD
<h2 style="color:blue;">{{ $employe->etat_f }}</h2>
=======
<h2 style="color:blue;">{{ $employe->etat_f }}<b>دج</b></h2>
>>>>>>> origin/master
 
		</div>
		
	
	<div class="col-sm-10 col-sm-push-1">
<hr class="hr2">
	</div>

	<div class="col-sm-4">
<h2>العنوان</h2>
 
		</div>
		<div class="col-sm-8">
<h2 style="color:blue;">{{ $employe->adr }}</h2>
 
		</div>
		
	
	<div class="col-sm-10 col-sm-push-1">
<hr class="hr2">
	</div>
		
		<div class="col-sm-4">
<h2>اتجاه الخدمة العسكرية</h2>
 
		</div>
		<div class="col-sm-8">
<h2 style="color:blue;">{{ $employe->pls }}</h2>
 
		</div>
		
	
	<div class="col-sm-10 col-sm-push-1">
<hr class="hr2">
	</div>

	<div class="col-sm-4">
<h2>مستوى الدراسة </h2>
 
		</div>
		<div class="col-sm-8">
<h2 style="color:blue;">{{ $employe->niveau }}</h2>
 
		</div>
		
	
	<div class="col-sm-10 col-sm-push-1">
<hr class="hr2">
	</div>
		
		<div class="col-sm-4">
<h2>الشهادات المتحصل عليها </h2>
 
		</div>
		<div class="col-sm-8">
<h2 style="color:blue;">{{ $employe->certafica }}</h2>
 
		</div>
		
	
	<div class="col-sm-10 col-sm-push-1">
<hr class="hr2">
	</div>
		
		<div class="col-sm-4">
<h2>اسم الشركة التي عمل بها مسبقا ونوع العمل</h2>
 
		</div>
		<div class="col-sm-8">
<h2 style="color:blue;">{{ $employe->entreprise }}<br>{{ $employe->type_trav }}</h2>
 
		</div>
		<div class="col-sm-4">
<h2>تاريخ البداية </h2>
 
		</div>
		<div class="col-sm-8">
<h2 style="color:blue;">{{ $employe->date_i }}</h2>
 
		</div>
		<div class="col-sm-4">
<h2>تاريخ النهاية  </h2>
 
		</div>
		<div class="col-sm-8">
<h2 style="color:blue;">{{ $employe->date_f }}</h2>
 
		</div>
		
	
	<div class="col-sm-10 col-sm-push-1">
<hr class="hr2">
	</div>
		
		
		

	<div class="col-sm-4">
<h2>معاينة الديبلوم</h2>
 
		</div>
		<div class="col-sm-8">
<h2 style="color:blue;">{{ $employe->diplome }}</h2>
 
		</div>
		
	
	<div class="col-sm-10 col-sm-push-1">
<hr class="hr2">
	</div>
		
		<div class="col-sm-4">
<h2>رقم الهاتف :</h2>
 
		</div>
		<div class="col-sm-8">
<h2 style="color:blue;">{{ $employe->num_t }}</h2>
 
		</div>
		
		
	<div class="col-sm-10 col-sm-push-1">
<hr class="hr2">
	</div>
		
		<div class="col-sm-4">
<h2>معلومات إضافية :</h2>
 
		</div>
		<div class="col-sm-8">
<h2 style="color:blue;">{{ $employe->info }} </h2>
 
		</div>

	</div>



</div>








@endsection