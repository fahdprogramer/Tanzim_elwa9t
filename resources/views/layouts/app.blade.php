<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
<!-- icon title -->
    <title>نظام الوقت</title>
	<link rel="shortcut icon" href="{{ asset('images/time.png') }}" type="image/x-icon" />
	  <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
	 <!-- Fonts -->
  <link href="css/bootstrap.css" rel="stylesheet">
    <link href="{{ asset('css/glyphicons.css') }}" rel="stylesheet">
       <link href="{{ asset('css/bootstrap-rtl.css') }}" rel="stylesheet">
	<link href="{{ asset('css/style.css') }}" rel="stylesheet">
	<link href="{{ asset('css/style_navbar.css') }}" rel="stylesheet">


    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/html5shiv.js') }}"></script>
    <script src="{{ asset('js/respond.js') }}"></script>

  
</head>
<body>
    <div id="app">
		<header id="fh5co-header" role="banner">
		<nav class="navbar navbar-default" role="navigation">
			<div class="container-fluid">
				<div class="navbar-header"> 
				<!-- Mobile Toggle Menu Button -->
				<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle" data-toggle="collapse" data-target="#fh5co-navbar" aria-expanded="false" aria-controls="navbar"><i></i></a>
					 <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
						 <li {{{ (Request::is('login') ? 'class=active' : '') }}} > <a  href="{{ route('login') }}"><span><span class="glyphicon glyphicon glyphicon-log-in" aria-hidden="true"></span>  تسجيل الدخول <span class="border"></span></span></a></li>
						 <li {{{ (Request::is('register') ? 'class=active' : '') }}} > <a  href="{{ route('register') }}"><span><span class="glyphicon glyphicon glyphicon-log-in" aria-hidden="true"></span>  التسجيل  <span class="border"></span></span></a></li>
						 
						 
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle navbar-brand" data-toggle="dropdown" role="button" aria-expanded="false"><span>
                                    {{ Auth::user()->name }} <span class="caret"></span></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            تسجيل الخروج 
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
				
				</div>
				<div id="fh5co-navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">
						@guest
						<li {{{ (Request::is('/') ? 'class=active' : '') }}} ><a href="/"><span>الوقت كالسيف ان لم تقطعه قطعك  <span class="border"></span></span></a></li>
						
						@else
						<li {{{ (Request::is('home') ? 'class=active' : '') }}}{{{ (Request::is('last_month/*/*') ? 'class=active' : '') }}}{{{ (Request::is('next_month/*/*') ? 'class=active' : '') }}}>
							
							
							
							
							
							<a  href="/home"><span><span class="glyphicon glyphicon-home" aria-hidden="true"></span>     الصفحة الرئيسية<span class="border"></span></span></a>
						
						
						
						
						</li>
						
						<li {{{ (Request::is('Tasjil_elyawm') ? 'class=active' : '') }}}><a href="/Tasjil_elyawm"><span><span class="glyphicon glyphicon-edit" aria-hidden="true"></span>     تسجيل اليوم <span class="border"></span></span></a></li>
						
						<li {{{ (Request::is('ta7akoum') ? 'class=active' : '') }}}><a href="/ta7akoum"><span><span class="glyphicon  glyphicon-cog" aria-hidden="true"></span>    التحكم <span class="border"></span></span></a></li>

                                <li {{{ (Request::is('jadwal_ousbou3i') ? 'class=active' : '') }}}><a href="/jadwal_ousbou3i"><span><span class="glyphicon glyphicon-equalizer" aria-hidden="true"></span> الجدول الأسبوعي  <span class="border"></span></span></a></li>


                                <li {{{ (Request::is('traduction') ? 'class=active' : '') }}}><a href="/traduction"><span><span class="glyphicon glyphicon-font" aria-hidden="true"></span> الترجمة  <span class="border"></span></span></a></li>
                                <li {{{ (Request::is('tamache9') ? 'class=active' : '') }}}><a href="/tamache9"><span><span class="glyphicon glyphicon-text-width" aria-hidden="true"></span> اوTماشق  <span class="border"></span></span></a></li>



                                @endguest
					</ul>
				</div>
			</div>
		</nav>
	</header>
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
