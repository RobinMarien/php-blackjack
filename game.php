<?php

require 'classes/blackjack.php';

session_start();

if (isset($_SESSION["player"])) {
    $Player = new Blackjack($_SESSION["player"]);
} else{
    $_SESSION["player"] = 0;
    $Player = new Blackjack($_SESSION["player"]);
}

if (isset($_SESSION["Dealer"])) {
    $Dealer = new Blackjack($_SESSION["Dealer"]);
} else {
    $_SESSION["Dealer"] = 0;
    $Dealer = new Blackjack($_SESSION["Dealer"]);
}

if (isset($_REQUEST['btn_submit'])) {
    if ($_REQUEST['btn_submit'] == "HIT") {
        $Player->hit();
        $_SESSION["player"] = $Player->getScore();

        if ($Player->getScore() > 21){
            echo "You lost";
        }
    }
}

?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <meta name="description" content="Blackjack">
        <meta name="keywords" content="blackjack">
        <meta name="author" content="Robin Mariën">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
              integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
              crossorigin="anonymous">
        <title>Blackjack</title>
    </head>
    <body>
    <form action="game.php" method="POST">
        <input type="submit" name="btn_submit" value="HIT"/>
        <input type="submit" name="btn_submit" value="STAND"/>
        <input type="submit" name="btn_submit" value="SURRENDER"/>
    </form>
    </body>
    </html>

<?php
function whatIsHappening()
{
    echo '<h2>$_GET</h2>';
    var_dump($_GET);
    echo '<h2>$_POST</h2>';
    var_dump($_POST);
    echo '<h2>$_COOKIE</h2>';
    var_dump($_COOKIE);
    echo '<h2>$_SESSION</h2>';
    var_dump($_SESSION);
}

whatIsHappening();
?>