<?php
    function unList()
    {
        $int1 = 4;
        $int2 = 5;
        $a = 1;
        $b = 1;
        while($a <= $int1)
        {
            echo '<ul>';
            echo '<li>'.$a.'</li>';
            echo '<ul>';
            while($b <= $int2)
            {
                echo '<li>'.$b.'</li>';
                $b++;
            };
            echo '</ul>';
            echo '</ul>';
            $b=1;
            $a++;
        };
    };
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatable" content="IE=edge">
    <meta name="viewport" content="width=device-width" , intel-scale=1.0>
    <title>Exersise 1</title>
</head>

<body>
    <p>
        <?php echo unlist()?>
    </p>
</body>

</html>