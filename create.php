<?php

use Vtiful\Kernel\Format;

define("DB_HOST",  "localhost");
define("DB_NAME",  "myShop");
define("DB_PASS",  "1234");
define("DB_USER",  "ahmed");

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

$name = "";
$email = "";
$phone = "";
$adress = "";
$error_message = "";
$sucess_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $adress = $_POST["adress"];
    do {
        if (empty($name) || empty($email) || empty($phone) || empty($adress)) {
            $error_message = "All Fields are required";
            break;
        }
        $sql = "INSERT INTO `client` ( `Name`, `Email`, `Phone`, `Adress`) VALUES ( '$name', '$email', '$phone', '${adress}')";
        $excuteQuery = mysqli_query($conn, $sql);

        $name = "";
        $email = "";
        $phone = "";
        $adress = "";
        $error_message = "";
        $sucess_message = "client added sucessfully";

        // add client to database


        header('location:/myShop/index.php');
        exit;
    } while (false);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>create</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>


</head>

<body>
    <div class="container  my-5">
        <h2>New Client</h2>
        <?php
        if (!empty($error_message)) {
            echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
            <strong>${error_message}</strong> You should check in on some of those fields below.
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
          </div>";
        }
        ?>
        <form method="POST">
            <div class="row mb-3">
                <label class="col-sm-3  col-form-label" for="">Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3  col-form-label" for="">Email</label>
                <div class="col-sm-6">
                    <input type="email" class="form-control" name="email" value="<?php echo $email; ?>">
                </div>
            </div>
            <div class=" row mb-3">
                <label class="col-sm-3  col-form-label" for="">Phone</label>
                <div class="col-sm-6">
                    <input type="tel" class="form-control" name="phone" value="<?php echo $phone; ?>">
                </div>
            </div>
            <div class=" row mb-3">
                <label class="col-sm-3  col-form-label" for="">Adress</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="adress" value="<?php echo $adress; ?>">
                </div>
            </div>
            <div class=" row mb-3">
                <?php
                if (!empty($sucess_message)) {
                    echo "<div class='alert alert-success' role='alert'>
                    ${sucess_message}
                    </div>";
                }
                ?>
                <div class="offset-sm-3 col-sm-3  d-grid">
                    <button class="btn btn-primary" type="submit">Submit </button>
                </div>
                <div class="col-sm-3  d-grid">
                    <button class="btn btn-danger" onclick='window.location.href = "./index.php"' role="button" type="button">Cancel </button>
                </div>
            </div>
        </form>

    </div>

</body>

</html>