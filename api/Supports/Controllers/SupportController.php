<?php

namespace Api\Supports\Controllers;

use DB;
use Auth;
use Faker\Provider\Uuid;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Exceptions as VnException;
use App\Libraries\Response as VnResponse;
use App\Libraries\HelperFunction;
use Api\Posts\Models\Post;
use Api\Posts\Models\PostFile;
use Storage;
use File;

class SupportController extends Controller
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

	public function download(Request $request){
		$user = Auth::user();
		$fileId = $request->file_id;
		$fileContent = $this->helperFunction->getFileGoogleDriver($fileId);
		return $this->vnResponse->renderSuccess('VNS001', $fileContent);
	}
}
