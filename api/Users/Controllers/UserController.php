<?php

namespace Api\Users\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class UserController extends Controller
{
	public function getAll(){
		$users = DB::table('users')->get();
		dd($users);
	}
}
