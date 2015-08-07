@extends('app')

@section('content')

@if(Session::has('edited'))
	<div class=" container-fluid alert alert-success">
		{{Session::get('edited')}}<br/><br/>
	</div>
@endif

@if(Session::has('deleted'))
	<div class="container-fluid alert alert-success">
		{{Session::get('deleted')}}<br/><br/>
	</div>
@endif

@if(Session::has('album_created'))
	<div class="container-fluid alert alert-success">
		{{Session::get('album_created')}}<br/><br/>
	</div>
@endif


<div class='container-fluid'>
<p><a href="albums/create-album" class="btn btn-primary">Create Album</a></p>


@if(sizeof($albums) > 0)
	@foreach($albums as $index => $album)

	@if($index%2 == 0)
	<div class='row'>
	@endif

		<div class='col-sm-6'>
			<div class='thumbnail'>
				<div class='caption'>
					<h3> {{$album->title}}</h3>
					<p>{{$album->description}}</p>
					<p><a href="/validated/photos?id={{$album->id}}" class="btn btn-primary">Show Photos</a></p>
					<p><a href="/validated/albums/edit-album/{{$album->id}}" class="btn btn-primary">Edit Album</a></p>

					<form action="/validated/albums/delete-album" method="POST">
						<input type="hidden" name="_token" value="{{ csrf_token() }}" required>
						<input type="hidden" name="id" value="{{ $album->id }}" required>
						<input class="btn btn-danger" role="button" type="submit" value="Delete">
					</form>


				</div>
			</div>
		</div>

	@if(($index+1)%2 == 0)
	</div>
	@endif


	@endforeach

	@else 

	<div class="alert alert-danger">
		<p>You don't have any albums yet.  Why not create one?</p>
	</div>

@endif


</div>

@endsection