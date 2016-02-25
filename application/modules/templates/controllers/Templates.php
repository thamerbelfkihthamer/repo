<?php

/**
 * Created by PhpStorm.
 * User: ThamerBelfki
 * Date: 15/01/2016
 * Time: 16:30
 */
class Templates extends  MX_Controller
{

    function __construct(){
        parent::__construct();
    }

    public function header(){
        $this->load->view('header');
    }
    public function sidebar(){
        $this->load->view('sidebar');
    }
    public function footer() {
        $this->load->view('footer');
    }

}