<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model{

    protected $fillable = ['descripcion', 'precio_defecto'];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($producto) {
            $producto->codigo = 'PROD' . str_pad(Producto::count() + 1, 4, '0', STR_PAD_LEFT);
        });
    }
}
