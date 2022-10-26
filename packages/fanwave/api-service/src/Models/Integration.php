<?php

namespace Fanwave\ApiService\Models;

use Fanwave\ApiService\Http\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Integration extends Model
{
    use HasFactory, HasUuid;

    protected $fillable = ['enabled', 'identifier'];

    protected $hidden = ['access_token'];

    /**
     * @return MorphTo
     */
    public function integrable(): MorphTo
    {
        return $this->morphTo();
    }

    /**
     * @return BelongsTo
     */
    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    /**
     * @return BelongsTo
     */
    public function credentials(): BelongsTo
    {
        return $this->belongsTo(Credential::class);
    }
}
