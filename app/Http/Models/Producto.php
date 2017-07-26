<?php

namespace App\Http\Models;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    public $table = "productos";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre','descripcion','inventario','precio','descuento','proveedor_id','categoria_id'
    ];
}
