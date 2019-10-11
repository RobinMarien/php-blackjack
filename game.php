<?php

require 'classes/blackjack.php';

session_start();

if (isset($_SESSION["Player"])) {
    $Player = new Blackjack($_SESSION["Player"]);
} else{
    $_SESSION["Player"] = 0;
    $Player = new Blackjack($_SESSION["Player"]);
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
        $_SESSION["Player"] = $Player->getScore();

        if ($Player->getScore() > 21){
            $end = "You lost";
            session_destroy();
        }
        else if ($Player->getScore() == 21) {
            $end = "Blackjack! You won";
            session_destroy();
        }
    }

    if ($_REQUEST['btn_submit'] == "STAND") {
        $Player->stand($Dealer,$Player);
    }

    if ($_REQUEST['btn_submit'] == "SURRENDER") {
        $Player->surrender();
        echo "Why is this even an option?";
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

    <div class="container text-center my-5">
        <div class="col-md-12 my-3">
            <h1>BLACKJACK</h1>
        </div>
        <div class="row ">
            <div class="col-md-6 my-3">
                <h3>PLAYER</h3>
                <p class="my-3">
                    Your score:
                    <span>
                        <?php echo $Player->getScore()?>
                    </span>
                </p>
            </div>
            <div class="col-md-6 my-3">
                <h3>DEALER</h3>
                <p class="my-3">
                    Dealer score:
                    <span>
                        <?php echo $Dealer->getScore()?>
                    </span>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 my-5">
                <form action="game.php" method="POST">
                    <input type="submit" name="btn_submit" value="HIT">
                    <input type="submit" name="btn_submit" value="STAND"/>
                    <input type="submit" name="btn_submit" value="SURRENDER">
                </form>
            </div>
        </div>

    </div>

    </body>
    </html>
