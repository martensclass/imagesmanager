<?php namespace ImagesManager2;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	protected $table = 'users';

	
	protected $fillable = ['name', 'email', 'password', 'question','answer'];

	
	protected $hidden = ['password', 'remember_token'];

	public function albums()
    {
        return $this -> hasMany('ImagesManager2\Album');
    }

}
