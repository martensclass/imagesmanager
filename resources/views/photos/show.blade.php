@extends('app')

@section('content')

@if(Session::has('created'))
	<div class="alert alert-success">
		{{Session::get('created')}}<br/><br/>
	</div>
@endif

@if(Session::has('edited'))
	<div class="alert alert-success">
		{{Session::get('edited')}}<br/><br/>
	</div>
@endif

@if(Session::has('deleted'))
	<div class="alert alert-success">
		{{Session::get('deleted')}}<br/><br/>
	</div>
@endif
<div class='container-fluid'>
<H3 class='pull-left' style="margin-top: 5px;margin-right:20px">Photos for: {{$title}}</H3>
<p><a href="/validated/photos/create-photo?id={{$id}}" class="btn btn-primary pull-left">Add New Photo</a></p>

<br/><br/>
</div>
<div class='container-fluid'>


@if(sizeof($photos) > 0)
	@foreach($photos as $index => $photo)

	@if($index%3 == 0)
	<div class='row'>
	@endif

	<div class='col-sm-4 col md-4'>
		<div class='thumbnail'>
		<img src="{{$photo->path}}" class="img img-respsonsive">
			<div class='caption'>
				<h3> {{$photo->title}}</h3>
				<p>{{$photo->description}}</p>
				<p><a href="/validated/photos/edit-photo/{{$photo->id}}" class="btn btn-primary">Edit Photo</a></p>

				<form action="/validated/photos/delete-photo" method="POST">
					<input type="hidden" name="_token" value="{{ csrf_token() }}" required>
					<input type="hidden" name="id" value="{{ $photo->id }}" required>
					<input class="btn btn-danger" role="button" type="submit" value="Delete">
				</form>


			</div>
		</div>
	</div>

	@if( ($index+1)%3 == 0)
		</div>
	@endif

	@endforeach

	@else 

	<div class="alert alert-danger">
		<p>You don't have any photos in this album yet.  Why not add some?</p>
	</div>

@endif

</div>

@endsection