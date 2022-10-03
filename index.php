<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once __DIR__ . '/auxiliary/static_includes.php';?>
    <title>Equipment adding form</title>
</head>
<body>
    <header>
        <div class="d-flex justify-content-center">
            <h1><?php echo "Интерфейс добавления оборудования в базу данных"?></h1>
        </div>
    </header>
    <?php 
    require_once __DIR__ . '/page/add_form.php';
    ?>
</body>
</html>