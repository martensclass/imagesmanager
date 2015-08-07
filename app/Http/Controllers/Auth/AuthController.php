<?php namespace ImagesManager2\Http\Controllers\Auth;

use ImagesManager2\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

use ImagesManager2\User;
use ImagesManager2\Http\Requests\PasswordRecoveryRequest;

use Hash;

class AuthController extends Controller {


	use AuthenticatesAndRegistersUsers;

	public function __construct(Guard $auth, Registrar $registrar)
	{
		$this->auth = $auth;
		$this->registrar = $registrar;

		$this->middleware('guest', ['except' => 'getLogout']);
	}

	public function getRecoverPassword()
	{
		return view('auth.recover');
	}


	public function postRecoverPassword(PasswordRecoveryRequest $request)
	{
		$question = $request->get('question');
		$answer = $request->get('answer');

		$user = User::where('email', $request->get('email'))->first();

		if($user->question === $question && Hash::check($answer,$user->answer))
		{
			$user->password = bcrypt($request->get('password'));
			$user->save();

			return redirect('auth/login')
			->with(['success' => 'The password was changed']);
		}

		return redirect('auth/recover-password')
			->withInput($request->only('email', 'question'))
			->withErrors('The answer or question does not match');
	}

	
	// public function getFoo()
	// {
	// 	return view('auth.foo');
	// }


}
