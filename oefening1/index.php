<?php
function getAnswer()
{

    // array of possible answers
    $answers = [
        "It is certain",
        "It is decidedly so",
        "Without a doubt",
        "Yes definitely",
        "You may rely on it",
        "As I see it, yes",
        "Most likely",
        "Outlook good",
        "Yes",
        "Signs point to yes",
        "Reply hazy, try again",
        "Ask again later",
        "Better not tell you now",
        "Cannot predict now",
        "Concentrate and ask again",
        "Don't count on it",
        "My reply is no",
        "My sources say no",
        "Outlook not so good",
        "Very doubtful"
    ];

    // make random number between 0 and the number of possible answers - 1
    $randomNumber = rand(0, count($answers) - 1);

    // to not repeat the same answer, check if the random number is the same as the previous number, 
    // while that's the case, choose another random number
    if (isset($_GET['ask'])) {
        while ($randomNumber == $_GET['ask']) {
            $randomNumber = rand(0, count($answers)) == !isset($_GET['ask']);
        };
    };
    $result = ['number' => (int)$randomNumber, 'answer' => $answers[$randomNumber]];
    return $result;
};
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>8 ball</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-dark">

    <!-- show answer when available -->
    <?php if (isset($_GET['ask'])) { ?>

        <h1 class="bg-light"><?= getAnswer()['answer'] ?></h1>

    <?php } ?>

    <!-- put random number in url and change button name if already asked once -->
    <a class="btn btn-light" href="./index.php?ask=<?= getAnswer()['number'] ?>"><?= !isset($_GET['ask']) ? 'ASK 8-BALL' : 'ASK AGAIN' ?></a>

</body>

</html>

<style>
    body.bg-dark {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    h1.bg-light {
        position: absolute;
        top: 10%;
    }

    a.btn.btn-light {
        height: 100px;
        width: 100px;
        border-radius: 50%;
        text-align: center;
    }
</style>