<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use \Illuminate\Http\Response;
use Illuminate\Session\TokenMismatchException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

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
     * @param  \Exception $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Transform the response for ModelNotFoundException.
     *
     * @param $exception
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function modelNotFoundExceptionResponse($exception)
    {
        $model = explode("\\", $exception->getModel())[3];
        return response()->json([
            'status' => 'error',
            'message' => "$model not found"
        ], Response::HTTP_NOT_FOUND);
    }

    /**
     * Transform the response for Exception.
     *
     * @param $exception
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function CustomExceptionResponse(Exception $exception)
    {
        // 1 = APP Exceptions / else Internal Error in the code.
        if ($exception->getCode() == 1) {
            return response()->json(['status' => 'error', 'messages' => $exception->getMessage()], Response::HTTP_BAD_REQUEST);
        }
        return response()->json(['status' => 'error', 'messages' => 'Hubo un error. Por favor, intenta de nuevo.', 'errors' => $exception->getMessage()], Response::HTTP_BAD_REQUEST);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Exception $exception
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function render($request, Exception $exception)
    {
        // Implicit model binding exception
        if ($exception instanceof ModelNotFoundException) {
            return $this->modelNotFoundExceptionResponse($exception);
        }
        // Not Found HTTP exception
        if ($exception instanceof NotFoundHttpException) {
            return response()->json(['error' => $exception->getMessage()], Response::HTTP_NOT_FOUND);
        }
        // JWT exceptions
        if ($exception instanceof TokenExpiredException) {
            return response()->json(['error' => 'Token expirado.'], Response::HTTP_UNAUTHORIZED);
        }
        if ($exception instanceof TokenInvalidException) {
            return response()->json(['error' => 'Token inválido.'], Response::HTTP_UNAUTHORIZED);
        }
        if ($exception instanceof JWTException) {
            return response()->json(['error' => 'Token no presente.'], Response::HTTP_NOT_FOUND);
        }
        // Handle api validators
        if ($request->is('api/*') && $exception instanceof ValidationException) {
            return response()->json(['staturs' => "error", "messages" => $exception->errors()], Response::HTTP_BAD_REQUEST);
        }
        // Handle global exceptions
        if ($request->is('api/*') && $exception instanceof Exception) {
            return $this->CustomExceptionResponse($exception);
        }
        // Authorization request rules exception
        if ($exception instanceof AuthorizationException) {
            return response()->json(['error' => $exception->getMessage()], Response::HTTP_UNAUTHORIZED);
        }
        // Laravel handle this exception internally
        if ($exception instanceof ValidationException) {
            return parent::render($request, $exception);
        }

        //419 Redirect home
        if ($exception instanceof TokenMismatchException) {
            return redirect()->route('site');
        }

        return parent::render($request, $exception);
    }
}
