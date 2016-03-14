<?php


class Historiques extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('pagination');
        if (!$this->ion_auth->logged_in())
        {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        }
    }

    /*
     * return all serveurs
     * @api
     * @return void
     */
    public function  index()
    {
        $data['start'] = 0;
        $data['limit'] = 0;
        $data['startt'] = 0;
        $data['serveurs'] = null;
        $this->load->view('index',$data);
    }
  }