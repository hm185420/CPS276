<?php
    class Calculator
    {
            public function calc($opp = null, $int1 = null, $int2 = null)
            {
                try
                {
                    if($opp === null || $int1 === null || $int2 === null)
                    {
                        throw new Exception("You must enter a string and two numbers <br/>");
                    }
                    else if($opp == "+")
                    {
                        echo "The sum of the numbers is " . ($int1 + $int2) . "<br/>";
                    } 
                    else if($opp == "-")
                    {
                        echo "The difference of the numbers is " . ($int1 - $int2) . "<br/>";
                    }
                    else if($opp == "*")
                    {
                        echo "The product of the numbers is " . ($int1 * $int2) . "<br/>";
                    }
                    else if($opp == "/")
                    {
                        if($int2 == 0)
                        {
                            echo "The answer is cannot divide a number by zero <br/>" ;
                        }
                        
                      
                    }
                    else
                    {
                        throw new Exception("Cannot perform operation. You must have three arguments. A string for the operator 
(+,-,*,/) and two integers or floats for the numbers. <br/>");
                    }
                }
                catch(exception $e)
                {
                    echo $e->getMessage();
                }
            }
    };
?>