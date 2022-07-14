<?php

namespace App\Libraries;
use \App;

class Response{
    private $status;
    private $code;
    private $data;
    private $message;
    private $config;
    private $fatalError;

    public function __construct()
    {
    }
/*====================================SERVICE METHODS====================================*/


    public function renderSuccess($code = 'VS001', $data = null, $message = null)
    {
        $this->success($code, $data, $message);
        return $this->render();
    }

    public function renderError($code, $message = null, $data = null, $fatalError = null, $parameters = [])
    {
        $this->error($code, $message, $data, $fatalError, $parameters);
        return $this->render();
    }
    public function success($code, $data = null, $message = null)
    {
        $this->data = $data;
        $this->code = $code;
        $this->status = 'success';
        if (!$message) {
            $message = $this->getStatusMessage(null, $this->status);
        }
        $this->message = $message;
    }

    public function error($code, $message = null, $data, $fatalError = null, $parameters = [])
    {
        $this->data = $data;
        $this->code = $code;
        $this->status = 'error';
        if (!$message) {
            $message = $this->getStatusMessage($parameters, $this->status);
        }
        $this->message = $message;
    }

    public function render()
    {
        // $iLog = $GLOBALS['di']->create(iLog::class);
        // $iLog = resolve('\Api\service\ihoadon\Libraries\iLog');
        switch($this->status) {
            case 'success':
                $success = array(
                    'status' => 'success',
                );
                if($this->message) {
                    $success['message'] = $this->message;
                }
                if($this->code) {
                    $success['code'] = $this->code;
                }
                $success['data'] = ($this->data) ? $this->data : (object) array();
                // $iLog->log('return.json', $success);
                // $iLog->logSuccess($success);
                return \Response::json($success, 200, [], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
                break;
            case 'error':
                $error = array(
                    'status'=> 'error',
                    'message'=> $this->message,
                );
                if($this->code) {
                    $error['code'] = $this->code;
                }
                if($this->data) {
                    $error['data'] = $this->data;
                }
                if($this->fatalError) {
                    // $iLog->log('loiHeThong.json', $this->fatalError);
                }
                // $iLog->log('return.json', $error);
                return \Response::json($error, 200, [], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
                break;
        }
    }

    public function getStatusMessage($parameters =[], $status)
    {
        $statusList = file_get_contents(base_path('config/status_list.json'));
        $statusList = json_decode($statusList);
        if($status == "error"){
            foreach ($statusList->error as $code => $message) {
                if ($code == $this->code) {
                    return $this->getMessage($parameters, __($message));
                }
            }
        }elseif($status == "success"){
            foreach ($statusList->success as $code => $message) {
                if ($code == $this->code) {
                    return $this->getMessage($parameters, __($message));
                }
            }
        }
        
    }
    private function getMessage($parameters, $message) {
        if($parameters) {
            $count = count($parameters);
            $arr = [];
            for($i = 0; $i < $count; $i++) {
                $arr[] = '$' . ($i + 1);
            }
            return str_replace($arr, $parameters, $message);
        }else {
            return $message;
        }
    }
/*====================================SUPPORT METHODS====================================*/
    private function getActionName($full_url_action, $logFunction) {
        $action_name = explode('\\', $full_url_action);
        $action_name = end($action_name);
        if(array_key_exists ($action_name, $logFunction)){
            return $action_name;
        }
        return false;
    }
}
