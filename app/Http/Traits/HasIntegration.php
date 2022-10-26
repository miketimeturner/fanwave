<?php

namespace App\Http\Traits;

use Illuminate\Database\Eloquent\Relations\MorphOne;

trait HasIntegration
{
    /**
     * @return void
     */
    public function initializeHasIntegration()
    {
        /** @noinspection PhpArrayPushWithOneElementInspection */
        array_push($this->fillable, 'key');

        $this->makeHidden('key');
    }

    /**
     * @return MorphOne
     */
    public function integration()
    {
        return $this->morphOne(Integration::class, 'integrable');
    }

    /**
     * @return mixed
     */
    public function hasIntegration()
    {
        return $this->integration()->exists();
    }

    /**
     * @return mixed
     */
    public function api()
    {
        return $this->integration->api();
    }

    /**
     * @param $query
     * @param $service
     * @return void
     */
    public function scopeService($query, $service)
    {
        $query->whereHas('integration', fn($q) => $q->where('service', $service));
    }
}
