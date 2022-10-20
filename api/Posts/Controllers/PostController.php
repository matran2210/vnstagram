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
		$user = Auth::user();
		 //note* nếu muốn phân trang, dùng skip, ví dụ skip(30), tức là sang trang thứ 3 với (15 row/1 trang)
		$query = Post::select('id','user_id','title','content','created_at');
		$query = $query->leftJoin('post_files as pf')->on('pf.post_id')
		$query = $query->limit(15);
		$posts = $query->get();
		return $posts;
	}

	public function create(CreatePostRequest $request){
		$user = Auth::user();
		DB::beginTransaction();
		try{

			//create posts
			$post = new Post([
				'id'=> (string)Uuid::uuid(),
				'user_id' => $user->id,
				'title' => $request->title,
				'content' => $request->content
			]);
			$post->save();

			if($request->attachFile){
				$attachFile = $request->attachFile;
				$fileName = $attachFile['fileName'];
				$fileContent = base64_decode(explode(',',$attachFile['fileContent'])[1]);
				$fileId = $this->helperFunction->pushFileGoogleDriver($fileName,$fileContent,'posts');

				//create post_files
				$postFile = new PostFile([
					'id'=> (string)Uuid::uuid(),
					'post_id' => $post->id,
					'file_name' => $fileName,
					'file_id' => $fileId
				]);
				$postFile->save();
				$post['post_files'] = $postFile;
			}
			
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
