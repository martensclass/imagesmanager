<?php namespace ImagesManager2\Http\Requests;

use ImagesManager2\Http\Requests\Request;

class PasswordRecoveryRequest extends Request {


	public function authorize()
	{
		return true;
	}

	public function rules()
	{
		return [
			'email' => 'email|required|exists:users,email',
			'password' => 'required|min:6|confirmed',
			'question' => 'required',
			'answer' => 'required'
		];
	}

}
