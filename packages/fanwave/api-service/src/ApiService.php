<?php

namespace Fanwave\ApiService;

use Fanwave\ApiService\Models\Integration;

class ApiService
{
    /**
     * ApiService routes us to the correct API base on the service key
     *
     * @param Integration $integration
     * @return mixed
     */
    public static function api(Integration $integration): mixed
    {
        $className = "Fanwave\ApiService\Services\\{$integration->service->key}\\Api";

        return new $className($integration);
    }
}
