<?php
 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

 
class RegisterController extends Controller
{

	public function save(Request $request){
		if(Auth::check()) {
		return redirect(route('user.home-user'));
	}
	$validateFields = $request->validate([
		'email' => 'required|email',
		'password' => 'required|confirmed|min:6',
		'phone' => 'required',
		'name' => 'required',
		
	]);
	if(User::where('email', $validateFields['email'])->exists()){
		return redirect(route('user.registration'))->withErrors([
			'email' => 'Користувача з таким email вже зареєстровано'
		]);
	}
	$user = User::create($validateFields);

	if($user) {
		Auth::login($user);
		return redirect(route('user.home-user'));

	}
	return redirect(route('user.login'))->withErrors([
		'formError' => 'Помилка під час збереження користувача'
	]);
	}
	


}