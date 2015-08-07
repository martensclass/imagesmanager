<?php

namespace ImagesManager2\Exceptions;

use Exception;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        HttpException::class,
    ];

  
    public function report(Exception $e)
    {
        //return parent::report($e);
        return "Sorry an error occured"
    }

 
    public function render($request, Exception $e)
    {
        //return parent::render($request, $e);
        return "Sorry an error occured"
    }
}

