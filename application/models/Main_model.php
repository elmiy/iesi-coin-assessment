<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_model extends CI_Model
{
	
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
}