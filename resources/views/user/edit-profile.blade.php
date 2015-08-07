@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Edit Your Profile</div>
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

					<form class="form-horizontal" role="form" method="POST" action="/validated/user/edit-profile">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">Name</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="name" value="{{ Auth::user() -> name }}">
							</div>
						</div>
						<div class="well">
						<div class="form-group">
							<label class="col-md-4 control-label">New Password <small>(optional)</small></label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Confirm Password <small>(if new)</small></label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password_confirmation">
							</div>
						</div>
						</div>
						<div class="well">
						<div class="form-group">
							<label class="col-md-4 control-label">New Security Question <small>(optional)</small></label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="question" value="{{ Auth::user() -> question }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Answer to Question <small>(if new)</small></label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="answer">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Retype Answer <small>(if new)</small> </label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="answer_confirmation">
							</div>
						</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Update Profile
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
