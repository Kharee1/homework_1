<?php
session_start();
?>

<html lang="en">
<head>
  <title>Create Task</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

    <form action="." method="post">
    <input type="hidden" name="action" value="add_new_task">
    <div class="container">
        <div class = "border">
        <h2> Task Manager</h2>
        <legend>Edit Task</legend>
            <div class="form-group">
              <label for="task">Task:</label>
              <input type=text name="message" class="form-control" id="task"  autocomplete="off">
            </div>
            
            <div class="form-group">
              <label for="startdate">Start Date:</label>
              <input type="date" name="createddate" class="form-control" id="startdate"  autocomplete="off"> 
            </div>
            
            <div class="form-group">
              <label for="duedate">Due Date:</label>
              <input type="date" name="duedate" class="form-control" id="duedate"  autocomplete="off"> 
            </div>
            
             
            <input type="submit" class="btn btn-info" value="Add Task">

        </div>
      </form>
    </div>
  </body>


</html>