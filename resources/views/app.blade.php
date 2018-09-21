<!DOCTYPE html>
<html lang="en">
@include('partial._head')

<body>
	<section>
		@include('partial._banner')
		@include('partial._nav')
	</section>
	<section>
	@include('partial._messages')
	@yield('content')
	</section>
	<section>
	@include('partial._javascripts')
	@include('partial._footer')
	</section>

</body>
</html>
