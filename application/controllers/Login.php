<?php
// Controla la sesión del usuario en el sistema


if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        // cargar recursos necesarios para el login
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('html');
        $this->load->database();
        $this->load->library('form_validation');

        // cargar el modelo para el login
        $this->load->model('login_model');
    }

    public function index()  {
        // carga la vista del login 
        $this->load->view('login_view'); 
        $this->login(); 
    }

    public function login() {

       // obtener datos post  
        $username = $this->input->post("txt_username"); 
      //  $password = sha1($this->input->post("txt_password")); 
        $password = $this->input->post("txt_password"); 

        // validación campo requerido 
        $this->form_validation->set_rules("txt_username", "Username", "trim|required");
        $this->form_validation->set_rules("txt_password", "Password", "trim|required");

        if($this->form_validation->run() == FALSE) {
            $this->load->view('login_view'); 
        }
        else{

        // comprobación con base de datos 
        $usr_result = $this->login_model->get_user_valid($username, $password);

        if($this->input->post('btn_login') == "Login")
        {
            echo "<script type='text/javascript'>alert('en login');</script>";
            if($usr_result > 0) {   // usuario existe en bd
                $user = $this->login_model->get_user($username, $password); 

                $sessiondata = array(
                    'username' => $user['name'],
                    'nombre_rol' => $user['rol_name'],
                    'id_usuario' => $user['user_id'],
                    'loged' => TRUE
                );

                // almacenar los datos del usuario en la session
                $this->session->set_userdata($sessiondata); 

                // redirigir en función del rol del usuario logueado
                $this->redirigir($user); 
                
            } else {  // no existe usuario
            
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Invalid username and password</div>');
                    redirect('login');
            }
        }
        }
    }
        
            

   // ----------------------------------------------------------

   /**
   * Redirigir  al controlador adecuado en función de su rol 
   */
   function redirigir($user)
   {
        switch ($user['rol_name']) {
            case 'admin':
                redirect( base_url() . 'index.php/administrador');
                break;
            case 'profesor':
                redirect(base_url(). 'index.php/profesor');
            default:
                redirect(base_url()); 
                break;
        }        

   }
}