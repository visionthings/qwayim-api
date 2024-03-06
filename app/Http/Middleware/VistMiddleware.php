<?php

namespace App\Http\Middleware;

use App\Models\Vist;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Str;
class VistMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // $getCookie = Cookie::get('vist_id');
        // if(!$getCookie){
        //     $cookie_id = Str::uuid();
        //     Vist::create([
        //         'vist_id'=>$cookie_id,
        //     ]);
        //     Cookie::queue('vist_id', $cookie_id,60*60*24);  
        // }
        return $next($request);
    }
}
