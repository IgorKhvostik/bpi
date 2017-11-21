<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bpi_data extends Model
{
    protected $table= 'bpi_data';

    protected $fillable= [
        'id', 'usd', 'eur', 'gbp', 'created_at', 'updated_at'
    ];

}
