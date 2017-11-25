<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BpiData extends Model
{
    protected $fillable = [
        'id', 'usd', 'eur', 'gbp', 'created_at', 'updated_at'
    ];
}
