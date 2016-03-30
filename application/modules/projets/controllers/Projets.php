<?php


class Projets extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('projets/Projets_model');
        $this->load->model('clients/Clients_model');
        $this->load->model('serveurs/Serveurs_model');
        $this->load->model('contrats/Contrats_model');
        $this->load->helper('pagination');
        if (!$this->ion_auth->logged_in())
        {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        }

    }

    /*
     * return all projets
     * @api
     * @return void
     */
    /**
     *
     */
    public function  index()
    {
        $start = 10;

        if ($this->input->get('startt')) {
            $start = $this->input->get('startt');
        }
        $base_url = site_url() . '/projets';
        $params = array(
            "count" => TRUE
        );
        $data['count'] = $this->Projets_model->getAllprojets($params);
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
        $data ["projets"] = $this->Projets_model->getAllprojets($params);

        $data['startt'] = $start;
        $this->load->view('index', $data);
    }


    /*
     * return create  user form
     */
    public function create($contrat_id = null)
    {
        $data['clients'] = $this->Clients_model->getAllclients();
        $data['contrat_id'] = $contrat_id;
        $this->load->view('create',$data);
    }


    /**
     *
     */
    public function store()
    {
        $this->form_validation->set_rules('name', 'nom', 'required');
        $this->form_validation->set_rules('client','client','required');
        /*
         *
         */
        if ($this->form_validation->run()) {
            $projet = new stdClass();
            $projet->name = $this->input->post('name');
            $projet->id_client = $this->input->post('client');
            $projet->id_contrat = $this->input->post('id_contrat');

            $id = $this->Projets_model->addprojet($projet);

            if ($id != null) {
                $this->session->set_flashdata('succus', 'Nouvel projet est bien enregistrer.');
                redirect('projets');
            }
        } else {
            $this->session->set_flashdata('error', 'Veuillez remplir tous les champs.');
            redirect('projets/create');
        }
    }

    /*
     * return edit user form
     */
    public function edit($projetid = null,$contratid = null)
    {
        $data['projet'] = $this->Projets_model->getprojetById($projetid);
        $data['clients'] = $this->Clients_model->getAllclients();
        $data['contrats'] = $this->Contrats_model->getAllcontrats();
        $data['contratid'] = $contratid;
        $this->load->view('edit', $data);
    }


    /**
     * @param null $id
     */
    public function update($id = null)
    {
        $this->form_validation->set_rules('name', 'nom', 'required');
        $this->form_validation->set_rules('client','client','required');
        $this->form_validation->set_rules('contrat','Contrat','required');
        if ($this->input->post()) {

            if ($this->form_validation->run()) {

                $projet = new stdClass();
                $projet->name = $this->input->post('name');
                $projet->id_client = $this->input->post('client');
                $projet->id_contrat = $this->input->post('contrat');
                $res = $this->Projets_model->updateById($id, $projet);
                if ($res) {
                    $this->session->set_flashdata('succus', 'Votre modification est validé');
                    redirect('projets');
                } else {
                    $this->session->set_flashdata('error', 'valider votre données');
                    redirect('projets');
                }

            } else {
                $this->session->set_flashdata('error', 'valider votre donnéesss');
                $this->edit($id);
            }
        }

    }

    public function show($projet_id){
        $start = 10;
        $data['startt'] = $start;
        if ($this->input->get('startt')) {
            $data['startt'] = $this->input->get('startt');
        }

        $data['serveurs'] = $this->Projets_model->getServeursOfprojets($projet_id);
        $data['projet_id'] = $projet_id;
        $this->load->view('show',$data);
    }
    /*
     * delete user from database
     */
    public function delete($id = null)
    {
        $res = $this->Projets_model->deleteById($id);

        if ($res) {
            $this->session->set_flashdata('succus', 'Votre suppression est validé');
            redirect('projets');
        } else {
            $this->session->set_flashdata('error', 'supprission ne marche pas ');
            redirect('projets');
        }

    }

}