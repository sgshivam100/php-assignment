<?php

require_once("config.php");
    if(isset($_POST['user_delete'])){
        $user_id=$_POST['user_delete'];
        $query="DELETE FROM users where email='$email'";
        $query_run=mysqli_query($dbc,$query);

        if($query_run){
            $SESSION['message']="deleted successfully"
            header('Location:index.php');
            exit(0);
        }
        else{
            $SESSION['message']="something went wrong";
            header('Location:index.php');
            exit(0);
        }
    }
?>