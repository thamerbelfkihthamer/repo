<?php


class Fournisseurs extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('fournisseurs/Fournisseurs_model');
        $this->load->helper('pagination');
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        }
        if($this->session->userdata('role') == "Administrateur finance")
        {
            redirect('templates/error');

        }
    }


    /**
     *
     */
    public function  index()
    {
        $start = 10;

        if ($this->input->get('startt')) {
            $start = $this->input->get('startt');
        }
        $base_url = site_url() . '/fournisseurs';
        $params = array(
            "count" => TRUE
        );
        $data['count'] = $this->Fournisseurs_model->getAllfournisseurs($params);
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

        // Liste des enregistements du requette
        $data ["fournisseurs"] = $this->Fournisseurs_model->getAllfournisseurs($params);

        $data['startt'] = $start;
        $this->load->view('index', $data);
    }


    /*
     * return create  user form
     */
    public function create()
    {
        $this->load->view('create');
    }

    /*
    * add user data in database user table
    */
    public function store()
    {
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);

        $fournisseur = new stdClass();
        $fournisseur->name = $request->name;
        $fournisseur->email = $request->email;
        $fournisseur->tel = $request->tel;
        $id = $this->Fournisseurs_model->addfournisseur($fournisseur);
        if ($id != null) {
            $this->session->set_flashdata('succus', 'Nouvel utilisateur est bien enregistrer.');
            redirect('fournisseurs');
        }

    }

    /*
     * return edit user form
     */
    public function edit()
    {
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        $fournisseur = $this->Fournisseurs_model->getFournisseurById($request->id);
        echo json_encode($fournisseur);
    }

    /*
     * update user data in database table
     */
    public function update($id = null)
    {
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);

        $fournisseur = new stdClass();
        $fournisseur->name = $request->name;
        $fournisseur->email = $request->email;
        $fournisseur->tel = $request->tel;
        $res = $this->Fournisseurs_model->updateById($request->id, $fournisseur);
        if ($res) {
            echo json_encode($res);
        }

    }


    /*
     * delete user from database
     */
    public function delete()
    {
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        $res = $this->Fournisseurs_model->deleteById($request->id);

        if ($res) {
            echo $res;
        } else {
            echo $res;
        }

    }

}