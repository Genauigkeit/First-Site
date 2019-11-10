<?php

    if ( empty($_POST['name_subs']) or empty($_POST['email_subs']) ) 
        exit ("Не все поля заполнены <br>");
    
    $dbhost = 'localhost';
    $dbuser = 'nanakon171_al'; 
    $dbpass = 'kCx3D2do';  
    $dbname_subs = 'nanakon171_al'; 
    $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname_subs); 
    $mysqli->set_charset("utf8");  
    
    $name_subs = htmlspecialchars($name_subs); 
    $email_subs = htmlspecialchars($email_subs);
    
    $name_subs = $_POST['name_subs'];
    $email_subs = $_POST['email_subs'];
    
    $result = $mysqli->query("SELECT * FROM `subs` WHERE `name_subs`='$name_subs', `email_subs`='$email_subs'"); 
    $result = mysqli_fetch_assoc($result); 
    
    if (!empty($result))
        exit("0");
    
    $result = $mysqli->query("INSERT INTO `subs`(`name_subs`, `email_subs`) VALUES ('$name_subs','$email_subs')");
    if ($result) exit ("1");
    else exit("2");
?>