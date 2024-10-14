<?php
    Class AddNames
    {
        function addClearNames($str = "", $str0 = "")
        {
            if($str === "" && $str0 === "")
            {
                $str2 = ""; 
                return $str2;
            }
            else if($str === "")
            {
                $arr2 = explode("\n" ,$str0);
                sort($arr2);
                $str2 = "";
                $i = 0;
                While($i < count($arr2))
                {
                    $str2 .= ($arr2[$i] . "\n");
                    $i++;
                }
                $i = 0;
                return $str2;
            }
            else
            {
                $arr1 = explode(" ", $str);
                $arr2 = explode("\n" ,$str0);
                $str1 = ($arr1[1] . ", " . $arr1[0]);
                array_push($arr2, $str1);
                sort($arr2);
                $str2 = "";
                $i = 0;
                While($i < count($arr2))
                {
                    $str2 .= ($arr2[$i] . "\n");
                    $i++;
                }
                return $str2;
            }
        }
    }
?>