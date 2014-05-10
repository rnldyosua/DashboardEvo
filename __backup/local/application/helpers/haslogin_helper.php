<?php

 /*
  * desc: check if user has logined
  * params: -
  * return: void
  */

  function haslogin(){
     //check is use has loggined
        $CI =& get_instance();
        if(!$CI->session->userdata('session_admin')){
            $CI->session->set_flashdata("error","You must login!");
            redirect("home");
            die();           
        }        
  }

?>
