<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comida extends Model
{
    protected $fillable = ['grupo', 'nombre_plato', 'precio_defecto'];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($comida) {
            $comida->codigo = 'COM' . str_pad(Comida::count() + 1, 4, '0', STR_PAD_LEFT);
        });
    }

    public function ingredientes()
    {
        return $this->hasMany(ComidaIngrediente::class);
    }
}
