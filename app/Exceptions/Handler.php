<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use App\Exceptions as VnException;
use App\Libraries\Response;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Throwable
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {   return $this->renderApiException($request, $exception);
        return parent::render($request, $exception);
    }

    protected function renderApiException($request, $exception) {
        $response = new Response();
        $debugMode = \Config('config.app_debug');
        if($exception instanceof ExceptionInterface) {
            $message = $response->renderError($exception->getCode(), $exception->getMessage(), $exception->getData(), null, $exception->getParameters());
        } else if($exception instanceof \Illuminate\Database\QueryException) {
            if($debugMode) {
                $message = $response->renderError('VNE006', $exception->getMessage(), null, $exception->getMessage());
            }else {
                $message = $response->renderError('VNE006', null, null, $exception->getMessage());
            }
        } else if($exception instanceof \Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException) {
            $message = $response->renderError('VNE001', null, null, $exception->getMessage());
        } else if($exception instanceof \Symfony\Component\HttpKernel\Exception\NotFoundHttpException) {
            $message = $response->renderError('VNE002', null, null, $exception->getMessage());
        } else {
            //loi chua xac dinh
            if($debugMode) {
                $message = $response->renderError('VNE999', 'File: ' . $exception->getFile() . ', Line: ' . $exception->getLine() . ', Message: ' . $exception->getMessage(), null, $exception->getMessage());
            }else {
                $message = $response->renderError('VNE999', null, null, $exception->getMessage());
            }
        }
        return $message;
    }
}
