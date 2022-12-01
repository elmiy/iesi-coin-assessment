<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Table_model extends CI_Model
{
	
	public function getTeaching()
	{
		$query = "SELECT `teaching_distribution`.*, `user`.`name`, `subjects`.`subject`
		FROM `teaching_distribution` JOIN `user` 
		ON `teaching_distribution`.`user_id` = `user`.`id` JOIN `subjects` ON `teaching_distribution`.`subject_id` = `subjects`.`id` ";

		return $this->db->query($query)->result_array();
	}

	public function getOneTeachingWhere($where = NULL){
        $this->db->select("teaching_distribution.*, subjects.subject, user.name, teaching_distribution.id as teaching_id")->from("teaching_distribution"); 
        $this->db->join("subjects","teaching_distribution.subject_id = subjects.id");
        $this->db->join("user","teaching_distribution.user_id = user.id");
        $this->db->where($where); 

        $query = $this->db->get();
        if ($query->num_rows() >0){  
            //result array ngebuat jadii datanya array 
            //diganti aja biar gak pusing
            return $query->row();
        }else{
            return FALSE;
        }
    }
    public function countTeaching($where)
    {
        $result = $this->db->get_where('teaching_distribution', $where);
    
        return $result->num_rows();
    }
    public function update_data($data,$table,$where){
        $this->db->update($table,$data,$where);
    }

    public function delete_data($table,$where){
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function update_menu($data,$table,$where){
        $this->db->update($table,$data,$where);
    }
}