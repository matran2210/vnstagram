<?php
namespace App\Libraries;

use \App;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Exceptions as VnException;

class HelperFunction{

    public function __construct()
    {
    }

    public function validateId($id, $attr = 'id') {
		$validator = \Validator::make(["id" => $id], [
            'id' => 'uuid'
        ], [
        	'id.uuid' => $attr . ' phải đúng định dạng uuid'
        ]);
        if ($validator->fails()) {
            throw new VnException\GeneralException("VNE004", null, null, [$validator->errors()->first()]);
        }
	}

}