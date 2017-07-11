<?php
defined('BASEPATH') OR exit('No direct script access allowed');




/**
* Controla las accciones y vistas de la página principal para el usuario no logueado 
*/
class Welcome extends Aplicacion {

	public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');	// manejo de formularios 
		$this->load->library('parser'); // parser de plantillas
        $this->load->model('members_model');
    }

	// pto entrada 
    public function index()
	{
		/*$this->data['title'] = "Página principal";
		$this->data['_subtitulo'] = "Bienvenido a Investiga";  
		$this->data['pagecontent'] = 'admin/user_list';
		$this->data['login_msg'] = 'Login';
		$this->data['username']  = 'Pablo';

		// renderizar página 
		$this->render(); */
		$this->load_members_list();
		  
	}

    /**
     * Load the list of members
     */
    public function load_members_list()
    {
        // datos de la página
        $this->data['title'] = "Listado miembros - Investida";
        $this->data['_subtitulo'] = "Mimebros del Grupo";
        $this->data['pagecontent'] = "admin/user_list";

        // cargar datos en vista y renderizar el template
        $members = $this->members_model->get_all_members();

        if(!empty($members) && is_array($members) && count($members)) {
            $this->data['member_card'] = $this->parser->parse('templates/member_card',
                array('member_info' => $members),
                true);
        }
        $this->render();
    }
}
