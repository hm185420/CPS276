<?php
    $output = "";
    if(isset($_POST["clearNames"]))
    {
        require_once 'AddName.php';
        $addName = new AddNames();
        $output = $addName->addClearNames("", "");
    }
    if(isset($_POST["addName"]))
    {
        require_once 'AddName.php';
        $addName = new AddNames();
        $output = $addName->addClearNames($_POST["enterName"], $_POST["nameList"]);
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
    <title>Names</title>
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
            <div class="form group col-md-12">
            <header>
                <h1>
                    Add Names
                </h1>
            </header>
            </div>
            <div class="form group col-md-12">
                <input type="submit" class="btn btn-primary" name="addName" value="Add Name"/>
                <input type="submit" class="btn btn-primary" name="clearNames" value="Clear Names"/>
            </div>
            <div class="form group col-md-12">
                <br>
                <label for="enterName">Enter Name</label>
                <input type="text" class="form-control" id="enterName" name="enterName">
            </div>
            <div class="form group col-md-12">
                <br>
                <label for="nameList">List of Names</label>
                <textarea style="height: 500px;" class="form-control" id="nameList" name="nameList"><?php echo $output ?></textarea>
            </div>
        </div>
    </form>
</body>

</html>