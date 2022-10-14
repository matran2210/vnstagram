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
use Api\Posts\Models\PostFile;
use Storage;
use File;

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
			//temp
			// $pathTemp = config('config.export_dir') .'/a.jpg';
			// $fileTemp =  File::get($pathTemp);

			// $folderDriver = config('config.google_driver')['folder'];
			// Storage::disk('google')->put($folderDriver['posts'].'/a.jpg', $fileTemp);
			// $details = \Storage::disk("google")->getMetadata($folderDriver['posts'].'/a.jpg');


			//get file từ id file ($details['path'] là id file)
			//$file = Storage::disk('google')->get($details['path']);

			//fix tạm
			$attachFileName = date('Ymdhis').'_'. mt_rand(1000000000, 9999999999) . '_img.jpg';
			$details['path'] = '1EcgltgvQAKhJ0lzv4C4Xf9g0JbS-aoi7/1A81zRpxY8NImTCg4E9rTYPk0j3Oucxzz';

			//create posts
			$post = new Post([
				'id'=> (string)Uuid::uuid(),
				'user_id' => $user->id,
				'title' => $request->title,
				'content' => $request->content
			]);
			$post->save();

			//create post_files
			$postFile = new PostFile([
				'id'=> (string)Uuid::uuid(),
				'post_id' => $post->id,
				'file_name' => $attachFileName,
				'file_id' => $details['path']
			]);
			$postFile->save();


			$post['post_files'] = $postFile;
			DB::commit();
			return $this->vnResponse->renderSuccess('VNS001', $post);
		} catch(\Exception $e) {
			DB::rollBack();
			throw $e;
		}
	}
	public function update($postId, UpdatePostRequest $request){
		$this->helperFunction->validateId($postId);
		$post = Post::findOrFail($postId);
		if(!$post){
			//đối tượng không tồn tại
			throw new VnException\GeneralException("VNE998");	
		}

		DB::beginTransaction();
		try {
			$post->title = $request->title;
			$post->content = $request->content;
			$post->save();

			//xử lý update file đính kèm

			DB::commit();
			return $this->vnResponse->renderSuccess('VNS001', $post);
		} catch (\Exception $e) {
			DB::rollBack();
			throw $e;
		}
	}

	public function delete($postId){
		$this->helperFunction->validateId($postId);
		$post = Post::findOrFail($postId);
		if(!$post){
			//đối tượng không tồn tại
			throw new VnException\GeneralException("VNE998");	
		}
		$postFiles = $post->postFile;
		DB::beginTransaction();
		try {
			$post->delete();
			foreach($postFiles as $postFile){
				$postFile->delete();
			}
			DB::commit();
			return $this->vnResponse->renderSuccess('VNS005');
		} catch (\Exception $e) {
			DB::rollBack();
			throw $e;
		}
	}
}
