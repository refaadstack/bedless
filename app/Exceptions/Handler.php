<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\Auth;
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
            //
        });
    }

    public function unauthenticated($request,\Illuminate\Auth\AuthenticationException $exception) {
        if($request->expectsJson()) {
            return response()->json(['error' => 'Unauthenticated.'],401);
        }

        if(Auth::guard('admin')->check()) {
            return redirect('/admin/dashboard');
        } else {
            return redirect()->route('login.admin');
        }
        // else if(Auth::guard('guru')->check()) {
        //     return redirect('/guru/dashboard');
        // } else if(Auth::guard('siswa')->check()) {
        //     return redirect('/siswa/dashboard');
        // }
    }
}
