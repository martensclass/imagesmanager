<?php namespace ImagesManager2;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model {

	protected $table = 'photos';

   protected $fillable = ['id', 'title', 'description','path', 'album_id'];

   public function album()
   {
   	return $this->belongsTo('ImagesManager2\Album');
   }

}
