<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

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
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
           
        });

        // $this->renderable(function (NotFoundHttpException $e, $request) {
        //     if($request->is('api/*')){
        //         return response()->json([
        //             'getMessage' => "The specified URL cannot be found @R"
        //         ],404);
        //     }
        // });

        // $this->renderable(function (ModelNotFoundException $e, $request) {
        //     if($request->is('api/*')){
        //         $modelName = strtolower(class_basename($e->getModel()));
        //         return response()->json([
        //             'getMessage' => "Does not exists any {$modelName} with the specified identificator @R"
        //         ],404);
        //     }
        // });

        // $this->renderable(function (AuthorizationException $e, $request) {
        //     if($request->is('api/*')){
        //         return response()->json([
        //             $e->getMessage()
        //         ],403);
        //     }
        // });

        // $this->renderable(function (MethodNotAllowedHttpException $e, $request) {
        //     if($request->is('api/*')){
        //         return response()->json([
        //             'getMessage' => "The specified method for the request is invalid @R"
        //         ],405);
        //     }
        // }); 

        // $this->renderable(function (HttpException $e, $request) {
        //     if($request->is('api/*')){
        //         return response()->json([
        //             $e->getMessage()
        //         ],$e->getStatusCode());
        //     }
        // });


        // $this->renderable(function (QueryException $e, $request) {
        //     if($request->is('api/*')){
        //         $errorCode = $e->errorInfo[1];
        //         if ($errorCode == 1451) {
        //             return response()->json([
        //                 'getMessage' => "Cannot remove this resource permanently. It is related with any other resource @R"
        //             ],409);
        //         }
        //     }
        // }); 

        
    }
}
