<?php namespace ImagesManager2\Http\Requests;

use ImagesManager2\Http\Requests\Request;


class EditUserProfileRequest extends Request {

	public function authorize()
	{
		return true;
	}


	public function rules()
	{
		return [
			'name' => 'required',
			'password' => 'min:6|confirmed',
			'question' => 'required_with:answer',
			'answer' => 'required_with:question'
		];
	}

}
