<?php
namespace App\Libraries;

use \App;
use Storage;
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
    public function pushFileGoogleDriver($fileName,$fileContent,$nameFolder){
        try{
            $folderDriver = config('config.google_driver')['folder'];
            Storage::disk('google')->put($folderDriver[$nameFolder].'/'.$fileName, $fileContent);
            $details = \Storage::disk("google")->getMetadata($folderDriver[$nameFolder].'/'.$fileName);
            $fileId = $details['path'];
            return $fileId;
        }
        catch(VnException $e){
            throw $e;
        }
    }
    public function getFileGoogleDriver($fileId)
    {
        //get file content từ id file ($details['path'] là id file)
        try{
            $file = base64_encode(Storage::disk('google')->get($fileId));
        }
        catch(\Exception $e){
            $file = null;
        }
        
        return $file;
    }

}