<!doctype html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
        <link href="/public/style.css" rel="stylesheet">
        <title>Document</title>
    </head>
<body>
    <div class="wrapper">
        <header class="header">
            <h1><i class="far fa-clipboard"></i>My notes !</h1>
        </header>
        <main class="container">
            <nav class="menu">
                <ul>
                    <li>
                        <a href="/">List of notes</a>
                    </li>
                    <li>
                        <a href="/?action=create">New note</a>
                    </li>
                </ul>
            </nav>
            <section class="page">
                <?php
                    require_once("templates/pages/$page.php");
                ?>
            </section>
        </main>
        <footer class="footer">
            <p>Notatki - projekt w kursie PHP</p>
        </footer>
    </div>
</body>
</html>

