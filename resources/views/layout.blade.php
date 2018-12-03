<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>{{ config('app.name') }} | @yield('title')</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css')}}">
	<link rel="icon" type="image/gif" href="{{ asset('img/logo.png') }}">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css') }}">
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

	<script src="{{ asset('js/vendor/jquery-3.3.1.min.js') }}"></script>
	<script src="{{ asset('js/vendor/popper.min.js') }}"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
	<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
</head>
<body>
	<nav class="main-menu">
		<ul>
			<li>
				<a href="{{ route('criteria.index') }}"><i class="fa fa-cus fa-2x"><img src="{{ asset('img/logo.png') }}" width="35"></i><span class="nav-text"><b>{{ config('app.name') }}</b></span></a>
			</li>
			<br>
			<li>
				<a href="{{ route('criteria.index') }}"><i class="fa fa-file fa-cus fa-2x"></i><span class="nav-text">Kriteria</span></a>
			</li>
			<li>
				<a href="{{ route('alternative.index') }}"><i class="fa fa-user fa-cus fa-2x"></i><span class="nav-text">Alternatif</span></a>
			</li>
			<li>
				<a href="{{ route('score.index') }}"><i class="fa fa-list fa-cus fa-2x"></i><span class="nav-text">Penilaian</span></a>
			</li>
			<li>
				<a href="{{ route('scoring.index') }}"><i class="fa fa-calculator fa-cus fa-2x"></i><span class="nav-text">Perhitungan</span></a>
			</li>
			<li>

			</li>
		</ul>
		<ul class="logout">
			<li>
				<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-power-off fa-cus fa-2x"></i><span class="nav-text">Logout</span></a>
				<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
			</li>
		</ul>
	</nav>
	<div class="area">
		<div class="container-fluild">
			@yield('content')
		</div>
	</div>
</body>
</html>