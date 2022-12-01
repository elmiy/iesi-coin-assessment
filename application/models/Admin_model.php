<?php 
class Admin_model extends CI_Model{

	public function __construct()
	{
	   $this->load->database();
	}

	public function get_result()
    {
        $query = $this->db->get('assessment');
        return $query->result_array();
    }

 	public function update_role($data,$table,$where){
        $this->db->update($table,$data,$where);
    }

    public function delete_data($table,$where){
        $this->db->where($where);
        $this->db->delete($table);
    }

 	public function getAssessment()
	{

		$query = "SELECT `user`.`name`, `subjects`.`subject`, `classes`.`class`,`coins`.`coin`,count(`assessment`.`coin_id`) AS total
		FROM `user` JOIN `assessment`
		ON `user`.`id`=`assessment`.`user_id` JOIN `subjects` ON `subjects`.`id`=`assessment`.`subject_id` 
		JOIN `coins` ON `assessment`.`coin_id`=`coins`.`id` JOIN `classes` ON `classes`.`id`=`assessment`.`class_id`
		GROUP BY `user`.`name`, `subjects`.`subject`, `coins`.`coin`, `classes`.`class`
		";

		return $this->db->query($query)->result_array();
	}

	// public function hasil($user_id,$class_id,$coin_id)
	// {



	// 	$query = "
	// 	SELECT user.name, subjects.subject, classes.class,coins.coin,count(assessment.coin_id) AS total
	// 	FROM user JOIN assessment
	// 	ON user.id=assessment.user_id JOIN subjects ON subjects.id=assessment.subject_id 
	// 	JOIN coins ON assessment.coin_id=coins.id JOIN classes ON classes.id=assessment.class_id
	// 	GROUP BY user.name, subjects.subject, coins.coin, classes.class
	// 	WHERE assessment.user_id = ".$user_id." and assessment.class_id=".$class_id." and assessment.coin_id=".$coin_id." 
	// 	 ";

	// 	return $this->db->query($query);
	// }

}

 ?>