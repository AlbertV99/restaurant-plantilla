<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlatoDiaDetalle extends Model
{
    protected $fillable = ['plato_dia_id', 'platoable_id', 'platoable_type', 'precio'];

    public function platoable()
    {
        return $this->morphTo();
    }
}
