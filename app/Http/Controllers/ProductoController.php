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
use Auth;
use App\Http\Models\Producto;
use App\Http\Models\Proveedor;
use App\User;

class ProductoController extends BaseController
{
    protected $object = 'producto',

    $collection = 'productos';

    function home(){
      $frm = new Form('productos');
      $frm_created = $frm->only(array(
                        ['name'=>'imagen','type' => 'file'],
                        ['name'=>'nombre','as' => 'Nombre del producto','icon' => 'chevron-circle-right'],
                        ['name'=>'descripcion','as' => 'Descripción','icon' => 'chevron-circle-right'],
                        ['name'=>'inventario','icon' => 'chevron-circle-right'],
                        ['name'=>'precio','type'=>'default','icon' => 'chevron-circle-right'],
                        ['name'=>'descuento','icon' => 'chevron-circle-right'],
                        ['name'=>'categoria_id']
                    ))
                    ->setMethod('POST')
                    ->setAction('{"save":"/'.$this->collection.'/save","update":"/'.$this->collection.'/update","delete":"/'.$this->collection.'/delete"}')
                    ->setId("frm_$this->collection")
                    ->toHTML();
      return View::make("auth.system.$this->collection",['form'=>$frm_created]);
    }
    public function save(Request $request){
      try{
        // Fetch all request data.
        $data = $request->all();

        // Rules user
        $rules = array(
            'nombre' => 'required|min:3|max:32',
            'inventario' => 'required',
            'precio' => 'required',
            'imagen' => 'required|image'
        );

        // Create a new validator instance.
        $vU = Validator::make($data, $rules);


        if ($vU->passes()) {
          $producto = new Producto($data);
          $producto->proveedor_id = Proveedor::where('user_id','=',Auth::user()->id)->get()[0]->id;
          $providerName = Proveedor::where('user_id','=',Auth::user()->id)->get()[0]->nombre;
          $img = $request->file('imagen');
          $ext = $img->getClientOriginalExtension();
          $nameImage = trim($producto->nombre).rand().'.'.$ext;
          $pathStorage = trim("/assets/img/$this->collection/$providerName/");
          $path = $img->move(public_path().$pathStorage, $nameImage);
          $producto->imagen = $pathStorage.$nameImage;
          $producto->save();
          return Response::json(array('status' => 200,'message' => "Se ha guardado el $this->object con exito.", 'data' => $producto));

        }

        return Response::json(array('status' => 'P-101','message' => "Errores de validación", 'data' => $vU->errors()->all()));
      }
      catch(Exception $e){
        return Response::json(array('status' => 500,'message' => "Errores de sevidor", 'data' => $e));
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
          $provider = Proveedor::where('user_id','=',Auth::user()->id)->get()[0];
          $updateArray = array(
            'nombre' => $data['nombre'],
            'descripcion' => $data['descripcion'],
            'inventario' => $data['inventario'],
            'precio' => $data['precio'],
            'descuento' => $data['descuento'],
            'proveedor_id' => $provider->id,
            'categoria_id' => $data['categoria_id']
          );
          $producto->update($updateArray);
          if($request->hasFile('imagen')){
            $producto = Producto::find($data['id']);
            $providerName = $provider->nombre;
            $img = $request->file('imagen');
            $ext = $img->getClientOriginalExtension();
            $nameImage = trim($producto->nombre).rand().'.'.$ext;
            $pathStorage = trim("/assets/img/$this->collection/$providerName/");
            $path = $img->move(public_path().$pathStorage, $nameImage);
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
        $proveedor_id = Proveedor::where("user_id","=",Auth::user()->id)->get()[0]->id;
        $response = [
          'status' => 200,
          'message' => 'SUCCESS',
          'data' => Producto::join('proveedores','proveedores.id','=','productos.proveedor_id')
          ->where("productos.activo",'=',1)
          ->where("productos.proveedor_id",'=',$proveedor_id)
          ->select("productos.id","imagen",DB::raw('concat(productos.nombre,",",proveedores.nombre) as nombre_table'),"productos.nombre","precio","inventario",DB::raw("descuento",'%'),'productos.descripcion','proveedor_id','categoria_id')
          ->get()
        ];
        return Response::json($response);
      }
      catch(Exception $e){
        return Response::json(array('status' => 500,'message' => "Errores de sevidor", 'data' => $e));
      }
    }

    public function findByName(Request $request,$nombre){
      try{
        //code
        $query = Producto::join('categorias','categorias.id','=','productos.categoria_id')
                  ->where("productos.activo","=",1)
                  ->where("categorias.activo","=",1)
                  ->where("productos.inventario",">",2)
                  ->where('productos.nombre', 'like', "%{$nombre}%")
                  ->select('productos.id','productos.nombre','productos.descripcion','descuento','precio','productos.imagen','categorias.nombre as nombreCategoria');
        $response = [
          'status' => 200,
          'message' => 'SUCCESS',
          'data' => $query->get()
        ];
        return Response::json($response);
      }
      catch(Exception $e){
        return Response::json(array('status' => 500,'message' => "Errores de sevidor", 'data' => $e));
      }
    }

    public function findByProvider(Request $request,$nombre,$id){
      try{
        //code
        $query = Producto::join('proveedores','proveedores.id','=','productos.proveedor_id')
                  ->join('categorias','categorias.id','=','productos.categoria_id')
                  ->where("productos.activo","=",1)
                  ->where("proveedores.activo","=",1)
                  ->where('productos.proveedor_id','=', $id)
                  ->select('productos.id','productos.nombre','productos.descripcion','descuento','precio','productos.imagen','categorias.nombre as nombreCategoria','productos.proveedor_id');

        return View::make('auth.productos-proveedor',['productos' => $query->get()]);
      }
      catch(Exception $e){
        return Response::json(array('status' => 500,'message' => "Errores de sevidor", 'data' => $e));
      }
    }

    public function findByCategory(Request $request,$nombre,$id){
      try{
        //code
        $query = Producto::join('categorias','categorias.id','=','productos.categoria_id')
                  ->where("productos.activo","=",1)
                  ->where("categorias.activo","=",1)
                  ->where('productos.categoria_id','=', $id)
                  ->select('productos.id','productos.nombre','productos.descripcion','descuento','precio','productos.imagen','categorias.nombre as nombreCategoria','productos.categoria_id');

        return View::make('auth.productos-categoria',['productos' => $query->get()]);
      }
      catch(Exception $e){
        return Response::json(array('status' => 500,'message' => "Errores de sevidor", 'data' => $e));
      }
    }

    public function findByProviderRange(Request $request,$id){
      try{
        //code
        $query = Producto::join('categorias','categorias.id','=','productos.categoria_id')
                  ->where("productos.activo","=",1)
                  ->where("categorias.activo","=",1)
                  ->where('productos.proveedor_id','=', $id)
                  ->whereBetween('precio', [$request->get('min'), $request->get('max')])
                  ->select('productos.id','productos.nombre','productos.descripcion','descuento','precio','productos.imagen','categorias.nombre as nombreCategoria');
        $response = [
          'status' => 200,
          'message' => 'SUCCESS',
          'data' => $query->get()
        ];
        return Response::json($response);
      }
      catch(Exception $e){
        return Response::json(array('status' => 500,'message' => "Errores de sevidor", 'data' => $e));
      }
    }

    public function findByCategoryRange(Request $request,$id){
      try{
        //code
        $query = Producto::join('categorias','categorias.id','=','productos.categoria_id')
                  ->where("productos.activo","=",1)
                  ->where("categorias.activo","=",1)
                  ->where('productos.categoria_id','=', $id)
                  ->whereBetween('precio', [$request->get('min'), $request->get('max')])
                  ->select('productos.id','productos.nombre','productos.descripcion','descuento','precio','productos.imagen','categorias.nombre as nombreCategoria');
        $response = [
          'status' => 200,
          'message' => 'SUCCESS',
          'data' => $query->get()
        ];
        return Response::json($response);
      }
      catch(Exception $e){
        return Response::json(array('status' => 500,'message' => "Errores de sevidor", 'data' => $e));
      }
    }
}
