<?php


class Acces extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Acces/Acces_model');
        $this->load->model('serveurs/Serveurs_model');
        $this->load->helper('pagination');
        if (!$this->ion_auth->logged_in()) {
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
        $base_url = site_url() . '/Acces';
        $params = array(
            "count" => TRUE
        );
        $data['count'] = $this->Acces_model->getAllAcces($params);
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
        $data ["Acces"] = $this->Acces_model->getAllAcces($params);

        $data['startt'] = $start;
        $this->load->view('index', $data);
    }


    /**
     * @param null $id
     */
    public function create($id=null)
    {
        $data['serveur_id'] = $id;
        $data['serveurs'] = $this->Serveurs_model->getserveurs();
        $this->load->view('create', $data);
    }

    /*
    * add user data in database user table
    */
    public function store()
    {
        $this->form_validation->set_rules('typeacces', 'Type acces', 'required');
        $this->form_validation->set_rules('Identifiant', 'Identifiant', 'required');
        $this->form_validation->set_rules('motdepass', 'mot de passe', 'required');

        $serveurid = $this->input->post('serveur_id');
        if ($this->form_validation->run()) {
            $acces = new stdClass();
            $acces->name = $this->input->post('typeacces');
            $acces->identifiant = $this->input->post('Identifiant');
            $acces->password = $this->input->post('motdepass');
            $acces->serveur_id = $this->input->post('serveur_id');
            $id = $this->Acces_model->addacces($acces);
            if ($id != null) {
                $this->session->set_flashdata('succus', 'Nouvel acces est bien enregistrer.');
                redirect('Acces');
            }
        } else {
            $this->session->set_flashdata('error', 'Veuillez remplir tous les champs.');
            redirect('Acces/create/' . $serveurid);
        }
    }

    /*
     * return edit user form
     */
    public function edit($id = null)
    {
        $data['serveurs'] = $this->Serveurs_model->getserveurs();
        $data['Acces'] = $this->Acces_model->getaccesById($id);
        $this->load->view('edit', $data);
    }

    /*
     * update user data in database table
     */
    public function update($id = null)
    {
        $this->form_validation->set_rules('typeacces', 'Type acces', 'required');
        $this->form_validation->set_rules('Identifiant', 'Identifiant', 'required');
        $this->form_validation->set_rules('motdepass', 'mot de passe', 'required');

        if ($this->input->post()) {
            if ($this->form_validation->run()) {
                $acces = new stdClass();
                $acces->name = $this->input->post('typeacces');
                $acces->identifiant = $this->input->post('Identifiant');
                $acces->password = $this->input->post('motdepass');
                $serveurid = $this->input->post('serveur_id');
                $res = $this->Acces_model->updateById($id, $acces);
                if ($res) {
                    $this->session->set_flashdata('succus', 'Votre modification est validé');
                    redirect('Acces/show/' . $serveurid);
                } else {
                    $this->session->set_flashdata('error', 'valider votre données');
                    redirect('Acces');
                }
            } else {
                $this->session->set_flashdata('error', 'valider votre données');
                $this->edit($id);
            }
        }
    }

    public function show($id=null)
    {
        $start = 10;
        $data['startt'] = $start;
        if ($this->input->get('startt')) {
            $data['startt'] = $this->input->get('startt');
        }
        $data['serveurid'] = $id;
        $Acces = $this->Acces_model->getAcceswithserveurid($id);
        $data['Acces'] = $Acces;
        $this->load->view('show', $data);
    }

    /*
     * delete user from database
     */
    public function delete($id = null)
    {
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);

        $res = $this->Acces_model->deleteById($request->id);

        if ($res) {
            echo $res;
        } else {
            echo $res;
        }

    }

}