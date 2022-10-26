<?php

namespace App\Http\Controllers;

use Fanwave\ApiService\Models\Service;
use Illuminate\Http\Request;

class GetFixturesController extends Controller
{
    /**
     * @param Request $request
     * @param Service $service
     * @return mixed
     */
    public function __invoke(Request $request, Service $service): mixed
    {
        $fixtures = $service->api()->fixtures()->get(now(), $request->get('status'));

        return collect($fixtures)
            ->filter(fn($item) => $item['league']['country'] === 'England')
            ->sortBy('league.timestamp')
            /*->groupBy('league.name')*/;
    }
}
