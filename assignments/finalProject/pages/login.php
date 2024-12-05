<?php

require_once('classes/StickyForm.php');
$stickyForm = new StickyForm();

function init()
{
	global $elementsArr, $stickyForm;
	$msg="";

	if(isset($_POST['submit']))
    {
		$postArr = $stickyForm->validateForm($_POST, $elementsArr);

		require_once 'classes/Pdo_methods.php';
		$pdo = new PdoMethods();
		$sql = "SELECT name, email, password, status FROM admins WHERE email = :email";
		$bindings = array
		(
			array(':email', $_POST['email'], 'str')
		);

		$records = $pdo->selectBinded($sql, $bindings);

	
		if($records == 'error')
		{
			$msg="There was an error logging in";
		}
			
		
		else
		{
			if($_POST['password'] == "" || $_POST['email'] == "")
			{
				return getForm("", $postArr);
			}
			else if(count($records) != 0)
			{
				if(password_verify($_POST['password'], $records[0]['password']))
				{
					$_SESSION['access'] = "accessGranted";
					$_SESSION['status'] = $records[0]['status'];
					$_SESSION['name'] = $records[0]['name'];
					$msg="";

					header('location: '.'index.php?page=welcome');
				}
				else 
				{
					$msg="Login credentials incorrect";
					return getForm($msg, $postArr);
				}
			}
			else
			{
				$msg="Login credentials incorrect";
				return getForm($msg, $postArr);
			}
		}
	}
	else
	{
		return getForm("", $elementsArr);
	}
}

function getForm($acknowledgement, $elementsArr)
{
    /* THIS IS A HEREDOC STRING WHICH CREATES THE FORM AND ADD THE APPROPRIATE VALUES AND ERROR MESSAGES */
	$form = <<<HTML
		<h1>
			Login
		</h1>
		<p>$acknowledgement</p>
		<form method="post" action="index.php?page=login">
			<div class="form-group">
				<label for="email">Email{$elementsArr['email']['errorOutput']}</label>
				<input type="text" class="form-control" id="email" name="email" value="{$elementsArr['email']['value']}" >
			</div>
			<div class="form-group">
				<label for="password">Password{$elementsArr['password']['errorOutput']}</label>
				<input type="password" class="form-control" id="password" name="password" value="{$elementsArr['password']['value']}" >
			</div>
			<div>
				<button type="submit" name="submit" class="btn btn-primary">Login</button>
			</div>
		</form>
	HTML;

    /* HERE I RETURN AN ARRAY THAT CONTAINS AN ACKNOWLEDGEMENT AND THE FORM.  THIS IS DISPLAYED ON THE INDEX PAGE. */
    return [$form];
}

$elementsArr =
[
	"email"=>
    [
        "errorMessage"=>"<span style='color: red; margin-left: 15px;'>Email cannot be blank and must be written as a proper email</span>",
        "errorOutput"=>"",
        "type"=>"text",
        "value"=>"hmoon3@wccnet.edu",
        "regex"=>"email"
	],
    "password"=>
    [
        "errorMessage"=>"<span style='color: red; margin-left: 15px;'>Password cannot be blank</span>",
        "errorOutput"=>"",
        "type"=>"text",
        "value"=>"password",
        "regex"=>"password"
	]
];

?>