<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }


    /**
     * Consulta para comprobar si un usuario está dentro de la base de datos
     * @param $usr
     * @param $pwd
     * @return mixed
     */
    function get_user_valid($usr, $pwd)
    {
        $sql = "select * from users where nick = '" . $usr . "' and passw= '" . $pwd . "'";
        $query = $this->db->query($sql);
        return $query->num_rows();
    }


    /**
     * Obtiene los datos de un usuario dado su nick y contraseña
     * @param $usr
     * @param $pwd
     * @return mixed
     */
    function get_user($usr, $pwd)
    {
        $this->db->select('users.name,users.user_id, roles.rol_name')
            ->from('users')
            ->join('user_rol', 'users.user_id = user_rol.user_id', 'inner')
            ->join('roles', 'user_rol.rol_id = roles.rol_id')
            ->where('users.nick', $usr)
            ->where('users.passw',$pwd);

        return $this->db->get()->row_array();
    }
}?>