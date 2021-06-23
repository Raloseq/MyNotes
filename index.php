<?php

declare(strict_types=1);

namespace App;

require_once("src/Utils/debug.php");

?>

<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <header>
        <h1>My notes !</h1>
    </header>
    <main>
        <nav>
            <ul>
                <li>
                    <a href="/">List of notes</a>
                </li>
                <li>
                    <a href="/?action=create">New note</a>
                </li>
            </ul>
        </nav>
        <section>

        </section>
    </main>
    <footer>

    </footer>
</body>
</html>