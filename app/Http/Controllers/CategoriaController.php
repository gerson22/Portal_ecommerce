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
use App\Http\Models\Categoria;
use App\User;

class CategoriaController extends BaseController
{
    protected $object = 'categoria',

    $collection = 'categorias';

    function home(){
      $frm = new Form('categorias');
      $frm_created = $frm->only(array(
                        ['name'=>'nombre','as' => 'Nombre de la categoria','icon' => 'chevron-circle-right'],
                        ['name'=>'descripcion','as' => 'Descripción','icon' => 'chevron-circle-right']
                    ))
                    ->setMethod('POST')
                    ->setAction('{"save":"/'.$this->collection.'/save","update":"/'.$this->collection.'/update","delete":"/'.$this->collection.'/delete"}')
                    ->setId('frm_categorias')
                    ->toHTML();
      return View::make('auth.system.categorias',['form'=>$frm_created]);
    }
    public function save(Request $request){
      try{
        // Fetch all request data.
        $data = $request->all();

        // Rules user
        $rules = array(
            'nombre' => 'required|min:3|max:32'
        );

        // Create a new validator instance.
        $vU = Validator::make($data, $rules);


        if ($vU->passes()) {
          $categoria = new Categoria();
          $categoria->nombre = $data['nombre'];
          $categoria->descripcion = $data['descripcion'];
          $categoria->activo = 1;
          $categoria->save();
          return Response::json(array('status' => 200,'message' => "Se ha guardado la ".$this->object." con exito.", 'data' => $categoria));

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
            'nombre' => 'required|min:3|max:32'
        );

        // Create a new validator instance.
        $vU = Validator::make($data, $rules);


        if ($vU->passes()) {

          $categoria = Categoria::where('id','=',$data['id']);
          $updateArray = array(
            'nombre' => $data['nombre'],
            'descripcion' => $data['descripcion']
          );
          $categoria->update($updateArray);
          return Response::json(array('status' => 200,'message' => "Se ha actualizado la información de la $this->object con exito.", 'data' => $categoria));

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

          $categoria = Categoria::where('id','=',$data['id']);
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
          'data' => Categoria::where('categorias.activo','=',1)->get()
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
        $query = Categoria::where('nombre','LIKE','%'.$nombre.'%')->orderBy('nombre','asc');
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
