<?php


/*
Plugin Name: wp admin language
Plugin URI: http://devloma.com/
Description: datac - sabeel user and driver app API for mobile 
Author: SAM
Author URI: https://devloma.com/sam

 License:     GPL v2 or later
 License URI: http://www.gnu.org/licenses/gpl-2.0.txt

Version: 1.0
 */
//  print_r(pll_the_languages()); 


require plugin_dir_path(__FILE__) . 'inc/core.class.php';
// $wp_lang =new Wp_language_core();

    function create_lang_menu() {
        global $wp_admin_bar;
        set_language();
        $menu_id = 'wp-drop-dwon-language';

        $wp_admin_bar->add_menu(array('id' => $menu_id, 'title' => __('Language'), 'href' => '#'));
        //ar 
 
        // $params['local']='en';
        $wp_admin_bar->add_menu(array('parent' => $menu_id, 'title' => __('Arabic'), 'id' => 'ar-switch', 'href' =>    Wp_language_core::get_parm('ar')));
        $wp_admin_bar->add_menu(array('parent' => $menu_id, 'title' => __('English'), 'id' => 'en-switch', 'href' =>     Wp_language_core::get_parm('en')));
       
    }
     add_action('admin_bar_menu', 'create_lang_menu', 2000);
   


     function set_language(){
         if(isset($_GET['local'])){
            $lang = $_GET['local'];
            if(in_array($lang ,  Wp_language_core::avilable_lang())){
                $user_ID= get_current_user_id();  
                // echo $user_ID."_____";die();
                update_usermeta($user_ID , 'locale' , $lang);
                $params = $_GET;
                unset( $params['local'] );
                $new_query_string = http_build_query( $params );
                wp_redirect($_SERVER['REQUEST_URI'] . '?' . $new_query_string);
            }
         }
     }



