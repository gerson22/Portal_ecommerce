<?php

namespace App\Http\Models;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    public $table = "proveedores";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre'
    ];
}
