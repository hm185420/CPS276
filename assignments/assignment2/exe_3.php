<?php
    function table()
    {
        $rows = 15;
        $cell = 5;
        $i = 1;
        $j = 1;
        echo '<table border="1">';
        while($i < $rows+1)
        {
            echo '<tr>';
            while($j < $cell+1)
            {
                echo '<td>';
                echo "Row ".$i." Cell ".$j;
                echo '</td>';
                $j++;
            };
            echo '</tr>';
            $i++;
            $j = 1;
        };
        echo '</table>';
    };
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatable" content="IE=edge">
    <meta name="viewport" content="width=device-width" , intel-scale=1.0>
    <title>Exercise 3</title>
</head>

<body>
    <p>
        <?php echo table() ?>
    </p>
</body>

</html>