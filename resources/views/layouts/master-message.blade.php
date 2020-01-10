@if($errors->any())
<div class="alert alert-danger alert-dismissible fade show" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
	<ul>
		@foreach ($errors->all() as $error)
		<li>{{$error}}</li>
		@endforeach
	</ul>
</div>
@endif

@if(\Session::has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
	<p>{{\Session::get('success')}}</p>
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
@elseif(\Session::has('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
	<p>{{\Session::get('error')}}</p>
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
@endif
