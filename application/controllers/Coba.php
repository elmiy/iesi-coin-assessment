<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Coba extends CI_Controller 
{
    public function index(){
        //echo 'auth/index';
        $this->load->view('coba');
    }
}