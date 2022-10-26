<?php

namespace Fanwave\ApiService\Services\ApiFootball\Fixtures;

use Carbon\Carbon;
use Fanwave\ApiService\Services\ApiFootball\Base;
use Illuminate\Http\Client\RequestException;

class Fixtures extends Base
{
    public string $endpoint = 'https://api-football-v1.p.rapidapi.com/v3/';

    /**
     * @throws RequestException
     */
    public function get(Carbon $date, $status = 'NS')
    {
        $response = $this->request()->get("{$this->endpoint}fixtures", [
            'date' => $date->format('Y-m-d'),
            'status' => $status,
            'timezone' => 'Europe/London',
        ]);

        $response->throw();

        return $response->json('response');
    }

}
