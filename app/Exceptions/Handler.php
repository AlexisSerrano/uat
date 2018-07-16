<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

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
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        /* inicio implenentacion de pantallas de error 404,500,etc. */
        
        if($this->isHttpException($exception)){
            switch ($exception->getStatusCode()) {
                // PAGINA NO ENCONTRADA
                case 404:
                    return response()->view('servicios.errores.404',[],404);
                break;
                // ERROR INTERNO DEL SERVIDOR
                case 500:
                    return response()->view('servicios.errores.500',[],500);    
                break;
                //ERROR DE ACCESO DENEGADO(PERMISOS)
                case 403:
                    return response()->view('servicios.errores.403',[],403);    
                break;
                default:
                    return $this->renderHttpException($exception);
                break;
            }
        }


        /* fin implenentacion de pantallas de error 404,500,etc. */


        return parent::render($request, $exception);
    }

    
}
