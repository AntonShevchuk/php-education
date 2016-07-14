<?php
$file = isset($_GET['file'])?$_GET['file']:die('Wrong filename');
list($dir, $file) = preg_split('[\/]', $file, 2);

if (isset($file)) {
    $file = $dir . DIRECTORY_SEPARATOR . $file . '.php';
} else {
    $file = $dir . '.php';
}

$path = realpath(__DIR__ . DIRECTORY_SEPARATOR . $file);

if (strpos($path, __DIR__) !== 0) {
    die('Wrong path to file');
}

if (!is_file(__DIR__ . DIRECTORY_SEPARATOR . $file)) {
    die('Wrong filename');
}

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
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
   <style>
        .panel-body code {
            display: block;
            padding: 8px;
            background-color: #f5f5f5;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#examples-navbar" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Homepage</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="examples-navbar">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">List of examples <span class="caret"></span></a>
                    <ul class="dropdown-menu list-group">
                        <?php include 'template/menu.php'; ?>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
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
<div class="container">
    <footer class="row">
        <div class="center">&copy; 2016 <a href="http://www.nixsolutions.com/">NIX Solutions Ltd</a></div>
    </footer>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>
</html>

