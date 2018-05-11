
function addUser($email, $fname, $lname, $phone, $birthdate, $gender, $password) {
	  global $db;
  	$query = 'INSERT INTO accounts (email, fname, lname, phone, birthdate, gender, password)
  			  VALUES (:email, :fname, :lname, :phone, :birthdate, :gender, :password)';
  	$statement = $db->prepare($query);
    $statement->bindValue(":email", $email);
    $statement->bindValue(":fname", $fname);
    $statement->bindValue(":lname", $lname);
    $statement->bindValue(":phone", $phone);
    $statement->bindValue(":birthdate", $birthdate);
    $statement->bindValue(":gender", $gender);
    $statement->bindValue(":password", $password);
    $statement->execute();    
    $statement->closeCursor(); 
}
function getTasks($userEmail){
    global $db;
    $query ='SELECT * FROM todos WHERE userEmail = :userEmail AND isdone=0 ORDER BY id';
    $statement = $db->prepare($query);
    $statement->bindValue(":userEmail", $userEmail);
    $statement->execute();
    $tasks = $statement->fetchAll();
    $statement->closeCursor();
    return $tasks; 
}
function getCompletedTasks($userEmail){
    global $db;
    $query ='SELECT * FROM todos WHERE userEmail = :userEmail AND isdone=1 ORDER BY id';
    $statement = $db->prepare($query);
    $statement->bindValue(":userEmail", $userEmail);
    $statement->execute();
    $comp_tasks = $statement->fetchAll();
    return $comp_tasks; 
}
function getfname($email){
    global $db;
    $query ='SELECT * FROM accounts WHERE email = :email';
    $statement = $db->prepare($query);
    $statement->bindValue(":email", $email);
    $statement->execute();
    $result = $statement->fetch();
    $statement->closeCursor();
    $fname = $result['fname'];
    return $fname;    
}
function getlname($email){
    global $db;
    $query = 'SELECT * FROM accounts WHERE email = :email';
    $statement = $db->prepare($query);
    $statement->bindValue(":email", $email);
    $statement->execute();
    $result = $statement->fetch();
    $statement->closeCursor();
    $lname = $result['lname'];
    return $lname;   
}
function getownerId($email){
    global $db;
    $query = 'SELECT * FROM accounts WHERE email = :email';
    $statement = $db->prepare($query);
    $statement->bindValue(":email", $email);
    $statement->execute();
    $result = $statement->fetch();
    $statement->closeCursor();
    $ownerId = $result['id'];
    return $ownerId;   
}
function getUsers() {
    global $db;
    $query = 'SELECT * FROM accounts';
    $statement = $db->prepare($query);
    $statement->execute();
    $users = $statement->fetchAll();
    
    return $users;    
}
function addTask($userEmail, $ownerId, $message, $createddate, $duedate) {
  	global $db;
  	$query = 'INSERT INTO todos (userEmail, ownerId, createddate, duedate, message, isdone)
             VALUES (:userEmail, :ownerId, :createddate, :duedate, :message, 0)';
    $statement = $db->prepare($query);
    $statement->bindValue(":userEmail", $userEmail);
    $statement->bindValue(":ownerId", $ownerId);
    $statement->bindValue(":createddate", $createddate);
    $statement->bindValue(":duedate", $duedate);
    $statement->bindValue(":message", $message);
    $statement->execute();
    $statement->closeCursor();
}
function editTask($taskId, $message, $createddate, $duedate) {
  	global $db;
  	$query = 'UPDATE todos
  			      SET message = :message, createddate = :createddate, duedate = :duedate
              WHERE id = :id';
    $statement = $db->prepare($query);
    $statement->bindValue(":id", $taskId);
    $statement->bindValue(":message", $message);
    $statement->bindValue(":createddate", $createddate);
    $statement->bindValue(":duedate", $duedate);
    $statement->execute();
    $statement->closeCursor();
}
function deleteTask($taskId) {
  	global $db;
  	$query = 'DELETE FROM todos
              WHERE id = :id';
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $taskId);
    $statement->execute();
    $statement->closeCursor();
}
function completeTask($taskId) {
  	global $db;
  	$query = 'UPDATE todos
  			      SET isdone = 1
              WHERE id = :id';
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $taskId);
    $statement->execute();
    $statement->closeCursor();
}