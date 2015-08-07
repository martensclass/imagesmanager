<?php namespace ImagesManager2\Http\Requests;

use ImagesManager2\Http\Requests\Request;

class CreateAlbumRequest extends Request {


	public function authorize()
	{
		return true;
	}


	public function rules()
	{
		return [
			'title' => 'required',
			'description' => 'required'
		];
	}

}
