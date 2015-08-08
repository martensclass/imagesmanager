@extends('app')

@section('content')
<form class="form-horizontal" role="form" method="POST" action="/validated/photos/edit-photo?id={{$photo -> id}}" enctype="multipart/form-data">
 <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="form-group required">
            <label class="col-md-4 control-label">Title</label>
            <div class="col-md-6">
                    <input type="text" class="form-control" name="title" value="{{ $photo->title }}">
            </div>
        </div>

         <div class="form-group required">
            <label class="col-md-4 control-label">Description</label>
            <div class="col-md-6">
                <textarea type="text" class="form-control" name="description" rows="3" required>{{$photo->description}}</textarea>
            </div>
        </div>

         <div class="form-group required">
            <label class="col-md-4 control-label">Image max: 20MB</label>
            <div class="col-md-6">
                    <input type="file" class="form-control" name="image">
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
            <button type="submit" class="btn btn-primary" >
                    Edit Photo 
            </button>   
             <a href = "/validated/photos?id={{$photo -> album_id}}" class="btn btn-danger">Cancel</a>          
        </div>

</form>				
@endsection
