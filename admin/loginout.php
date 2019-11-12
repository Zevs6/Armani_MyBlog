<?php
    //ession_destroy(); 
    setcookie('name' , null , time() - 3600); 
    header('Location: login.php');

?>