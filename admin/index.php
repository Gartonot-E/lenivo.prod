<?php
    require_once '../connect.php';
    
    $errors = [];
    $success = [];

    if(isset($_POST['done_add_event']))
    {
        $title = $_POST['title'];
        $info = $_POST['info'];
        $date = $_POST['date'];

        if(!empty($title) && !empty($info) !empty($date))
        {
            $res = $mysqli->query("insert into `events` (`title`, `info`, `date`)");
        }

        if(!$res)
        {
            $errors[] = 'Ошибка с базой';
        }else 
        {
            $success[] = 'Мероприятие успешно создано';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Добавление мероприятия</title>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Cuprum:ital,wght@0,600;0,700;1,400&family=Open+Sans&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../assets/css/style.css">
    </head>
    <body>
        <div class="wrapper">
            <header class="header">
                <div class="container">
                    <nav class="nav-bar">
                        <a href="/" class="logo">Lanivo.Prod</a>
                        <ul>
                            <li><a href="#">Все мероприятия</a></li>
                            <li><a href="#">Мои мероприятия</a></li>
                            <li><a href="#">Выйти</a></li>
                        </ul>
                    </nav>
                </div>
            </header>
            <main>
                <div class="container">
                    <form method="POST">
                        <?php
                            if(!empty($errors))
                            {
                                echo "<div class='errors'>".array_shift($errors)."</div";
                            }
                            if(!empty($success))
                            {
                                echo "<div class='success'>".array_shift($success)."</div";
                            }
                        ?>
                        <h1>Создать мероприятие</h1>
                        <label for="title">
                            <p>Название</p>
                            <input type="text" name="title" id="title" placeholder="Название мероприятия">
                        </label>
                        <label for="info">
                            <p>Описание мероприятия</p>
                            <textarea name="info" id="info" cols="30" rows="10" placeholder="Описание мероприятия" value="<?=$_POST['info']?>"></textarea>
                        </label>
                        <label for="date">
                            <p>Дата проведения мероприятия</p>
                            <input type="date" name="date" id="date">
                        </label>
                        <input type="submit" value="Создать" name="done_add_event">
                    </form>
                </div>
            </main>
        </div>
    </body>
</html>