<?php

class tasks extends model{

	private 
		$tasks_table = "tasks";

	// get tasks and count global width soting and filtring	
    public function get_tasks($page = 0, $sort_by = 0, $filter = 0, $uid = 0){
    	// sorting
    	if($sort_by == 0){
    		$SORT = " ORDER BY t.atDate DESC";
    	}else if($sort_by == 1){
    		$SORT = " ORDER BY u.login ASC";
    	}else if($sort_by == 2){
    		$SORT = " ORDER BY u.email ASC";
    	}else if($sort_by == 3){
    		$SORT = " ORDER BY t.tstatus ASC";
    	}
    	// [END]  sorting
    	// filter
    	if($filter != 0){
    		$WHERE = " WHERE t.uid = '".$uid."' ";
    	}
    	// [END] filter

    	// query to get tasks
    	$tasks = $this->db->query("SELECT u.*, t.* FROM `".$this->tasks_table."` as t LEFT JOIN `users` as u ON t.uid=u.id ".$WHERE.$SORT." LIMIT ".$page.", 3");
    	// query to get count global without pagintaion 
    	$tasksCount = $this->db->query("SELECT COUNT(t.id) as countItems FROM `".$this->tasks_table."` as t LEFT JOIN `users` as u ON t.uid=u.id ".$WHERE." ");

    	return array($tasks, $tasksCount[0]->countItems);
    }

    // Add task
    public function add_task($text, $uid = 0){
    	$text = htmlspecialchars($text);
    	$this->db->query("INSERT INTO `".$this->tasks_table."` (`text`, `tstatus`, `atDate`, `uid`) VALUES ('".nl2br($text)."', '0', '".date('Y-m-d H:i:s')."', '".$uid."')");
    	return mysql_insert_id();
    }

    // Update task
    public function update_task($id, $name, $value){
    	$this->db->query("UPDATE `".$this->tasks_table."` SET `".$name."`='".$value."' WHERE `id`='".$id."'");
    	return true;
    }

    // delete task
    public function delete_task($id){
    	$this->db->query("DELETE FROM `".$this->tasks_table."` WHERE `id`='".$id."'");
    	return true;
    }
    

}