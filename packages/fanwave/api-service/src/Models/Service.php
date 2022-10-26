<?php

namespace Fanwave\ApiService\Models;

use Fanwave\ApiService\ApiService;
use Fanwave\ApiService\Http\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Service extends Model
{
    use HasFactory, HasUuid;

    public function getRouteKeyName(): string
    {
        return 'key';
    }

    protected $fillable = ['name', 'key'];

    /**
     * @return HasOne
     */
    public function integration(): HasOne
    {
        return $this->hasOne(Integration::class);
    }

    /**
     * @return mixed
     */
    public function api(): mixed
    {
        return ApiService::api($this->integration);
    }

    /**
     * @return mixed
     */
    public function getApiAttribute(): mixed
    {
        return $this->api();
    }
}
