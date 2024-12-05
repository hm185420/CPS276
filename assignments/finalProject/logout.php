<?php
function kill_session(){
    session_start();

/* DELETE THE SESSION VALUES*/
session_destroy();

/* REDIRECT TO THE INDEX.PHP PAGE*/ 
header('Location: index.php');

}
