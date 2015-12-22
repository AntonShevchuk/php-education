<?php
$file = isset($_GET['file'])?$_GET['file']:die('Wrong filename');
$file = $file . '.php';

if (!is_file(__DIR__ . DIRECTORY_SEPARATOR . $file)) die('Wrong filename');

$code = highlight_file($file, true);

ob_start();
{
    require $file;
    $result = ob_get_contents();
}
ob_end_clean();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Examples of code</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
    <style>
        code {
            display: block;
            padding: 9.5px;
            background-color: #f5f5f5;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
    </style>
</head>
<body>

<div class="container">

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">
                Code
                <a class="btn btn-default btn-xs pull-right" href="/<?=$file?>" role="button">
                    <span class="glyphicon glyphicon-play" aria-hidden="true"></span>
                </a>
            </h3>
        </div>
        <div class="panel-body">
            <?=$code?>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Result</h3>
            <a href=""></a>
        </div>
        <div class="panel-body">
            <?=$result?>
        </div>
    </div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>
</html>

