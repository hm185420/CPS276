<?php

function init(){
    if($_SESSION['access'] !== "accessGranted")
    {
        header('Location: index.php?page=login');
    }
    return ["<h1>Welcome</h1><p>Welcome " . $_SESSION['name']];

}
?>