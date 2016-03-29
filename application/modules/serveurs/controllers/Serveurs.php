<?php


class Serveurs extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('serveurs/Serveurs_model');
        $this->load->model('fournisseurs/Fournisseurs_model');
        $this->load->model('projets/Projets_model');
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
        $base_url = site_url() . '/serveurs';
        $params = array(
            "count" => TRUE
        );
        $data['count'] = $this->Serveurs_model->getAllserveurs($params);
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
        $data ["serveurs"] = $this->Serveurs_model->getAllserveurs($params);

        $data['startt'] = $start;
        $this->load->view('index', $data);
    }


    /*
     * return create  user form
     */
    public function create($projet_id =null)
    {
        $data['fournisseurs'] = $this->Fournisseurs_model->getAllfournisseurs();
        $data['id_projet'] = $projet_id;
        $this->load->view('create',$data);
    }

    /*
    * add user data in database user table
    */
    public function store()
    {
        $this->form_validation->set_rules('name', 'nom', 'required');
        $this->form_validation->set_rules('fournisseur','fournisseur','required');
        /*
         *
         */
        if ($this->form_validation->run()) {
            $serveur = new stdClass();
            $serveur->name = $this->input->post('name');
            $serveur->id_fournisseur = $this->input->post('fournisseur');
            $serveur->id_projet = $this->input->post('id_projet');

            $id = $this->Serveurs_model->addserveur($serveur);
            if ($id != null) {
                $this->session->set_flashdata('succus', 'Nouvel serveur est bien enregistrer.');
                redirect('serveurs');
            }
        } else {
            $this->session->set_flashdata('error', 'Veuillez remplir tous les champs.');
            redirect('serveurs/create');
        }
    }

    /*
     * return edit user form
     */
    public function edit($serveurid = null,$projetid = null)
    {
        $data['fournisseurs'] = $this->Fournisseurs_model->getAllfournisseurs();
        $data['serveur'] = $this->Serveurs_model->getServeurById($serveurid);
        $data['projets'] = $this->Projets_model->getAllprojets();
        $data['projetid'] = $projetid;
        $this->load->view('edit', $data);
    }

    /*
     * update user data in database table
     */
    public function update($id = null)
    {
        $this->form_validation->set_rules('name', 'nom', 'required');
        $this->form_validation->set_rules('fournisseur','fournisseur','required');
        $this->form_validation->set_rules('projet','Projet','required');
        if ($this->input->post()) {

            if ($this->form_validation->run()) {

                $serveur = new stdClass();
                $serveur->name = $this->input->post('name');
                $serveur->id_fournisseur = $this->input->post('fournisseur');
                $serveur->id_projet = $this->input->post('projet');
                 $res = $this->Serveurs_model->updateById($id, $serveur);
                if ($res) {
                    $this->session->set_flashdata('succus', 'Votre modification est validé');
                    redirect('serveurs');
                } else {
                    $this->session->set_flashdata('error', 'valider votre données');
                    redirect('serveurs');
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
        $res = $this->Serveurs_model->deleteById($id);

        if ($res) {
            $this->session->set_flashdata('succus', 'Votre suppression est validé');
            redirect('serveurs');
        } else {
            $this->session->set_flashdata('error', 'supprission ne marche pas ');
            redirect('serveurs');
        }

    }
}