<?php
namespace App\Http\Libs\Frmapping;

class Config {

    public static function Layout(){
        return (object)array(
            'Input' => "<div class='md-form'>
                           <input type=':type' id=':name' name=':name' required=':required' class='form-control'>
                           <label for='form3'>:alias</label>
                        </div>",
            'Select' => "<div class='md-form'>
                            <select class='mdb-select colorful-select dropdown-warning' name=':name' id=':name'>
                                <option val='NULL' selected>Elige una opción</option>
                            </select>
                            <label>:alias</label>
                        </div>",
            "File"  =>  "<form id='frm_:name'>
                            <div class='file-field'>
                                <div class='btn btn-warning btn-sm yellow-main'>
                                    <span> :alias</span>
                                    <input type='file' name=':name' id=':name'>
                                </div>
                                <div class='file-path-wrapper'>
                                   <input class='file-path validate' type='text' placeholder='Nombre del archivo'>
                                </div>
                            </div>
                        </form><br><br>",
            'Form'  =>  "<form id=':name' method=':method' action=':action'>
                            <div>:fields</div>
                        </form>"
        );
    }

}
