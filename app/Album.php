<?php namespace ImagesManager2;

use Illuminate\Database\Eloquent\Model;

class Album extends Model {

	protected $table = 'albums';

   protected $fillable = ['id', 'title', 'description','user_id'];


   public function owner()
   {
   	return belongsTo('ImagesManager2\User');
   }

   public function photos()
   {
   	return hasMany('ImagesManager2\Photo');
   }

}
