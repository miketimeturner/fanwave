<?php

namespace App\Http\Traits;

use Illuminate\Support\Str;

trait HasUuid
{
    /**
     * Get the auto-incrementing key type.
     *
     * @return string
     */
    public function getKeyType(): string
    {
        return 'string';
    }

    /**
     * Get the value indicating whether the IDs are incrementing.
     *
     * @return bool
     */
    public function getIncrementing(): bool
    {
        return false;
    }

    /**
     * When the model is being created attach a V4 UUID.
     */
    public function initializeHasUuid()
    {
        $this->attributes['id'] = Str::uuid();
    }
}
