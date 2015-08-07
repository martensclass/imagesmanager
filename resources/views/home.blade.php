@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Home</div>

				<div class="panel-body">

				@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					@if (Session::has('edited'))
					<div class="alert alert-success">
						{{Session::get('edited')}}<br/>
					</div>
					@endif

					You are logged in!
					<br><br>
					<a href="auth/logout" class="btn btn-sm btn-danger">Log Out</a>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
