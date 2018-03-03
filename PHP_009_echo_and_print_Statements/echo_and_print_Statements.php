
<!-- 
PHP 5 echo and print Statements
In PHP there are two basic ways to get output: echo and print.

In this tutorial we use echo (and print) in almost every example. So, this chapter contains a little more info about those two output statements.

PHP echo and print Statements
echo and print are more or less the same. They are both used to output data to the screen.

The differences are small: echo has no return value while print has a return value of 1 so it can be used in expressions. echo can take multiple parameters (although such usage is rare) while print can take one argument. echo is marginally faster than print.

The PHP echo Statement
The echo statement can be used with or without parentheses: echo or echo().

Display Text

The following example shows how to output text with the echo command (notice that the text can contain HTML markup):

 -->
 
<!DOCTYPE html>
<html>
<body>

<?php

echo "<h2>PHP is FUN! </h2>";
echo "Heelo world! <br>";
echo "Im about to learn PHP ! <br>";
echo "This ","String","was", "made", "with","multiple paramters";

#Display Variables
#The following example shows how to output text and variables with the echo statement:
$txt1 = "Learn PHP";
$txt2 = "Kobeprogramming";
$x = 5;
$y = 4;

echo "<h2>". $txt1 . "<br>";
echo "Study PHP at " .$txt2. "<br>";
echo $x + $y;


?> 

</body>
</html>