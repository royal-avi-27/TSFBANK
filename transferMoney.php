<?php require "partials/config.php" ?>

<?php
$success = false;
$showError = false;
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['transferedTo']) && isset($_POST['transferedFrom']) && isset($_POST['amount'])) {
        $transferedTo = $_POST['transferedTo'];
        $transferedFrom = $_POST['transferedFrom'];
        $amount = $_POST['amount'];

        $senderExistSql = "SELECT * FROM `users101` WHERE full_name LIKE '%{$transferedFrom}%'";
        $senderResult = mysqli_query($conn, $senderExistSql);
        $senderNumRows = mysqli_num_rows($senderResult);
        if ($senderNumRows > 0) {
        $receiverExistSql = "SELECT * FROM `users101` WHERE full_name LIKE '%{$transferedTo}%'";
        $receiverResult = mysqli_query($conn, $receiverExistSql);
        $receiverNumRows = mysqli_num_rows($receiverResult);
            if($receiverNumRows > 0){
                while ($senderRow = mysqli_fetch_assoc($senderResult)) {
                    $senderBalance =  $senderRow['balance'];
                    $senderName =  $senderRow['full_name'];
                    $senderBalance = $senderBalance - $amount;
                    $senderSql = "UPDATE `users101` SET `balance` = '$senderBalance' WHERE `full_name` LIKE '%{$transferedFrom}%'";
                    $res1 = mysqli_query($conn, $senderSql);
                    while($receiverRow = mysqli_fetch_assoc($receiverResult)){
                        $receiverBalance =  $receiverRow['balance'];
                        $receiverName =  $receiverRow['full_name'];
                        $receiverBalance = $receiverBalance + $amount;
                        $receiverSql = "UPDATE `users101` SET `balance` = '$receiverBalance' WHERE `full_name` LIKE '%{$transferedTo}%'";
                        $res2 = mysqli_query($conn, $receiverSql);
                        $success = "Transaction successfully";

                        $transactionSql = "INSERT INTO `transactionhistory` (`transferedto`, `transferedfrom`, `amount`, `timestamp`) VALUES ('$receiverName', '$senderName', '$amount', current_timestamp());";
                        $transactionResult = mysqli_query($conn, $transactionSql);                    }
                } 
            }
            else{
                $showError = "Name of the customer is wrong, Please check the customer name and try again...";
            } 
        } else {
            $showError = "Sorry user name doesn't exist, please check the user name and try again....";
        }
    } else {
        $showError = "Sorry! Something went wrong, please contact with website manager...";
    }
}
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



    <section class="screenHeight form">
        <form action="" autocomplete="off" method="POST">
            <?php
            if ($showError) {
                echo '<div class="alert-error">
                    <span class="closebtn" onclick="this.parentElement.style.display=' . "'none'" . ';">&times;</span> 
                    <strong>Warning! </strong>' . $showError . '
                    </div>';
            }
            
            if ($success) {
                echo '<div class="alert-success">
                    <span class="closebtn" onclick="this.parentElement.style.display=' . "'none'" . ';">&times;</span> 
                    <strong>Welcome </strong>' . $success . '
                    </div>';
                }
            ?>
            <header>Transfer Money</header>
            <div class="field input">
                <label for="transferedTo">Transfered to</label>
                <input type="text" name="transferedTo" placeholder="Enter customer name...." required>
            </div>
            <div class="field input">
                <label for="transferedFrom">Transfered From</label>
                <input type="text" name="transferedFrom" placeholder="Enter user name...." required>
            </div>
            <div class="field input">
                <label for="amount">Amount(in Rs.)</label>
                <input type="text" name="amount" placeholder="Enter amount" required>
            </div>
            <div class="field submit-btn">
                <button type="submit" value="Send" class="btn btn-dark">Send</button>
            </div>
        </form>

    </section>
    <?php require "partials/_footer.php" ?>


</body>
<script src="js/responsive.js"></script>

</html>