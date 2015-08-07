<?php namespace ImagesManager2\Http\Controllers;

use ImagesManager2\Http\Requests;
use ImagesManager2\Http\Controllers\Controller;

use Illuminate\Http\Request;

use ImagesManager2\Http\Requests\EditUserProfileRequest;

use Auth;
use Hash;

class UserController extends Controller {

	public function __construct()
    {
    	$this->middleware('auth');
    }

    public function getEditProfile()
    {
    	return view('user.edit-profile');
    }
    
    public function postEditProfile(EditUserProfileRequest $request)
    {
    	
        $user = Auth::user();

        $user->name = $request->get('name');

        if($request->has('password'))
        {
            $user->password = bcrypt($request->get('password'));            
        }

         if($request->has('question') || $request->has('answer'))
        {
            $user->question = $request->get('question');
            $user->answer = bcrypt($request->get('answer'));            
        }

        $user->save();

        return redirect('/home')->with(['edited' => 'Your profile has been updated']);

    }

}
