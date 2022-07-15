<?php

namespace Api\Auth\Controllers;
use DB;
use Hash;
use Auth;
use Faker\Provider\Uuid;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Api\Auth\Requests\LoginRequest;
use Api\Auth\Requests\SignUpRequest;
use Api\Users\Models\User;
use App\Exceptions as VNException;
use App\Libraries\Response as VNResponse;

class LoginController extends Controller
{
	protected $VNResponse;

	public function __construct(
		VNResponse $vnResponse
	) {
		$this->vnResponse = $vnResponse;
	}


	public function signUp(SignUpRequest $request){

		$arrName = explode(' ',$request->full_name);
		$this->checkExist($request);
		DB::beginTransaction();
		try{
			$id =(string)Uuid::uuid();
			$user = new User([
				'id'=> $id,
				'full_name' => $request->full_name,
				'name' => end($arrName),
				'email' => $request->email,
				'mobile' => $request->mobile,
				'username' => $request->username,
				'password' => Hash::make($request->password)
			]);
			$user->save();
			DB::commit();
			return $this->vnResponse->renderSuccess('VNS001', $user);
		} catch(\Exception $e) {
			DB::rollBack();
			throw $e;
		}
	}



	public function login(LoginRequest $request){
		$credentials = request(['username', 'password']);
		if(!Auth::attempt($credentials)){
			return $this->vnResponse->renderError('VNE005');
		}
		$user = $request->user(); //lấy ra user dựa trên username, password
		$tokenResult = $user->createToken('Personal Access Token');
		$token = $tokenResult->token;
		if ($request->remember_me){
			$token->expires_at = Carbon::now()->addWeeks(1);
		}
		$token->save();
		$result = [
			'access_token' => $tokenResult->accessToken,
			'token_type' => 'Bearer',
			'expires_at' => Carbon::parse(
				$tokenResult->token->expires_at
			)->toDateTimeString()
		];
		return $this->vnResponse->renderSuccess('VNS001', $result);
	}


	/*----------------------------------------------------------------------------------------------------------*/

	//support service
	private function checkExist($data){
		if(DB::table('users')->where('username',$data->username)->exists()){
			throw new VNException\GeneralException('VNE001');
		}
		if(DB::table('users')->where('email',$data->email)->exists()){
			throw new VNException\GeneralException('VNE002');
		}
		if(DB::table('users')->where('mobile',$data->mobile)->exists()){
			throw new VNException\GeneralException('VNE003');
		}
	}

}