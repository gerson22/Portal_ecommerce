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
use App\Http\Models\Proveedor;
use App\User;

class ProveedorController extends BaseController
{
    protected $object = 'proveedor',

    $collection = 'proveedores';

    function home(){
      $frm = new Form('proveedores');
      $frm_created = $frm->only(array(
                        ['name'=>'nombre','as' => 'Nombre del proveedor','icon' => 'chevron-circle-right'],
                        ['name'=>'imagen_contacto','type'=>'file']
                    ))
                    ->add(array(
                      ['name'=>'name','as' => 'Nombre de usuario','icon' => 'user'],
                      ['name'=>'email','as' => 'Correo electronico', 'icon' => 'envelope'],
                      ['name'=>'password','as' => 'Contraseña', 'icon' => 'lock'],
                      ['name'=>'password_confirmation','as' => 'Repetir contraseña', 'type' => 'password' , 'icon' => 'lock']
                    ))
                    ->setMethod('POST')
                    ->setAction('{"save":"/'.$this->collection.'/save","update":"/'.$this->collection.'/update","delete":"/'.$this->collection.'/delete"}')
                    ->setId('frm_proveedores')
                    ->toHTML();
      return View::make('auth.system.proveedores',['form'=>$frm_created]);
    }
    public function save(Request $request){
      try{
        // Fetch all request data.
        $data = $request->all();

        // Rules user
        $rules = array(
            'name' => 'required|min:3|max:32',
            'email' => 'required|email',
            'password' => 'required|min:3|confirmed',
            'password_confirmation' => 'required|min:3',
            'nombre' => 'required|min:6|max:32',
            'imagen_contacto' => 'required|image',
        );

        // Create a new validator instance.
        $vU = Validator::make($data, $rules);


        if ($vU->passes()) {
          $user = new User($data);
          $user->save();
          $img = $request->file('imagen_contacto');
          $ext = $img->getClientOriginalExtension();
          $nameImage = $user->name.rand().'ID'.$user->id.'.'.$ext;
          $pathStorage = trim("/assets/img/$this->collection/contacto/");
          $path = $request->file('imagen_contacto')->move(public_path().$pathStorage, $nameImage);
          $proveedor = new Proveedor();
          $proveedor->nombre = $data['nombre'];
          $proveedor->imagen_contacto = $pathStorage;
          $proveedor->user_id = $user->id;
          $proveedor->save();
          return Response::json(array('status' => 200,'message' => "Se ha guardado el ".$this->object." con exito.", 'data' => $proveedor));

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
            'name' => 'required|min:3|max:32',
            'email' => 'required|email',
            'password' => 'required|min:3|confirmed',
            'password_confirmation' => 'required|min:3',
            'nombre' => 'required|min:6|max:32'
        );

        // Create a new validator instance.
        $vU = Validator::make($data, $rules);


        if ($vU->passes()) {
          $user = User::where('id','=',$data['ID_user']);
          if(Hash::needsRehash($data['password'])){
            $hashed = Hash::make($data['password']);
          }
          else{
            $hashed = $data['password'];
          }
          $user->update(array(
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $hashed
          ));
          $uploadedFile = false;
          if($request->hasFile('imagen_contacto')){
            $img = $request->imagen_contacto;
            $ext = $img->getClientOriginalExtension();
            $nameImage = $user->first()->name.rand().'ID'.$user->first()->id.'.'.$ext;
            $pathStorage = trim("/assets/img/$this->collection/contacto/");
            $moved = $request->imagen_contacto->move(public_path().$pathStorage, $nameImage);
            $uploadedFile = true;
          }
          $proveedor = Proveedor::where('id','=',$data['id']);

          if($uploadedFile){
            $updateArray = array(
              'nombre' => $data['nombre'],
              'imagen_contacto' => $pathStorage.$nameImage
            );
          }else{
            $updateArray = array(
              'nombre' => $data['nombre']
            );
          }
          $proveedor->update($updateArray);
          return Response::json(array('status' => 200,'message' => "Se ha actualizado la información del $this->object con exito.", 'data' => $proveedor));

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

          $user = User::where('id','=',$data['ID_user']);
          $updateArray = array(
            'activo' => 0
          );
          $user->update($updateArray);
          $proveedor = Proveedor::where('id','=',$data['id']);
          $proveedor->update($updateArray);

          return Response::json(array('status' => 200,'message' => "Se ha eliminado el $this->object con exito.", 'data' => $proveedor));
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
          'data' => Proveedor::join('users','users.id','=','proveedores.user_id')
          ->select('proveedores.id','nombre','imagen_contacto','users.id as ID_user','name','email','password')
          ->where('proveedores.activo','=',1)
          ->where('users.activo','=',1)
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
          $query = Proveedor::join('productos','productos.proveedor_id','=','proveedores.id')
                    ->where("proveedores.nombre","LIKE","%{$nombre}%")
                    ->where("proveedores.activo","=",1)
                    ->groupBy('proveedores.id')
                    ->select("proveedores.id","proveedores.nombre",DB::raw("count(proveedores.id) AS total_productos"),"proveedores.imagen_contacto")
                    ->having("total_productos",">",0);
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
