<?php
    $file = "No file chosen";

    if (isset( $_POST["UploadFile"]))
    {
        processFile();
    }
    else 
    {
        $output = "";
    }

    function processFile()
    {
        global $output;

        if ($_FILES["fileSelectField"]["error"] == 4)
        {
            $output = "No file was uploaded";
        }
        elseif($_POST["fileName"] == "")
        {
            $output = "File has no name";
        }
        elseif($_FILES["fileSelectField"]["size"] > 100000 || $_FILES["fileSelectField"]["error"] == 1)
        {
            $output = "File is too big";
        }
        elseif ($_FILES["fileSelectField"]["type"] != "application/pdf") 
        {
            $output = "File must be a pdf file";
        }
        elseif (!move_uploaded_file( $_FILES["fileSelectField"]["tmp_name"], "fileLocation/" . $_FILES["fileSelectField"]["name"]))
        {
            $output = "File could not upload";
        }
        else 
        {
            require_once 'fileUploadProc.php';
            $fnam = $_POST["fileName"];
            $uploadFile = new uploadFile();
            $output = $uploadFile->upload($fnam, $_FILES["fileSelectField"]["name"])  . "<br>";
        }
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
    <title>Form</title>
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
    <form method="post" action="#" enctype="multipart/form-data">
        <div class="form-group">
            <div class="form group col-md-10">
                <header>
                    <h1>
                        <b>File Upload</b>
                    </h1>
                </header>
            </div>
            </div>
                <div class="form group col-md-8">
                    <a href="./Links.php">Show File List</a>
                </div>
            </div>
            </div>
                <div class="form group col-md-8">
                    <p><?php echo $output ?></p>
                </div>
            </div>
            </div>
                <div class="form group col-md-8">
                    <label for="fileName">File Name</label>
                    <input type="text" class="form-control" id="fileName" name="fileName">
                </div>
            </div>
            <div class="form group col-md-8">
                <br>
                <input type="file" name="fileSelectField" id="fileSelectField" value="Choose File">
                <label for="fileSelectField" ><?php $file ?></label>
            </div>
            <div class="form group col-md-8">
                <br>
                <input type="submit" class="btn btn-primary" name="UploadFile" value="Upload File"/>
            </div>
        </div>
    </form>
</body>

</html>