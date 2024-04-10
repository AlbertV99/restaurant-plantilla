<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ComidaIngrediente extends Model
{
    protected $fillable = ['ingrediente'];

    public function comida()
    {
        return $this->belongsTo(Comida::class);
    }
}
