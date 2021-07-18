<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spark Bank Website</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
</head>

<body>
    <?php require "partials/config.php" ?>
    <?php require "partials/_nav.php" ?>
    <section class="background screenHeight" id="home">
        <div class="box-main">
            <div class="firstHalf">
                <p class="text-big">The Spark Banking Website.</p>
                <p class="text-small">One of the best money transfer website, It makes transaction easy, safe and
                    secure..</p>
                <div class="buttons">
                    <a href="createAccount.php" class="btn">Create Account</a>
                    <a href="transferMoney.php" class="btn">Transfer Money</a>
                </div>
            </div>
            <div class="secondHalf">
                <img src="img/logo.jpg" alt="Laptop image">
            </div>
        </div>
        <div class="droplets">
            <img src="img/money.jfif" alt="droplets not found">
            <img src="img/money.jfif" alt="droplets not found">
            <img src="img/money.jfif" alt="droplets not found">
            <img src="img/money.jfif" alt="droplets not found">
            <img src="img/money.jfif" alt="droplets not found">
            <img src="img/money.jfif" alt="droplets not found">
            <img src="img/money.jfif" alt="droplets not found">
            <img src="img/money.jfif" alt="droplets not found">
            <img src="img/money.jfif" alt="droplets not found">
            <img src="img/money.jfif" alt="droplets not found">
        </div>

    </section>

    <?php require "partials/_footer.php" ?>
</body>
<script src="js/responsive.js"></script>



</html>