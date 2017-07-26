<?php

namespace App\Http\Models;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    public $table = "compras";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cantidad','total'
    ];
}
