// app/Exceptions/Handler.php

public function render($request, Throwable $exception)
{
    if ($exception instanceof \Illuminate\Database\Eloquent\ModelNotFoundException) {
        return response()->view('errors.404', [], 404);
    }

    if ($exception instanceof TokenMismatchException) {
        return response()->view('errors.419', [], 419);
    }

    if ($exception instanceof BadRequestHttpException) {
        return response()->view('errors.400', [], 400);
    }

    if ($exception instanceof AuthenticationException) {
        return response()->view('errors.401', [], 401);
    }

    if ($exception instanceof AuthorizationException) {
        return response()->view('errors.403', [], 403);
    }

    if ($exception instanceof MethodNotAllowedHttpException) {
        return response()->view('errors.405', [], 405);
    }

    if ($exception instanceof ThrottleRequestsException) {
        return response()->view('errors.429', [], 429);
    }

    if ($exception instanceof \Exception) {
        return response()->view('errors.500', [], 500);
    }

    if ($exception instanceof HttpException && $exception->getStatusCode() === 503) {
        return response()->view('errors.503', [], 503);
    }

    return parent::render($request, $exception);
}
