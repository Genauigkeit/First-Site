<?php

    if ( empty($_POST['name']) or empty($_POST['email']) or empty($_POST['comment']) ) 
        exit ("Не все поля заполнены <br>");
    
    $dbhost = 'localhost';
    $dbuser = 'nanakon171_al'; 
    $dbpass = 'kCx3D2do';  
    $dbname = 'nanakon171_al'; 
    $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname); 
    $mysqli->set_charset("utf8");  
    
    $name = htmlspecialchars($name); 
    $email = htmlspecialchars($email);
    $comment = htmlspecialchars($comment);
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $comment = $_POST['comment'];
    
    $result = $mysqli->query("SELECT * FROM `obr_sv` WHERE `name`='$name', `number'='$number', `email`='$email', `comment`='$comment'"); 
    $result = mysqli_fetch_assoc($result); 
    
    if (!empty($result))
        exit("0");
    
    $result = $mysqli->query("INSERT INTO `obr_sv`(`name`, `number`, `email`, `comment`) VALUES ('$name','$number','$email','$comment')");
    if ($result) exit ("1");
    else exit("2");
    

?>