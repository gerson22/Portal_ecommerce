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
            $items++;
            if($object->id == $request->get('id')){
              $object->count = $object->count + 1;
              array_push($products,$object);
            }
            elseif($items == count($carritoArray)-1){
              $nObject = (object)array(
                'id' => $request->get('id'),
                'nombre' => $request->get('nombre'),
                'descripcion' => $request->get('descripcion'),
                'precio' => $request->get('precio'),
                'descuento' => $request->get('descuento'),
                'count' => 1
              );
              array_push($products,$nObject);
            }
            else{
              array_push($products,$object);
            }
          }
        }else{
          $nObject = (object)array(
                'id' => $request->get('id'),
                'nombre' => $request->get('nombre'),
                'descripcion' => $request->get('descripcion'),
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
        // Fetch all request data.
        $data = $request->all();

        // Rules user
        $rules = array(
            'nombre' => 'required|min:3|max:32',
            'inventario' => 'required',
            'precio' => 'required'
        );

        // Create a new validator instance.
        $vU = Validator::make($data, $rules);


        if ($vU->passes()) {

          $producto = Producto::where('id','=',$data['id']);
          $updateArray = array(
            'nombre' => $data['nombre'],
            'descripcion' => $data['descripcion'],
            'inventario' => $data['inventario'],
            'precio' => $data['precio'],
            'descuento' => $data['descuento'],
            'proveedor_id' => $data['proveedor_id'],
            'categoria_id' => $data['categoria_id']
          );
          $producto->update($updateArray);
          if($request->hasFile('imagen')){
            $producto = Producto::find($data['id']);
            $providerName = Proveedor::find($data['proveedor_id'])->nombre;
            $img = $request->file('imagen');
            $ext = $img->getClientOriginalExtension();
            $nameImage = $producto->nombre.rand().'.'.$ext;
            $pathStorage = "/app/public/$this->collection/$providerName/";
            $path = $img->move(storage_path().$pathStorage, $nameImage);
            $producto->imagen = $pathStorage.$nameImage;
            $producto->save();
          }
          return Response::json(array('status' => 200,'message' => "Se ha actualizado la información del $this->object con exito.", 'data' => $producto));

        }

        return Response::json(array('status' => 'P-101','message' => "Errores de validación", 'data' => $vU->errors()->all()));
      }
      catch(Exception $e){
        return Response::json(array('status' => 500,'message' => "Errores de sevidor", 'data' => $e));
      }

    }
    public function delete(Request $request){
      try{
          // Fetch all request data.
          $data = $request->all();

          $categoria = Producto::where('id','=',$data['id']);
          $categoria->update(array(
            'activo' => 0
          ));

          return Response::json(array('status' => 200,'message' => "Se ha eliminado el $this->object con exito.", 'data' => $categoria));
      }
      catch(Exception $e){
        return Response::json(array('status' => 500,'message' => "Errores de sevidor", 'data' => $e));
      }


    }
    public static function all(Request $request){
      try{
        $response = [
          'status' => 200,
          'message' => 'SUCCESS',
          'data' => $request->session()->get('mi-carrito')
        ];
        return Response::json($response);
      }
      catch(Exception $e){
        return Response::json(array('status' => 500,'message' => "Errores de sevidor", 'data' => $e));
      }
    }
}
