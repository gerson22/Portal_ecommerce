<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use App\Http\Libs\Frmapping\Form;
use Illuminate\Http\Request;
use Validator;
use DB;
use Illuminate\Support\Facades\Response;
use View;
use Hash;
use App\Http\Models\Producto;
use App\Http\Models\Proveedor;
use App\User;

class CarritoController extends BaseController
{

    function home(){

      return View::make("carrito");
    }
    public function save(Request $request){
      try{
        //code
        $products = [];
        $carritoArray = $request->session()->get('mi-carrito');
        $items = 0;
        if(is_array($carritoArray)){
          foreach($carritoArray as $object){
            $desc = $request->get('descuento');
            if($object->id == $request->get('id')){
              $object->count = $object->count + 1;
              array_push($products,$object);
            }
            else{
              if($items == count($carritoArray)-1){
                $nObject = (object)array(
                  'id' => $request->get('id'),
                  'nombre' => $request->get('nombre'),
                  'descripcion' => $request->get('descripcion'),
                  'imagen' => $request->get('imagen'),
                  'precio' => ($desc > 0) ? (($request->get('precio')*(100-$des))*0.01),
                  'descuento' => $request->get('descuento'),
                  'count' => 1
                );
                array_push($products,$nObject);
              }else{
                array_push($products,$object);
              }
            }
            $items++;
          }
        }else{
          $nObject = (object)array(
                'id' => $request->get('id'),
                'nombre' => $request->get('nombre'),
                'descripcion' => $request->get('descripcion'),
                'imagen' => $request->get('imagen'),
                'precio' => $request->get('precio'),
                'descuento' => $request->get('descuento'),
                'count' => 1
              );
              array_push($products,$nObject);
        }
        $request->session()->put('mi-carrito',$products);
        return Response::json(array('status'=>200,'statusMessage'=>'SUCCESS','data'=>$products));
      }
      catch(Exception $e){
        return Response::json(array('status'=>500,'statusMessage'=>'SERVER ERROR','data'=>$e));
      }


    }
    public function update(Request $request){
      try{
        //code
        $products = [];
        $carritoArray = $request->session()->get('mi-carrito');
        $items = 0;
        if(is_array($carritoArray)){
          foreach($carritoArray as $object){
            $items++;
            if($object->id == $request->get('id')){
              $object->count = $request->get('count');
              array_push($products,$object);
            }
            else{
              array_push($products,$object);
            }
          }
        }
        $request->session()->put('mi-carrito',$products);
        return Response::json(array('status'=>200,'statusMessage'=>'SUCCESS','data'=>$products));
      }
      catch(Exception $e){
        return Response::json(array('status'=>500,'statusMessage'=>'SERVER ERROR','data'=>$e));
      }

    }
    public function remove(Request $request){
      try{
        //code
        $products = [];
        $carritoArray = $request->session()->get('mi-carrito');
        $items = 0;
        if(is_array($carritoArray)){
          foreach($carritoArray as $object){
            $items++;
            if($object->id != $request->get('id')){
              array_push($products,$object);
            }
          }
        }
        $request->session()->put('mi-carrito',$products);
        if(count($products) == 0){
          $request->session()->forget('mi-carrito');
        }
        return Response::json(array('status'=>200,'statusMessage'=>'SUCCESS','data'=>$products));
      }
      catch(Exception $e){
        return Response::json(array('status'=>500,'statusMessage'=>'SERVER ERROR','data'=>$e));
      }


    }
    public static function all(Request $request){
      try{
        return View::make('carrito',['productos' => $request->session()->get('mi-carrito')]);
      }
      catch(Exception $e){
        return Response::json(array('status' => 500,'message' => "Errores de sevidor", 'data' => $e));
      }
    }
}
