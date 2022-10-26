<?php

namespace Fanwave\ApiService\Services\ApiFootball;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;
use Fanwave\ApiService\Models\Integration;

class Base
{
    public function __construct(protected Integration $integration)
    {
    }

    /**
     * This is the base request used for all endpoints for this service
     *
     * @return PendingRequest
     */
    public function request(): PendingRequest
    {
        return Http::withHeaders([
            'X-RapidAPI-Key' => $this->integration->credentials->access_token,
            'X-RapidAPI-Host' => 'api-football-v1.p.rapidapi.com'
        ]);
    }
}
