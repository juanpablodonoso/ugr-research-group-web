<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aplicacion extends CI_Controller
{
    protected $data = array();

    public function __construct()
    {
        parent::__construct();  // CI_Controller
        $this->data = array(); 
        $this->data['title'] = "Web Research Group"; // default
        $this->load->library('parser');  // to render templates
    }

    /**
    * Render page header 
    */
    public function render_header() {

        if($this->session->userdata('loged')) {
            // navbar login content 
            $this->data['login_msg'] = 'Logout'; 
            $this->data['icon'] = 'log-out'; 
            // subtitle bar content
            $msg_template = '
                 <dl class="dl-horizontal">
                     <dt>Identificado como:</dt>
                     <dd>{username}</dd>
                     <dt>Rol:</dt>
                     <dd>{rolname}</dd>
                 </dl>
             ';

             $msg_data = array(
                 'username'=> $this->session->userdata('username'),  
                'rolname' => $this->session->userdata('nombre_rol')
             ); 

        }else{
            // navbar login content 
            $this->data['login_msg'] = 'Login'; 
            $this->data['icon'] = 'log-in'; 
            // subtitle bar content 
            $msg_template = '
            <p class="navbar-text navbar-right"><a href="#" class="navbar-link">Iniciar sesión</a></p>
            '; 
            $msg_data = array(
                'msg' => 'No has iniciado sesión'
            );
        }
        // mensaje que varía en función del usuario logueado
        $this->data['login_subtitle_info'] =  $this->parser->parse_string($msg_template, $msg_data,TRUE); 
        // render navbar 
        $this->data['bar_login'] = $this->parser->parse('tema_web/bar_login', $this->data, true);
        // render subtitle
        $this->data['sub_titulo'] = $this->parser->parse('tema_web/sub_titulo', $this->data, true); 
    }



    /**
     *
     * Renderiza las vista usando la librería parser, para emplear el sistema gestor de plantillas
    * Función para renderizar la página.
    * Con este método renderizamos todas las plantillas con los datos adecuados para finalmente
    * rederizar la plantilla que se ha usado para crear la arquitectura de la página
    */
    function render() {

        // Si el controlador de la página no ha definido
        // el título, asignamos título por defecto
        if (!isset($this->data['pagetitle']))
			$this->data['pagetitle'] = $this->data['title'];

        $this->render_header(); 
        // cargar datos correspondientes en barra login 
        // $this->data['bar_login'] = $this->parser->parse('tema_web/bar_login', $this->data, true);

        // cargar barra de posición 
        // $this->data['sub_titulo'] = $this->parser->parse('tema_web/sub_titulo', $this->data, true); 

        // generar menú
        $this->generar_menu();

        // generar opciones del administrador
        $this->genarar_opciones_admin();


        // generar el contenido de cada página
        $this->data['content'] = $this->parser->parse($this->data['pagecontent'], $this->data, true);



        // El contenido de la página se carga usando la carga de vista clásica que va imprimiendo
        // contenido mediante PHP

        //$this->data['content'] = $this->load->view($this->data['pagecontent'], $this->data, TRUE);


        // renderizar página completa en el navegador
        $this->data['data'] = &$this->data;
		$this->parser->parse('tema_web/template', $this->data);
        
    }



    // =============================================================

    /**
     * Genera el menú de obciones de la aplicación
     */
    function generar_menu() {

        $controller = 'member'; 
        if($this->session->userdata('nombre_rol') == 'admin') $controller = 'administrador'; 
       
        $choices = $this->config->item('opciones_menu');
        $base = base_url() . 'index.php/';
        foreach ($choices['datos_menu'] as &$menuitem)
        {
            // añadir a la url el conrolador en el que nos encontremos
            $menuitem['link'] = $base  . $controller . $menuitem['link']; 
            // activar en el menú la dirección en la que nos encontremo 
            $menuitem['active'] = ($menuitem['link'] == current_url()) ? 'active' : '';
        }
        $this->data['menu'] = $this->parser->parse('tema_web/menu', $choices, true);
    }

    // ==============================================================

    /**
     * Genera el ménú de opciones disponibles para el administrador
     */
    function genarar_opciones_admin() {
        $choices = $this->config->item('opciones_admin');
        foreach ($choices['opciones'] as &$menuitem)
        {
            $menuitem['active'] = (ltrim($menuitem['link'], '/ ') == uri_string()) ? 'active' : '';
        }
        $this->data['options'] = $this->parser->parse('tema_web/options', $choices, true);
    }


    /**
     * Render the views using the load->view() Codeigniter method
     * for user PHP inside views
     */
    function render_view() {

    }

}
