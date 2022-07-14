<?php

namespace Api\Auth\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Api\Auth\Requests\LoginRequest;
use DB;

class LoginController extends Controller
{
	public function login(LoginRequest $request){
		$users = DB::table('users')->get();
		dd($users);
	}

}