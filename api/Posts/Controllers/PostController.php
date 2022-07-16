<?php

namespace Api\Posts\Controllers;

use DB;
use Auth;
use Faker\Provider\Uuid;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Exceptions as VnException;
use App\Libraries\Response as VnResponse;
use App\Libraries\HelperFunction;
use Api\Posts\Requests\UpdatePostRequest;
use Api\Posts\Requests\CreatePostRequest;
use Api\Posts\Models\Post;

class PostController extends Controller
{

	protected $vnResponse;
	protected $helperFunction;

	public function __construct(
		VnResponse $vnResponse,
		HelperFunction $helperFunction
	) {
		$this->vnResponse = $vnResponse;
		$this->helperFunction = $helperFunction;
	}

	public function getAll(){
		dd(1);
	}

	public function create(CreatePostRequest $request){
		$user = Auth::user();
		DB::beginTransaction();
		try{

			$post = new Post([
				'id'=> (string)Uuid::uuid(),
				'user_id' => $user->id,
				'title' => $request->title,
				'content' => $request->content
			]);
			$post->save();

			DB::commit();
			return $this->vnResponse->renderSuccess('VNS001', $post);
		} catch(\Exception $e) {
			DB::rollBack();
			throw $e;
		}
	}
	public function update($userId, UpdatePostRequest $request){
		$this->helperFunction->validateId($userId);
		$user = User::findOrFail($userId);
		if(!$user){
				//đối tượng không tồn tại
			throw new VnException\GeneralException("VNE998");	
		}

		if(DB::table('users')
			->where('email',$request->email)
			->where('id','!=',$user->id)->exists()
		){
			throw new VnException\GeneralException("VNE002");
	}

	if(DB::table('users')
		->where('mobile',$request->mobile)
		->where('id','!=',$user->id)->exists()
	){
		throw new VnException\GeneralException("VNE003");
}

if($request->password != $request->re_password){
	throw new VnException\GeneralException("VNE006");			
}

DB::beginTransaction();
try {
	$user->email = $request->email;
	$user->full_name = $request->full_name;
	$user->name = $request->name;
	$user->mobile = $request->mobile;
	$user->address = $request->address;
	$user->date_of_birth = $request->date_of_birth;
	$user->sex = $request->sex;
	$user->permissions = $request->permissions;
	$user->save();
	DB::commit();
	return $this->vnResponse->renderSuccess('VNS001', $user);
} catch (\Exception $e) {
	DB::rollBack();
	throw $e;
}
}

public function delete($userId){
	$this->helperFunction->validateId($userId);
	$user = User::findOrFail($userId);
	if(!$user){
				//đối tượng không tồn tại
		throw new VnException\GeneralException("VNE998");	
	}
	DB::beginTransaction();
	try {
		$user->delete();
		DB::commit();
		return $this->vnResponse->renderSuccess('VNS005');
	} catch (\Exception $e) {
		DB::rollBack();
		throw $e;
	}
}
}
