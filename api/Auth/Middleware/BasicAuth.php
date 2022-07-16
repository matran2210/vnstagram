<?php

namespace Api\Auth\Middleware;
use App\Exceptions as VnException;

use Closure;

class BasicAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $requestUsername = (@$request->header()['php-auth-user'][0]) ? $request->header()['php-auth-user'][0] : '';
        $requestPassword = (@$request->header()['php-auth-pw'][0]) ? $request->header()['php-auth-pw'][0] : '';
        $basicAuth = \config('config.basic_auth');
        foreach($basicAuth as $value) {
            if($value['username'] == $requestUsername && $value['password'] == $requestPassword) {
                return $next($request);
            }
        }
        throw new VnException\GeneralException('VNE007');
    }
}
