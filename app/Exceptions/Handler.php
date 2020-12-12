<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Exception;
use App\Http\Utils\ApiResponser;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;

class Handler extends ExceptionHandler
{
    use ApiResponser;
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
     * @throws \Exception
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
    {
        if ($exception instanceof NotFoundHttpException) {
            return $this->errorResponse('No se encontro la URL especificada', 404);
        }

        if ($exception instanceof ModelNotFoundException) {
            $modelo = strtolower(class_basename($exception->getModel()));
            return $this->errorResponse("No existe ninguna instancia de {$modelo} con el id especificado", 404);
        }

        if ($exception instanceof AuthenticationException) {
            return $this->unauthenticated($request, $exception);
        }

        if ($exception instanceof AuthorizationException) {
            return $this->errorResponse("No posee permisos para ejecutar esta accion", 403);
        }

        if ($exception instanceof MethodNotAllowedHttpException) {
            return $this->errorResponse("El metodo especificado en la petición no es valido", 405);
        }
        if ($exception instanceof UnauthorizedHttpException) {
            $preException = $exception->getPrevious();
            if ($preException instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException) {
                return $this->errorResponse("El token ha expirado", 401);
            } else if ($preException instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException) {
                return $this->errorResponse("El token no es valido", 401);
            } else if ($preException instanceof \Tymon\JWTAuth\Exceptions\TokenBlacklistedException) {
                return $this->errorResponse("Token BLACKLISTED", 401);
            }
            if ($exception->getMessage() === 'Token not provided') {
                return $this->errorResponse("Inserta tu token pues hermano!", 401);
            }
        }

        if ($exception instanceof HttpException) {
            return $this->errorResponse($exception->getMessage(), $exception->getStatusCode());
        }

        // if ($exception instanceof QueryException) {
        //     $codigo = $exception->errorInfo[1];

        //     if ($codigo = 1451) {
        //         return $this->errorResponse('No se puede eliminar de forma permanente el recurso porque esta relacionado con algún otro.', 409);
        //     }
        // }


        if (config('app.debug')) {
            return parent::render($request, $exception);
        }

        return $this->errorResponse("Falla inesperada en MATRIX. Intente mas tarde.", 500);
    }
}
