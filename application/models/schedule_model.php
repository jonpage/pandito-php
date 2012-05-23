<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @author Jonathan Page <jonpage.econ@gmail.com>
 */
class Schedule_model extends CI_Model{

	function __construct(){
		parent::__construct();
	}

	/**
	 * This is an admin function to retrieve the 30 most recent scheduled lab times
	 * @return [type] [description]
	 */
	function get_schedule(){
		$query = $this->db->query("SELECT `treatment_ids`, UNIX_TIMESTAMP(`open_time`) AS 'open', UNIX_TIMESTAMP(`close_time`) AS 'close' FROM `schedule` WHERE `close_time` > NOW() ORDER BY 'open' DESC");
		$schedule = array();
		if($query->num_rows()>0){
			foreach ($query->result() as $key => $row) {
				$schedule[$key]['open'] = $row->open;
				$schedule[$key]['close'] = $row->close;
				$query2 = $this->db->query("SELECT `config`,`controller` FROM `treatment` WHERE `treatment`.`id` IN " . $row->treatment_ids);
				if($query2->num_rows()>0){
					foreach ($query2->result() as $key2 => $row2) {
						//var_dump($row2);
						$json = json_decode($row2->config,true);
						$schedule[$key]['treatments'][$key]['controller'] = $row2->controller;
						$schedule[$key]['treatments'][$key]['powers'] = json_encode($json['powers']);
						if(array_key_exists('characteristic', $json)){
							$schedule[$key]['treatments'][$key]['characteristic'] = json_encode($json['characteristic']);
						}
						if(array_key_exists('allowed_types', $json)){
							$schedule[$key]['treatments'][$key]['allowed_types'] = json_encode($json['allowed_types']);
						}
					}
				}
			}
		}
		return $schedule;
	}

	/**
	 * This function returns an array of upcoming lab hours 
	 * @return mixed [description]
	 */
	function get_lab_times(){
		$completed_query = $this->db->query("SELECT `session`.`treatment_id` FROM `session`,`session_members`,`user` WHERE `session_members`.`user_id` = `user`.`id` AND `session`.`end_time` <> 0 AND `session_members`.`session_id` = `session`.`id` AND `user`.`email` = '" . $this->session->userdata('email') . "'");
		if($completed_query->num_rows()>0){ // user has completed at least one treatment
			foreach ($completed_query->result_array() as $row) {
			   $completed[] = $row['treatment_id'];
			}
			//$exclusion_str = "(" . implode(",",$completed) . ")";
			$exclusion_str = "(0)";

			// grab all the labs that are not closed yet, grab the dates in UTC format
			$open_lab_query = $this->db->query("SELECT `id`,`treatment_ids`, UNIX_TIMESTAMP(`open_time`) AS 'open', UNIX_TIMESTAMP(`close_time`) AS 'close' FROM `schedule` WHERE `close_time` > NOW() ORDER BY 'open'");
			if($open_lab_query->num_rows()>0){ // there are open lab times
				foreach ($open_lab_query->result_array() as $row3) {
					//$row['treatment_ids']
					// see if this lab includes a treatment that this user has yet to complete
					$available_query = $this->db->query("SELECT * FROM `treatment` WHERE `treatment`.`id` IN " . $row3['treatment_ids'] . " AND `treatment`.`id` NOT IN $exclusion_str");
					if($available_query->num_rows()>0){ // there are available treatments in this lab
						foreach ($available_query->result_array() as $row2) {
						   $treatments[] = $row2['id'];
						   if(in_array($row2['id'], $completed)){
						   		$closed_array[] = 1;
						   } else {
						   		$closed_array[] = 0;
						   }
						   //$controllers[] = 
						}
						$treatments_str = "(" . implode(",",$treatments) . ")";
						$available[$row3['id']]['treatment_ids'] = $treatments_str;

						$closed_str = "(" . implode(",", $closed_array) . ")";
						$available[$row3['id']]['closed'] = $closed_str;

						$available[$row3['id']]['open_time'] = $row3['open'];
						$available[$row3['id']]['close_time'] = $row3['close'];
						$available[$row3['id']]['controller'] = $row3['close'];
					} else { // no available treatments
						// do nothing
					}
					$treatments = array();
					$closed_array = array();
				}

				// see if there are any available lab times
				if(isset($available)){
					return $available;
				} else {
					return false;
				}
			} else { // there are no open lab times
				return false;
			}
			
		} else { // user has not completed any treatments
			$open_lab_query = $this->db->query("SELECT `id`,`treatment_ids`, UNIX_TIMESTAMP(`open_time`) AS 'open', UNIX_TIMESTAMP(`close_time`) AS 'close' FROM `schedule` WHERE `close_time` > NOW() ORDER BY 'open'");
			if($open_lab_query->num_rows()>0){
				foreach ($open_lab_query->result_array() as $row3) {
					$available[$row3['id']]['treatment_ids'] = $row3['treatment_ids'];
					$available[$row3['id']]['open_time'] = $row3['open'];
					$available[$row3['id']]['close_time'] = $row3['close'];
				}
				return $available;
			} else {
				return false;
			}
		}
	}

}

/* End of file schedule_model.php */