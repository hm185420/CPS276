<?php
function init()
{
    if($_SESSION['access'] !== "accessGranted" || $_SESSION['status'] !== "admin")
    {
        header('Location: index.php?page=login');
    }

    require_once 'classes/Pdo_methods.php';

    if(isset($_POST['delete']))
    {
        if(isset($_POST['chkbx']))
        {
            $error = false;
            foreach($_POST['chkbx'] as $id)
            {
                $pdo = new PdoMethods();

                $sql = "DELETE FROM admins WHERE id=:id";
                
                $bindings = 
                [
                    [':id', $id, 'int'],
                ];


                $result = $pdo->otherBinded($sql, $bindings);

                if($result === 'error')
                {
                    $error = true;
                    break;
                }
            }
        }
    }

    if(isset($error))
    {
        if($error)
        {
            $msg = "<p>Could not delete the admin(s)</p>";
        }
        else 
        {
            $msg = "<p>Admin(s) deleted</p>";
        }
    }
    else 
    {
        $msg="";
    }
    
    $output = "<h1>Delete Admin(s)</h1><p>$msg</p>";
    
    $pdo = new PdoMethods();

    /* HERE I CREATE THE SQL STATEMENT I AM BINDING THE PARAMETERS */
    $sql = "SELECT * FROM admins";

    $records = $pdo->selectNotBinded($sql);

    if(count($records) === 0)
    {
        $output .= "<p>There are no records to display</p>";
        return [$output,""];
    }
    else 
    {
        $output .= "<form method='post' action='index.php?page=deleteAdmins'>";
        $output .= "<input type='submit' class='btn btn-danger' name='delete' value='Delete'/><br><br><table class='table table-striped table-bordered'>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Status</th>
                <th>Delete</th>
            </tr>
        </thead><tbody>";

        foreach($records as $row)
        {
            $output .= "<tr><td>{$row['name']}</td>
            <td>{$row['email']}</td>
            <td>{$row['password']}</td>
            <td>{$row['status']}</td>
            <td><input type='checkbox' name='chkbx[]' value='{$row['id']}' /></td></tr>";
        }

        $output .= "</tbody></table></form>";
        return [$msg, $output];
    }
}