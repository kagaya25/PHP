



<html>
<head>
<title>tiitle of the documents</title>
</head>
<body>

<form>
	<input type="text" name="num1" placeholder = "Number 1">
	<input type="text" name="num2" placeholder = "Number 2">
	<select name = "operator">
		<option>None</option>
		<option>Add</option>
		<option>Subtract</option>
		<option>Multiply</option>
		<option>Divide</option>
	</select>
	<br>
	<button   type = "submit" name="Submit" value="submit">Calculate</button>
</form>
<p>the answer is: </p>
<?php 
    if(isset($_GET['Submit'])){
        $result1 = $_GET['num1'];
        $result2 = $_GET['num2'];
        $operator = $_GET['operator'];
        switch ($operator){
            case "None":
                echo "Error You need to select a methods";
                break;
            case "Add":
                echo $result1 + $result2;
                break;
            case "Subtract":
                echo $result1 - $result2;
                break;
            case "Multiply":
                echo $result1 * $result2;
                break;
            case "Divide":
                echo $result1 / $result2;
                break;
                
        }// end of switch
        
    }// end of if
?>

</body>
</html>
