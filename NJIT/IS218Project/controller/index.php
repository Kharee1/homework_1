<?php
session_start();
require('../model/database.php');
require('../model/tododatabase.php');
$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'signup';
    }
}
if ($action == 'signup'){
    include('../signupPage.html');
}
else if ($action == 'add_user') {
    $fname = filter_input(INPUT_POST, 'fname');
  	$lname = filter_input(INPUT_POST, 'lname');
  	$email = filter_input(INPUT_POST, 'email');
  	$phone = filter_input(INPUT_POST, 'phone');
  	$birthdate = filter_input(INPUT_POST, 'birthdate');
  	$password = filter_input(INPUT_POST, 'password');
  	$gender = filter_input(INPUT_POST, 'gender');
  	add_user($email, $fname, $lname, $phone, $birthdate, $gender, $password);
    $_SESSION['fname'] = $fname;
    $_SESSION['lname'] = $lname;
    $_SESSION['email'] = $email;
  	header("Location: .?action=taskList");
} 
else if ($action == 'taskList') {
    $my_tasks = get_tasks($_SESSION['email']);
    $completed_tasks = get_completed_tasks($_SESSION['email']);
    $_SESSION['fname'] = get_fname($_SESSION['email']);
	  $_SESSION['lname'] = get_lname($_SESSION['email']);
    include('taskList.php');
} 
else if ($action == 'auth_login'){
    $_SESSION['email'] = filter_input(INPUT_POST, 'email');
    $_SESSION['password'] = filter_input(INPUT_POST, 'password');
    $users = get_users();
    foreach ($users as $user){
      if ($user['email'] == $_SESSION['email'] && $user['password'] == $_SESSION['password']){
			    header("Location: .?action=taskList");}   
    }
}
else if ($action == 'editTasks'){
    $_SESSION['id'] = filter_input(INPUT_POST, 'id');
    include('editTask.php');
}
else if ($action == 'addTask'){
    include('addTask.php');
}
else if ($action == 'addNewTask'){
    $owneremail = $_SESSION['email'];
  	$ownerid = get_ownerid($_SESSION['email']);
	  $message = filter_input(INPUT_POST, 'message');
    $createddate = filter_input(INPUT_POST, 'createddate');
	  $duedate = filter_input(INPUT_POST, 'duedate');
	  addTask($owneremail, $ownerid, $message, $createddate, $duedate);
  	header("Location: .?action=taskList");
}
else if ($action == 'editTask'){
    $taskID = $_SESSION['id'];
	  $message = filter_input(INPUT_POST, 'message');
    $createddate = filter_input(INPUT_POST, 'createddate');
	  $duedate = filter_input(INPUT_POST, 'duedate');
	  editTask($taskID, $message, $createddate, $duedate);
  	header("Location: .?action=taskList");
}
else if ($action == 'deleteTask'){
    $taskID = filter_input(INPUT_POST, 'id');
    delete_task($taskID);
  	header("Location: .?action=taskList");
}
else if ($action == 'completeTask'){
    $taskID = filter_input(INPUT_POST, 'id');
    completeTask($taskID);
  	header("Location: .?action=taskList");
}
else if ($action == 'login') {
	include('login.html');
}
else if ($action == 'logout') {
  	session_destroy();
  	header("Location: .?action=login");
}
?>