<?php

$path = "index.php?page=login";

session_start();
$_SESSION['access'];
if($_SESSION['access'] == "accessGranted")
{
    $stat = '';

    if($_SESSION['status'] == "admin")
    {
        $stat = 
        <<<HTML
            <li class="nav-item"><a class="nav-link" href="index.php?page=addAdmin">Add Admin</a></li>
            <li class="nav-item"><a class="nav-link" href="index.php?page=deleteAdmins">Delete Admin(s)</a></li>
        HTML;
    }

    $nav=
    <<<HTML
        <nav>
            <ul class="nav">
                <li class="nav-item"><a class="nav-link" href="index.php?page=addContact">Add Contact</a></li>
                <li class="nav-item"><a class="nav-link" href="index.php?page=deleteContacts">Delete Contact(s)</a></li>
                $stat
                <li class="nav-item"><a class="nav-link" href="index.php?page=logout">Logout</a></li>
            </ul>
        </nav>
    HTML;
}
else
{
    $nav="";
}

if(isset($_GET))
{
    if($_GET['page'] === "addContact")
    {
        require_once('pages/addContact.php');
        $result = init();
    }  
    else if($_GET['page'] === "deleteContacts")
    {
        require_once('pages/deleteContacts.php');
        $result = init();
    }
    else if($_GET['page'] === "addAdmin")
    {
        require_once('pages/addAdmin.php');
        $result = init();
    }
    else if($_GET['page'] === "deleteAdmins")
    {
        require_once('pages/deleteAdmins.php');
        $result = init();
    }
    else if($_GET['page'] === "welcome")
    {
        require_once('pages/welcome.php');
        $result = init();
    }
    else if($_GET['page'] === "login")
    {
        require_once('pages/login.php');
        $result = init();
    }
    else if($_GET['page'] === "logout")
    {
        require_once('logout.php');
        kill_session();
        session_start();
        $_SESSION['access'] = "no";
    }
    else 
    {
        header('location: '.$path);
        $_SESSION['access'] = "no";
	    $_SESSION['status'] = "no";
    }
}
else 
{
    header('location: '.$path);
    $_SESSION['access'] = "no";
	$_SESSION['status'] = "no";
}
?>