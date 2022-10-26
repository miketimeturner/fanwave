<?php

namespace Fanwave\ApiService\Models;

use Fanwave\ApiService\Http\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Credential extends Model
{
    use HasFactory, HasUuid;

    protected $fillable = ['access_token'];

    protected $hidden = ['access_token'];
}
