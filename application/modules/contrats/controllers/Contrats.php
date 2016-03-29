<?php


class Contrats extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('contrats/Contrats_model');
        $this->load->model('projets/Projets_model');
        $this->load->model('clients/Clients_model');
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
        $base_url = site_url() . '/contrats';
        $params = array(
            "count" => TRUE
        );
        $data['count'] = $this->Contrats_model->getAllcontrats($params);
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
        $data ["contrats"] = $this->Contrats_model->getAllcontrats($params);

        $data['startt'] = $start;
        $this->load->view('index', $data);
    }


    /*
     *@return void
     */
    public function create()
    {
        $data['projets'] = $this->Projets_model->getAllprojetswithclient();
        $data['clients'] = $this->Clients_model->getallclients();
        $this->load->view('create',$data);
    }

    /*
    *@return void
    */
    /**
     *
     */
    public function store()
    {
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('projets[]','projets','required');
        if ($this->form_validation->run()) {
            $contrat = new stdClass();
            $contrat->name = $this->input->post('name');
            $projets = $this->input->post('projets');

            $id = $this->Contrats_model->addcontrat($contrat);
            $idcontart = array(
                'id_contrat' =>$id,
            );

            $t = $this->Projets_model->updateByprojetsId($projets,$idcontart);
            if ($t != null) {
                $this->session->set_flashdata('succus', 'Nouvel contrat est bien enregistrer.');
                redirect('contrats');
            }
        } else {
            $this->session->set_flashdata('error', 'Veuillez remplir tous les champs.');
            redirect('contrats/create');
        }
    }

    /*
     *@return void
     */
    /**
     * @param null $id
     */
    public function edit($id = null)
    {
        $data['contrat'] = $this->Contrats_model->getContratById($id);
        $data['projets'] = $this->Projets_model->getProjetsBycontrat($id);
        $this->load->view('edit', $data);
    }

    /*
     * update user data in database table
     * @return void
     */
    /**
     * @param null $id
     */
    public function update($id = null)
    {
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('projets[]','projets','required');

        if ($this->input->post()) {
            if ($this->form_validation->run()) {
                $contrat = new stdClass();
                $contrat->name = $this->input->post('name');
                $res = $this->Contrats_model->updateById($id, $contrat);
                if ($res) {
                    $this->session->set_flashdata('succus', 'Votre modification est validé');
                    redirect('contrats');
                } else {
                    $this->session->set_flashdata('error', 'valider votre données');
                    redirect('contrats');
                }
            } else {
                $this->session->set_flashdata('error', 'valider votre données');
                $this->edit($id);
            }
        }
    }

    /*
     * delete user from database
     * @return void
     */
    /**
     * @param null $id
     */
    public function delete($id = null)
    {
        $res = $this->Contrats_model->deleteById($id);

        if ($res) {
            $this->session->set_flashdata('succus', 'Votre suppression est validé');
            redirect('contrats');
        } else {
            $this->session->set_flashdata('error', 'suppression ne marche pas ');
            redirect('contrats');
        }

    }

}