<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model{
    protected $fillable = ['documento', 'tipo_doc', 'razon_social', 'correo_electronico', 'telefono_celular'];
}
