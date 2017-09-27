<?php 
class main extends controller{

	private 
		// SORTING CONTENT (0 - DATE DESC, 1 - OWNER->login ASC, 2 - OWNER->email ASC, 3 - TASK->status)
		$sort_by = 0,
		// FILTRING CONTENT (0 - ALL , 1 - OWNERED)
		$filter = 0,
		// USER AUTH object
		$user = "";
	
	// Main page container
    public function main_page(){
    	// TRY AUTH
    	$user = $this->load->model('user');
    	$user = $user->auth();
    	$data['user'] = $user;
    	// [END] TRY AUTH
    	
    	// GET SORT AND FILTER
    	if(isset($_COOKIE['sort_by'])){
    		$data['sort_by'] = $this->sort_by = $_COOKIE['sort_by'];
    	}

    	if(isset($_COOKIE['filter'])){
    		$data['filter'] = $this->filter = $_COOKIE['filter'];
    	}
    	// [END] GET SORT AND FILTER

    	// GET BASE URL TO VIEWS
    	$data['base_url'] = $this->config['base_url'];
  		
  		// HTML HEADER
    	$this->load->view('header', $data);
    	// UP LINE (Login, Reg buttons, Auth status)
    	$this->load->view('upline', $data);
    	// CONTENT CONTAINER (Filters, Sort, Add new)
    	$this->load->view('tasks/list', $data);
    	// HTML FOOTER AND WINDOWS (Login form, Rega form)
    	$this->load->view('footer', $data);

    }


    // GET TASKS LIST 
    public function get_tasks(){
    	// GET BASE URL TO VIEWS
    	$data['base_url'] = $this->config['base_url'];
    	// TRY AUTH
    	$user = $this->load->model('user');
    	$user = $user->auth();
    	if($user != false){
    		$uid = $user->id;
    	}else{
    		$uid = 0;
    	}
    	// [END] TRY AUTH
    	// GET SORT AND FILTER
    	if(isset($_COOKIE['sort_by'])){
    		$this->sort_by = $_COOKIE['sort_by'];
    	}

    	if(isset($_COOKIE['filter'])){
    		$this->filter = $_COOKIE['filter'];
    	}

    	$data['sort_by'] = $this->sort_by;
    	$data['filter'] = $this->filter;

    	// [END] GET SORT AND FILTER

    	// PAGINATION  VARS
    	if(isset($_POST['page'])){
    		$data['curPage'] = $page = addslashes($_POST['page']);
    	}else{
    		$data['curPage'] = $page = 0;
    	}

    	// LOAD TASK MODEL
    	$tasks = $this->load->model('tasks');
    	// GET TASKS (array(object), count global tasks for pagination)
    	$tasks = $tasks->get_tasks($page, $this->sort_by, $this->filter, $uid);
    	// Count tasks
    	$countTasks = $tasks[1];
    	// Tasks object
    	$tasks = $tasks[0];

    	// Count pages in list
    	$data['countPages'] = ceil($countTasks/3);
    	// Pagination block
    	$this->load->view('tasks/pagination', $data);

    	foreach($tasks as $task){
    		$data['task'] = $task;
    		// Full image url
    		$task->img = $this->config['base_url'].$task->img;
    		// Task one item
    		$this->load->view('tasks/item', $data);

    	}

    	// Pagination block
    	$this->load->view('tasks/pagination', $data);

    }

    // Task preview
    public function show_task_preview(){
    	// Text of task
    	$text = addslashes($_POST['text']);
    	// Preview flag (if it set show item as preview)
    	$data['preview'] = 1;
    	// Load image model
    	$images = $this->load->model('image');
    	// Upload image as temp
    	$img = $images->upload('task_image', 'uploads/tasks/', 'temp');
    	// GET BASE URL TO VIEWS
    	$data['base_url'] = $this->config['base_url'];

    	// Preview Block values for task
    	$task = new stdClass();
    	$task->status = 0;
    	$task->text = nl2br($text);
    	$task->atDate = date('Y/m/d', time());
    	$task->img = $img;
    	// [END] Preview Block values for task

    	$data['task'] = $task;
    	// Task item
    	$this->load->view('tasks/item', $data);
    }

    // Add task
    public function add_task(){
    	// TRY AUTH
    	$user = $this->load->model('user');
    	$user = $user->auth();
    	if($user != false){
    		$uid = $user->id;
    	}else{
    		$uid = 0;
    	}
    	// [END]  TRY AUTH
    	// Text of task
    	$text = addslashes($_POST['text']);
    	// Load tasks model
    	$tasks = $this->load->model('tasks');
    	// Add new task (return inserted task id)
    	$nid = $tasks->add_task($text, $uid);
    	
    	// Load image model
    	$images = $this->load->model('image');
    	// Upload image 
    	$img = $images->upload('task_image', 'uploads/tasks/', $nid);
    	// Update task image value after upload
    	$tasks->update_task($nid, 'img', $img);

    	echo "+";
    	
    }

    // Change task image
     public function ch_task_pic(){

     	$data['base_url'] = $this->config['base_url'];
     	$tasks = $this->load->model('tasks');
    	$tid = addslashes($_POST['tid']);

    	$images = $this->load->model('image');
    	$img = $images->upload('task_image', 'uploads/tasks/', $tid);

    	$tasks->update_task($tid, 'img', $img);

    	// image url for update in block
    	echo $img;
    }

    // chage task status
    public function ch_task_status(){

     	$data['base_url'] = $this->config['base_url'];

     	$tid = addslashes($_POST['tid']);
     	$status = addslashes($_POST['status']);

     	$tasks = $this->load->model('tasks');

    	$tasks->update_task($tid, 'tstatus', $status);

    }

    // chage task status
    public function ch_task_date(){

     	$data['base_url'] = $this->config['base_url'];

     	$tid = addslashes($_POST['tid']);
     	$date = addslashes($_POST['date']);
     	// convert format to mysql date
     	$date = date('Y-m-d 00:00:00', strtotime($date));

     	$tasks = $this->load->model('tasks');

    	$tasks->update_task($tid, 'atDate', $date);

    }

    // change task text
    public function ch_task_text(){

     	$data['base_url'] = $this->config['base_url'];

     	$tid = addslashes($_POST['tid']);
     	$text = addslashes($_POST['text']);

     	$tasks = $this->load->model('tasks');

    	$tasks->update_task($tid, 'text', nl2br($text));

    }

    // delete task
    public function delete_task(){

     	$data['base_url'] = $this->config['base_url'];

     	$tid = addslashes($_POST['tid']);

     	$tasks = $this->load->model('tasks');

    	$tasks->delete_task($tid);


    }

    // set sort of tasks list
    public function set_sort(){
    	setcookie("sort_by", addslashes($_POST['sort']), time()+(60*60*24*30), '/');
    }

    // set filter of tasks list
    public function set_filter(){
    	setcookie("filter", addslashes($_POST['filter']), time()+(60*60*24*30), '/');
    }

   

}