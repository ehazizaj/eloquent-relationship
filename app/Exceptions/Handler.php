<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Handler extends ExceptionHandler
{

    public function render($request, Throwable $e)
    {
        if ($e instanceof ModelNotFoundException && $request->wantsJson()) {
            $jsonError = [
                'error' => true,
                'message' => 'Resource Not Found',
            ];
            return response()->json($jsonError, 404);
        }
        return parent::render($request, $e);
    }

}
