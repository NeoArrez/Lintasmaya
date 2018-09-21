<!DOCTYPE html>
<html lang="en">
@include('partial._head')

<body>
	{{-- @include('partial._banner') --}}
	@include('partial._messages')
	<div class="loginpage">
		@yield('content')
	</div>
	
	{{-- <div id='sect1' class="col-md-6">
		<button id='bsect1' class="btn bsect1">
			<a class ="bsect1" href="{{ url('isp') }}">ISP</a>
		</button>
	</div>
	<div id='sect2' class="col-md-6">
		<button id='bsect2' class="btn bsect2">
			<a class ="bsect2" href="{{ url('hosting') }}">HOSTING</a>
		</button>
	</div>

	<div id='sect3' class="col-md-6">
		<button id='bsect3' class="btn bsect2">
			<a class ="bsect3" href="{{ url('isp') }}">HOSTING</a>
		</button>
	</div>
	<div id='sect4' class="col-md-6">
		<button id='bsect4' class="btn bsect2">
			<a class ="bsect4" href="{{ url('isp') }}">ISP</a>
		</button>
	</div> --}}
	@include('partial._javascripts')
	@include('partial._footer')
</body>
</html>