<?php require "partials/config.php" ?>

<?php
    $sql = "SELECT * FROM `transactionhistory`";
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
            <span class="headingResult">Transfered to</span>
            <span class="headingResult">Transfered from</span>
            <span class="headingResult">Amount</span>
            <span class="headingResult">Time</span>
        </div>
        <div class="viewResult">
            <?php
            while ($row = mysqli_fetch_assoc($res)) {
                $transferedTo = $row['transferedto'];
                $transferedFrom = $row['transferedfrom'];
                $amount = $row['amount'];
                $time = $row['timestamp'];
                echo '
                <div class="data">
                <span class="dataResult">' . $transferedTo . '</span>
                <span class="dataResult">' . $transferedFrom . '</span>
                <span class="dataResult">' . $amount . '</span>
                <span class="dataResult">' . $time . '</span>
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