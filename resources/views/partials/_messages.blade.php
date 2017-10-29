@if(Session::has('success'))

	<div class="alert alert-success" role="alert">
  		<strong>Well done!</strong> {{ Session::get('success') }}
	</div>

@endif

@if (count($errors) > 0)
	<div class="alert alert-danger" role="alert">
  		<strong>Oh snap!</strong> 
  		<ul>
  		@foreach($errors as $error)
  			<li>{{ $error }}</li>
  		@endforeach
  		</ul>
	</div>
@endif