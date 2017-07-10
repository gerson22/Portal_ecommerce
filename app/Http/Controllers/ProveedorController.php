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
use App\Http\Models\Proveedor;
use App\User;

class ProveedorController extends BaseController
{
    function home(){
      $frm = new Form('proveedores');
      $frm_created = $frm->only(array(
                        ['name'=>'nombre','as' => 'Nombre del proveedor'],
                        ['name'=>'imagen_contacto','type'=>'file']
                    ))
                    ->add(array(
                      ['name'=>'name','as' => 'Nombre de usuario'],
                      ['name'=>'email','as' => 'Correo electronico'],
                      ['name'=>'password','as' => 'Contraseña'],
                      ['name'=>'password_confirmation','as' => 'Repetir contraseña', 'type' => 'password']
                    ))
                    ->setMethod('POST')
                    ->setAction('{"save":"/proveedores/save","udpate":"/provedores/update"}')
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
          $path = $request->file('imagen_contacto')->move(storage_path().'/app/public/proveedores/contacto', $nameImage);
          $proveedor = new Proveedor();
          $proveedor->nombre = $data['nombre'];
          $proveedor->imagen_contacto = $nameImage;
          $proveedor->user_id = $user->id;
          $proveedor->save();
          return Response::json(array('status' => 200,'message' => "Se ha guardado el proveedor con exito.", 'data' => $proveedor));

        }

        return Response::json(array('status' => 'P-101','message' => "Errores de validación", 'data' => $vU->errors()->all()));
      }
      catch(Exception $e){
        return Response::json(array('status' => 500,'message' => "Errores de sevidor", 'data' => $e));
      }


    }
}
