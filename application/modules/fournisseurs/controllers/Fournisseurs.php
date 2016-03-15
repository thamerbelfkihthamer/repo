<?php


class Fournisseurs extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('fournisseurs/Fournisseurs_model');
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
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('tel','telephone','required');
        /*
         *
         */
        if ($this->form_validation->run()) {
            $fournisseur = new stdClass();
            $fournisseur->name = $this->input->post('name');
            $fournisseur->email = $this->input->post('email');
            $fournisseur->tel = $this->input->post('tel');
            $id = $this->Fournisseurs_model->addfournisseur($fournisseur);
            if ($id != null) {
                $this->session->set_flashdata('succus', 'Nouvel utilisateur est bien enregistrer.');
                redirect('fournisseurs');
            }
        } else {
            $this->session->set_flashdata('error', 'Veuillez remplir tous les champs.');
            redirect('fournisseurs/create');
        }
    }

    /*
     * return edit user form
     */
    public function edit($id = null)
    {
        $data['fournisseur'] = $this->Fournisseurs_model->getFournisseurById($id);
        $this->load->view('edit', $data);
    }

    /*
     * update user data in database table
     */
    public function update($id = null)
    {
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('tel','telephone','required');
        if ($this->input->post()) {
            if ($this->form_validation->run()) {
                $fournisseur = new stdClass();
                $fournisseur->name = $this->input->post('name');
                $fournisseur->email = $this->input->post('email');
                $fournisseur->tel = $this->input->post('tel');
                $res = $this->Fournisseurs_model->updateById($id, $fournisseur);
                if ($res) {
                    $this->session->set_flashdata('succus', 'Votre modification est validé');
                    redirect('fournisseurs');
                } else {
                    $this->session->set_flashdata('error', 'valider votre données');
                    redirect('fournisseurs');
                }
            } else {
                $this->session->set_flashdata('error', 'valider votre données');
                $this->edit($id);
            }
        }
    }

    /*
     * delete user from database
     */
    public function delete($id = null)
    {
        $res = $this->Fournisseurs_model->deleteById($id);

        if ($res) {
            $this->session->set_flashdata('succus', 'Votre suppression est validé');
            redirect('fournisseurs');
        } else {
            $this->session->set_flashdata('error', 'supprission ne marche pas ');
            redirect('fournisseurs');
        }

    }

}