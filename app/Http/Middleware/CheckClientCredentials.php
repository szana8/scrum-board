<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Laravel\Passport\Client;
use Laravel\Passport\Exceptions\MissingScopeException;
use Laravel\Passport\Http\Middleware\CheckClientCredentials as PassportClientCredentials;
use Laravel\Passport\TokenRepository;
use League\OAuth2\Server\Exception\OAuthServerException;
use League\OAuth2\Server\ResourceServer;
use Nyholm\Psr7\Factory\Psr17Factory;
use Symfony\Bridge\PsrHttpMessage\Factory\PsrHttpFactory;

class CheckClientCredentials extends PassportClientCredentials
{
    public function __construct(ResourceServer $server, TokenRepository $repository)
    {
        parent::__construct($server, $repository);
    }

    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param  Closure  $next
     * @param  mixed  ...$scopes
     * @return mixed
     *
     * @throws AuthenticationException
     * @throws MissingScopeException
     */
    public function handle($request, Closure $next, ...$scopes)
    {
        $psr = (new PsrHttpFactory(
            new Psr17Factory,
            new Psr17Factory,
            new Psr17Factory,
            new Psr17Factory
        ))->createRequest($request);
        try {
            $psr = $this->server->validateAuthenticatedRequest($psr);
            $clientID = $psr->getAttribute('oauth_client_id');
            $request->request->set('client_id', $clientID);

            $request->setUserResolver(function () use ($clientID) {
                return Client::where('id', $clientID)->first()->user;
            });

            if (!auth()->user()) {
                \Auth::setUser($request->user());
            }

        } catch (OAuthServerException $e) {
            throw new AuthenticationException;
        }

        $this->validate($psr, $scopes);

        return $next($request);
    }
}
