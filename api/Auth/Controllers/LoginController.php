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
use App\Exceptions as VnException;
use App\Libraries\Response as VnResponse;

class LoginController extends Controller
{
	protected $vnResponse;

	public function __construct(
		VnResponse $vnResponse
	) {
		$this->vnResponse = $vnResponse;
	}


	public function signUp(SignUpRequest $request){

		$this->checkExist($request);
		if($request->password != $request->re_password){
			throw new VnException\GeneralException("VNE006");
		}
		DB::beginTransaction();
		try{
			
			$user = new User([
				'id'=> (string)Uuid::uuid(),
				'full_name' => $request->full_name,
				'name' => $request->name,
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
			throw new VnException\GeneralException('VNE001');
		}
		if(DB::table('users')->where('email',$data->email)->exists()){
			throw new VnException\GeneralException('VNE002');
		}
		if(DB::table('users')->where('mobile',$data->mobile)->exists()){
			throw new VnException\GeneralException('VNE003');
		}
	}

}