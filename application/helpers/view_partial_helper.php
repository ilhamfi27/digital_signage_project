<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('stick_template')) {
    /**
     * Stick Template
     * 
     * A helper function that stick partial for a view
     * 
     * @param   string  $url    -> the location of the partial
     * @param   array   $data   -> optional if parsed data needed for the partial
     * @return  string  the partial view
     */
    function stick_template($url,$data = NULL){
        $inst               = get_instance();
        $splited_url        = explode("/", $url);

        end($splited_url);
        $key                = key($splited_url);
        
        $splited_url[$key]  = "_" . $splited_url[$key];
        $the_template       = implode("/",$splited_url);
        
        return $inst->load->view($the_template, $data, TRUE);
    }
}
