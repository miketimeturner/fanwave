<?php

namespace Fanwave\ApiService\Services\ApiFootball;

use Fanwave\ApiService\Models\Integration;
use Fanwave\ApiService\Services\ApiFootball\Fixtures\Fixtures;

class Api
{
    /**
     * @var Integration
     */
    public Integration $integration;

    public function __construct(Integration $integration)
    {
        $this->integration = $integration;
    }

    /**
     * Fixtures endpoints
     *
     * @return Fixtures
     */
    public function fixtures(): Fixtures
    {
        return new Fixtures($this->integration);
    }
}
