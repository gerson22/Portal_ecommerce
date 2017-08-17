<?php
namespace App\Http\Libs\Frmapping;

class Config {

    public static function Layout(){
        return (object)array(
            'Input' => "<div class=\"md-form input-group\">
                          <span class=\"input-group-addon\" id=\"basic-addon1\"><span class='fa fa-:icon'></span></span>
                          <input type=\":type\" id=':name' name=':name' class=\"form-control pc\" placeholder=\":alias\" aria-describedby=\"basic-addon1\">
                      </div>",
            'Select' => "<div class='md-form'>
                            <select class='mdb-select colorful-select dropdown-dark' name=':name' id=':name'>
                                <option val='NULL' selected>Elige una opción</option>
                            </select>
                            <label>:alias</label>
                        </div>",
            "File"  =>  "<form id='frm_:name'>
                            <div class='file-field'>
                                <div class='btn btn-sm grey darken-2'>
                                    <span> :alias</span>
                                    <input type='file' name=':name' id=':name'>
                                </div>
                                <div class='file-path-wrapper'>
                                   <input class='file-path validate pc :name' type='text' placeholder='Nombre del archivo'>
                                </div>
                            </div>
                        </form><br><br>",
            'Form'  =>  "<form id=':name' method=':method' action=':action'>
                            <div>:fields</div>
                        </form>"
        );
    }

}
