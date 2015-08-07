<?php namespace ImagesManager2\Http\Requests;

use ImagesManager2\Http\Requests\Request;
use Auth;

class ShowPhotoRequest extends Request {

	
	public function authorize()
	{
		$user = Auth::user();

		$id = $this->get('id');

		$album = $user->albums()->find($id);

		if($album)
		{
			return true;
		}
		return false;
	}

	public function rules()
	{
		return [
			'id' => 'required'
		];
	}

	public function forbiddenResponse()
	{
		return $this->redirector->to('/');
	}

}