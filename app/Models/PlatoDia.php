<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlatoDia extends Model
{
    protected $fillable = ['fecha'];

    public function detalles()
    {
        return $this->hasMany(PlatoDiaDetalle::class);
    }
}
