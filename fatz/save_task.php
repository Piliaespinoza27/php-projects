<?php 
    include("db.php");
//busca si encuentra un valor que se este recibiendo desde el index mediante la peticion post
    if(isset($_POST['save_task'])){
       $title = $_POST['title'];
       $description = $_POST['description'];
       
       $query = sprintf("INSERT INTO task(title, description) VALUES('$title','$description')");

    
       $result = mysqli_query($conn, $query);


        if(!$result){
            die("Query failed");
        }

        $_SESSION['message'] = 'Task Saved  succesfully';
        $_SESSION['message_type'] = 'success';

         header("location: index.php");       
       
    }
?>