<?php
/**
 * File app/Http/Middleware/CorsMiddleware.php
 *
 * Ce fichier contient la classe Cors
 *
 * @author sofianeakbly
 */

namespace App\Http\Middleware;

use Closure;

/**
 *
 * Class CorsMiddleware
 *
 * @package App\Http\Middleware
 */
class CorsMiddleware
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if ($request->getMethod() == "OPTIONS") {
            return response(['OK'], 200)->withHeaders([
//                'Access-Control-Allow-Origin'      => "*",
                'Access-Control-Allow-Methods'     => 'GET, POST, PUT, DELETE, OPTIONS',
                'Access-Control-Allow-Credentials' => true,
                'Access-Control-Allow-Headers'     => 'X-AUTH-TOKEN, Application, Content-Type, Origin',
            ]);
        }

        return $next($request)
//            ->header('Access-Control-Allow-Origin', "*")
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
            ->header('Access-Control-Allow-Credentials', true)
            ->header('Access-Control-Allow-Headers', 'X-AUTH-TOKEN, Application, Content-Type, Origin');
    }

}
