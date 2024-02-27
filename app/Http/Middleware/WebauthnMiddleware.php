<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use LaravelWebauthn\Facades\Webauthn;

class WebauthnMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Webauthn::webauthnEnabled()) {
            // abort_if($this->auth->guard($guard)->guest(), 401, /** @var string $m */ $m = trans('webauthn::errors.user_unauthenticated'));

            // if (Webauthn::enabled($request->user($guard))) {
            //     if ($request->hasSession() && $request->session()->has('url.intended')) {
            //         return Redirect::to(route('webauthn.login'));
            //     } else {
            //         return Redirect::guest(route('webauthn.login'));
            //     }
            // }
            if(Webauthn::canRegister($request->user()) == true){
                return Redirect::to(route('webauthn.create'));
            }else{
                return Redirect::to(route('webauthn.login'));
            }
        }

        return $next($request);
    }
}
