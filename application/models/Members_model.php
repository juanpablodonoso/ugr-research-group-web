<?php
/**
 * Created by PhpStorm.
 * User: pablo
 * Date: 9/07/17
 * Time: 1:16
 */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Members_model extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    /**
     * Devuelte todos los miembros del grupo
     * @return mixed
     */
   public function get_all_members() {
        $this->db->select('users.user_id,users.name,users.img_path, group_members.*')
            ->from('users')
            ->join('group_members', 'group_members.member_id = users.user_id');
        return $this->db->get()->result_array();
   }



   public function get_name_by_id($id)
   {
       $this->db->select('users.user_name');

   }


   public function get_id_by_name($name)
   {

   }

}