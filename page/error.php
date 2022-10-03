<?php 

require_once __DIR__ . '/../auxiliary/ErrorsChecker.php';

$errors = ErrorsChecker::CheckErrors();

function PrintErrors($errors) {
    foreach ($errors as $error) {
        echo '<div class="alert alert-danger">' . $error . '</div> ';  
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php require_once __DIR__ . '/../auxiliary/static_includes.php';?>
        <title>Error page</title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-3">
                    <a href="/" class="btn btn-link">
                        Вернуться на главную страницу
                    </a>
                </div>
                <div class="col-9"></div>        
            </div>
            <div class="row">
                <?php
                PrintErrors($errors)
                ?>
            </div>
        </div>
    </body>
</html>