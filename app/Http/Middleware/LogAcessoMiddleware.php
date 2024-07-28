<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\LogAcesso;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LogAcessoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //return $next($request);
        $ip = $request->server->get('REMOTE_ADDR');
        $route = $request->getRequestUri();

        LogAcesso::create(['log' => "Ip $ip acessou a rota $route"]);

        return Response('Chegamos no middleware e finalizamos no próprio middleware.');
    }
}
