<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use App\Http\Libs\Frmapping\Form;
use App\Http\Models\Compra;
use View;
use DB;

class LandingController extends BaseController
{
    function home(){
      $products =
        Compra::join('productos','productos.id','=','compras.producto_id')
  ->select('productos.id','productos.nombre','productos.precio','productos.imagen',DB::raw('COUNT(productos.id) as ventas'))
          ->groupBy('productos.id')
          ->orderBy('productos.id','desc')->get();
      return View::make('landing',[
        'products' => $products
      ]);
    }
}
