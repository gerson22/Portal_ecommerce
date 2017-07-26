<?php

namespace App\Http\Models;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    public $table = "categorias";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre','descripcion'
    ];
}
