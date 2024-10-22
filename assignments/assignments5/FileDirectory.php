<?php
    $message ="<br>";
    if(isset($_POST["submit"]))
    {
        require_once 'Directory.php';
        $directories = new Directories();
        $message = $directories->addDirectories($_POST["folderName"], $_POST["fileContent"]);
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatable" content="IE=edge">
    <meta name="viewport" content="width=device-width" , intel-scale=1.0>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>File and Directory Assignment</title>
    <style>
		* {margin: 0; padding: 0;}
		body {font: 120%/1.5 sans-serif;}
		#wrapper {width: 1000px; margin: 0 auto; border: 1px solid black;}
		main {padding: 10px;}
		main h1 {margin: 15px 10;}
		main p {margin-bottom: 15px;}
		footer {background: #eee; padding: 10px 0; text-align: center}
		footer p {font-size: .8em;}
	</style>
</head>

<body>
    <form method="post" action="#">
        <div class="form-group">
            <div class="form group col-md-10">
            <header>
                <h1>
                    <b>File and Directory Assignment</b>
                </h1>
            </header>
            </div>
            <div class="form group col-md-10">
                <p>
                    Enter a folder name and the contents of a file. Folder names should contain alpha numeric characters only.
                </p>
            </div>
            <div class="form group col-md-10">
                <p>
                    <?php echo $message ?>
                </p>
            </div>
            <div class="form group col-md-8">
                <label for="folderName">Folder Name</label>
                <input type="text" class="form-control" id="folderName" name="folderName">
            </div>
            <div class="form group col-md-8">
                <br>
                <label for="fileContent">File Content</label>
                <textarea style="height: 200px;" class="form-control" id="fileContent" name="fileContent"></textarea>
            </div>
            <div class="form group col-md-8">
                <br>
                <input type="submit" class="btn btn-primary" name="submit" value="Submit"/>
            </div>
        </div>
    </form>
</body>

</html>