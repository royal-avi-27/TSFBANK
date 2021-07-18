<?php require "partials/config.php" ?>

<?php
$success = false;
$showError = false;
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['email']) && isset($_POST['balance'])) {
        $lname = $_POST['fname'];
        $fname = $_POST['lname'];
        $email = $_POST['email'];
        $balance = $_POST['balance'];
        $full_name = $lname . " " . $fname;

        $existSql = "SELECT * FROM `users101` WHERE email_id='$email'";
        $result = mysqli_query($conn, $existSql);
        $numRows = mysqli_num_rows($result);
        if ($numRows > 0) {
            $showError = "Email already used!";
        } else {
            //Sql query to be executed
            $sql = "INSERT INTO `users101` (`full_name`, `email_id`, `balance`, `timestamp`) VALUES ('$full_name', '$email', '$balance', current_timestamp());";
            $result = mysqli_query($conn, $sql);
            $success = "Your Account is created successfully";
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
                <strong>Welcome ' . $full_name . ' </strong>' . $success . '
                </div>';
            }
            
        ?>
            <header>Create Your Account</header>
            <div class="name-details">
                <div class="field input">
                    <label for="first-name">First Name</label>
                    <input type="text" name="fname" placeholder="First Name" required>
                </div>
                <div class="field input">
                    <label for="last-name">Last Name</label>
                    <input type="text" name="lname" placeholder="Last Name" required>
                </div>
            </div>
            <div class="field input">
                <label for="email">Email Address</label>
                <input type="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="field input">
                <label for="balance">Balance(in Rs.)</label>
                <input type="text" name="balance" placeholder="Enter your balance" required>
            </div>
            <div class="field">
                <button type="submit" class="btn btn-dark">Create</button>
            </div>
        </form>

    </section>
    <?php require "partials/_footer.php" ?>


</body>
<script src="js/responsive.js"></script>

</html>