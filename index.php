<?php
include_once 'template/header.php' ?>

<div class="jumbotron">
    <div class="container">
        <h1>PHP Education Program</h1>
        <p>Live examples for courses</p>
        <p>
            <a class="btn btn-success btn-lg" href="https://github.com/AntonShevchuk/php-education" role="button">
                <span class="fa fa-github"></span>
                GitHub
            </a>
            <a class="btn btn-primary btn-lg" href="https://www.nixsolutions.com/ru/study-center/" role="button">Learn
                more</a>
        </p>
    </div>
</div>
<div class="container">
    <ul class="list-unstyled lead">
        <?php
        include 'template/menu.php'; ?>
    </ul>
</div>
<div class="container">
    <footer class="row text-center text-muted">
        © 2016 - <?= date('Y') ?> <a href="https://www.nixsolutions.com/">NIX</a><br/>
        © 2016 - <?= date('Y') ?> <a href="https://anton.shevchuk.name/">Anton Shevchuk</a>
    </footer>
</div>

<?php
include_once 'template/footer.php' ?>
