	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="/home">ISP</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

				<ul class="nav navbar-nav">
					<li class="dropdown">
					    <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Data
					   	</a>
					    <ul class="dropdown-menu">
					      <li class="dropdown-item"><a href="{{ url('/pelanggan') }}">Pelanggan</a></li>
					      <li class="dropdown-item"><a href="{{ url('/bts') }}">BTS</a></li>
				    	  <li role="separator" class="divider"></li>
					      <li class="dropdown-item"><a href="{{ url('#') }}">-</a></li>
					    </ul>
					</li>
				</ul>

				<ul class="nav navbar-nav">
					<li class="dropdown">
					    <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Rekening Pembayaran
					   	</a>
					    <ul class="dropdown-menu">
					      <li class="dropdown-item"><a href="{{ url('#') }}">Group Rekening</a></li>
					      <li class="dropdown-item"><a href="{{ url('#') }}">Rekening</a></li>
					      <li class="dropdown-item"><a href="{{ url('#') }}">Pembayaran Rekening</a></li>
				    	  <li role="separator" class="divider"></li>
					      <li class="dropdown-item"><a href="{{ url('#') }}">-</a></li>
					    </ul>
					</li>
				</ul>

				<ul class="nav navbar-nav">
					<li class="{{ Request::is('/') ? "active" : "" }}"><a href="{{ url('/invoice') }}">Invoice</a></li>
				</ul>

				<ul class="nav navbar-nav">
					<li class="dropdown">
					    <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Laporan
					   	</a>
					    <ul class="dropdown-menu">
					      <li class="dropdown-item"><a href="{{ url('#') }}">Laporan Pelanggan</a></li>
					      <li class="dropdown-item"><a href="{{ url('#') }}">Laporan Invoice Belum Bayar</a></li>
					      <li class="dropdown-item"><a href="{{ url('#') }}">Histori Pembayaran</a></li>
					      <li class="dropdown-item"><a href="{{ url('#') }}">Mutasi Bank</a></li>
				    	  <li role="separator" class="divider"></li>
					      <li class="dropdown-item"><a href="{{ url('#') }}">-</a></li>
					    </ul>
					</li>
				</ul>

				<ul class="nav navbar-nav">
					<li class="{{ Request::is('/karyawan') ? 'active' : '' }}"><a href="{{ url('/karyawan') }}">Karyawan</a></li>
				</ul>

				<ul class="nav navbar-nav">
					<li class="dropdown">
					    <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Setting
					   	</a>
					    <ul class="dropdown-menu">
					      <li class="dropdown-item"><a href="{{ url('#') }}">Setting</a></li>
					      <li class="dropdown-item"><a href="{{ url('/user') }}">Administrator</a></li>
				    	  <li role="separator" class="divider"></li>
					      <li class="dropdown-item"><a href="{{ url('#') }}">-</a></li>
					    </ul>
					</li>
				</ul>


				<ul class="nav navbar-nav navbar-right">
					@if (Auth::guest())
						<li><a href="{{ url('/auth/login') }}">Login</a></li>
						{{-- <li><a href="{{ url('/auth/register') }}">Register</a></li> --}}
					@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ ucwords(Auth::user()->NamaLengkap) }}<span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{{ url('/auth/logout') }}">Logout</a></li>
							</ul>
						</li>
					@endif
				</ul>
			</div>
		</div>
	</nav>