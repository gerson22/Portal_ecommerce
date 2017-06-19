<?php

namespace App\Http\Libs\Frmapping\Src;

class Input
{
    
    public static function create($name,$type,$icon,$if_null){
        $required = self::NullToRequerided($if_null);
        return '<div class="form-group">
                    <label for="password" class="col-md-4 control-label">'.$name.'</label>
                    <div class="col-md-6">
                        <input id="'.$name.'" type="'.$type.'" required='.$required.' class="form-control" name="'.$name.'">
                    </div>
                </div>';
    }
    private static function NullToRequerided($val){
        return  ($val == 'NO') ? 'true' : 'false';
    }
    
}
