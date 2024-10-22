<?php
    Class Directory
    {
        Function addDirectories($fName = "", $fContent)
        {
            $path = "directories/" . $fName;
            if($fName == "")
            {
                return "Enter Folder Name. <br><br><br>";
            }
            else if(file_exists($path))
            {
                return "A directory already exists with that name. <br><br><br>";
            }
            else
            {
                $filePath = $path . "/readme.txt";
                mkdir($path);
                chmod($path, 0777);
                touch($filePath);
                $handle = fopen($filePath, "w");
                fwrite($handle,$fContent);
                return "File and directory were created <br><br>" . "<a href=$filePath>Path where file is located</a>" . "<br>";
            }
        }
    }
?>