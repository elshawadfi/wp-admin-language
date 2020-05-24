<?php

class Wp_language_core
{

    // public $user_id ; 

    public function set_language()
    {

    }

    public static function avilable_lang()
    {
        return array('ar','en');
    }

    public function get_user_id(){
     
    }


    public static function get_parm($val){
        $params = $_GET;
        $params['local'] = $val;

        return "?".http_build_query( $params );
 
    }

}
