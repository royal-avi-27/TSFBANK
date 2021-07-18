<?php require "partials/config.php" ?>

<?php
    $sql = "SELECT * FROM `users101`";
    $res = mysqli_query($conn, $sql);
?>

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
    <?php require "partials/_nav.php" ?>
    <section class="screenHeight">
        <header>Transaction History</header>
        <div class="heading">
            <span class="headingResult">Customer Name</span>
            <span class="headingResult">Customer email</span>
            <span class="headingResult">Balance</span>
        </div>
        <div class="viewResult">
            <?php
            while ($row = mysqli_fetch_assoc($res)) {
                $name = $row['full_name'];
                $email = $row['email_id'];
                $balance = $row['balance'];
                echo '
                <div class="data">
                <span class="dataResult">' . $name . '</span>
                <span class="dataResult">' . $email . '</span>
                <span class="dataResult">' . $balance . '</span>
                </div>';
            }
            ?>
        </div>
    </section>
    <?php require "partials/_footer.php" ?>

</body>
<script src="js/responsive.js"></script>

</html>
</body>

</html>