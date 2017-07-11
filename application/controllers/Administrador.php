<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Controla las vistas y acciones del administrador
 */
class Administrador extends Aplicacion
{

    public function __construct()
    {
        parent::__construct();

        if($this->session->userdata('loged') && ($this->session->userdata('nombre_rol') == 'admin')) {
            $this->load->helper('form');    // manejo de formularios
            $this->load->library('parser'); // parser de plantillas
            $this->load->database();
            $this->load->model('members_model');
        } else {
            redirect($_SERVER["HTTP_REFERER"]);
        }
    }

    // -----------------------------------------------------------

    // pto entrada
    public function index()
    {

        $this->data['title'] = "Página principal";
        $this->data['_subtitulo'] = "Bienvenido a Investiga";
        $this->data['pagecontent'] = 'welcome';
        $this->data['login_msg'] = 'Login';

        //$this->data['options'] = $this->genarar_opciones_admin();
        // renderizar página
        $this->render();

    }

    // --------------------------------------------------------------


    /**
     * Load the list of members
     */
    public function load_members_list()
    {
        // datos de la página
        $this->data['title'] = "Miembros - Investida";
        $this->data['_subtitulo'] = "Miembros del Grupo";
        $this->data['pagecontent'] = "/admin/user_list";

        // cargar datos en vista y renderizar el template
        $members = $this->members_model->get_all_members();

        if(!empty($members) && is_array($members) && count($members)) {
            $this->data['member_card'] = $this->parser->parse('templates/member_card',
                array('member_info' => $members), true);
        }
        $this->render();
    }
/*
   public function load_members_list()
   {
       //datos de la página
        $this->data['title'] = "Listado miembros - Investida";
        $this->data['_subtitulo'] = "Mimebros del Grupo";
        $this->data['pagecontent'] = "/admin/user_list";

        // cargar datos en vista y renderizar el template
        $members = $this->members_model->get_all_members();


       if(!empty($members) && is_array($members) && count($members)) {
            $this->data['members_data'] = $members;
       }

       $this->render();
   }

*/

    // -------------------------------------------------------



    public function pubs_table() {
        $this->data['title'] = "Publicaciones - Investiga";
        $this->data['_subtitulo'] = "Lista de publicaciones";
        $this->data['pagecontent'] = "admin_pubs_table";



        // cargar datos en la vista
        // load->model('publicaciones');

        // renderizar página
        $this->render();
    }




    /**
     * carga el contenido para añadir un miembro del grupo
     */
    public function load_add_member_view() {
        $this->data['pagebody'] = "admin/add_user";
        $this->render();
    }


    // base_url() . administrador/add_member
    public function add_member() {
        // cargar modelo
        // operaciones para añadir
        redirec(base_url() . 'admin');
    }


    public function generar_menu_admin()
    {
        $choices = $this->config->item('opciones_menu');
        return $this->parser->parse('tema_web/menu', $choices['datos_menu'], true);
    }


    public function genarar_opciones_admin()
    {
        $choices = $this->config->item('opciones_admin');
        foreach ($choices['opciones'] as &$menuitem) {
            $menuitem['active'] = (ltrim($menuitem['link'], '/ ') == uri_string()) ? 'active' : '';
        }
        return ($this->parser->parse('tema_web/options', $choices, true));
    }


    /*
     * Carga la lista de miembros registrados en el sistema
     */
    public function listar_miembros()
    {
        $this->data['pagebody'] = 'admin/lista_miembros';
    }
}