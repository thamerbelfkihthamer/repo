<?php

/**
 * Created by PhpStorm.
 * User: medianet
 * Date: 14/03/2016
 * Time: 16:30
 */
class Groupes extends MX_Controller
{
   public function __construct(){
      parent::__construct();
       $this->load->model('groupes/Groupes_model');
       $this->load->helper('pagination');
       if (!$this->ion_auth->logged_in())
       {
           // redirect them to the login page
           redirect('auth/login', 'refresh');
       }
   }

    public function index(){

        $data['startt'] = 0;
        $start = 10;
        $base_url = site_url() . '/fournisseurs';
        $params = array(
            "count" => TRUE
        );
        $data['count'] = $this->Groupes_model->getAllgroupes($params);
        $parametres = array(
            'total' => $data['count'],
            'base_url' => $base_url,
            'start' => $start
        );
        // Load Helper Pagination
        // Retour pagination pour le view
        $data ['links'] = pagination($parametres);

        $params = array();
        $params ["limit"] = $start;
        $data ["limit"] = $params ["limit"];
        $params ["start"] = (isset($_GET ["start"])) ? $_GET ["start"] : "0";
        $data ["start"] = $params ["start"] + 1;
        $params ["ordre"] = "id_reponse";

        $data['groupes'] = $this->Groupes_model->getAllgroupes();
        $this->load->view('index',$data);
    }

    public function delete($id){
        $res = $this->Groupes_model->deleteById($id);

        if ($res) {
            $this->session->set_flashdata('succus', 'Votre suppression est validé');
            redirect('groupes');
        } else {
            $this->session->set_flashdata('error', 'supprission ne marche pas ');
            redirect('groupes');
        }
    }

}