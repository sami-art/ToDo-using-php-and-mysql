<?php
session_start();
//making connection with database
$conn = mysqli_connect("localhost", "root", "", "php to do");
// if($conn){
//     echo "Connected";
// }else{echo "Not connected";}

//Declaring variables as empty
$task = "";
$err = "";
if(isset($_POST['add-btn'])){
        $task = $_POST['task'];
        if(empty($task)){
            $_SESSION['message'] = "Task can't be empty."; 
		    header('location: index.php');
        }else{
            $sql = mysqli_query($conn,"INSERT INTO tasks (task) VALUES ('$task')");
            if($sql){
                $_SESSION['message'] = "Task added successfully."; 
		    header('location: index.php');
            }
            else{
                $_SESSION['message'] = "Task couldn't be added."; 
                header('location: index.php');
            }
        }
}
if (isset($_GET['del'])) {
    $id = $_GET['del'];
    mysqli_query($conn, "DELETE FROM tasks WHERE id=$id");
    $_SESSION['message'] = "Task deleted!"; 
    header('location: index.php');
}
?>