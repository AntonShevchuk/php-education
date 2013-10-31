<?php
if($_POST['submit']) {
    $a = $_REQUEST["first"];
    $b = $_REQUEST["second"];
    $c = $_REQUEST["action"];
    switch($c){
        case 1:
            $res = $a+$b;
            echo $res;
            break;
        case 2:
            $res = $a-$b;
            echo $res;
            break;
        case 3:
            $res = $a*$b;
            echo $res;
            break;
        case 4:
            if ($b == 0){
                echo "На ноль делить нельзя!";
            }
            else{
                $res = $a/$b;
                echo $res;
            }
            break;
    }
}
else {
    echo "<h1 align=center>Калькулятор</h1>
		<form action='calc.php' method=POST>
		<p>Введите число:<input type=text name='first' value=''><br></p>
		<p>Выберите действие:<select name='action'>
		<option value='1'>+</option>
		<option value='2'>-</option>
		<option value='3'>*</option>
		<option value='4'>/</option>
		</select><br></p>
		<p>Введите второе число:<input type='text' name='second' value=''><br></p>
		<p><input type='submit' value='GO!' name='submit'><br></p>";
}