<?php
define("DB_HOST",  "localhost");
define("DB_NAME",  "myShop");
define("DB_PASS",  "1234");
define("DB_USER",  "ahmed");

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if (!$conn->connect_error) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $adress = $_POST["adress"];

        $sql = "INSERT INTO `client` ( `Name`, `Email`, `Phone`, `Adress`) VALUES ( '$name', '$email', '$phone', '${adress}')";
        $excuteQuery = mysqli_query($conn, $sql);
        header('location:/myShop/index.php');
        exit;
    } else {
        die(mysqli_error($conn));
    }
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

</head>

<body>
    <div class="container  my-5">
        <h2>New Client</h2>
        <form method="POST">
            <div class="row mb-3">
                <label class="col-sm-3  col-form-label" for="">Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3  col-form-label" for="">Email</label>
                <div class="col-sm-6">
                    <input type="email" class="form-control" name="email">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3  col-form-label" for="">Phone</label>
                <div class="col-sm-6">
                    <input type="tel" class="form-control" name="phone">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3  col-form-label" for="">Adress</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="adress">
                </div>
            </div>
            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3  d-grid">
                    <button class="btn btn-primary" type="submit" name="submit">Submit </button>
                </div>
                <div class="col-sm-3  d-grid">
                    <a class="btn btn-danger" href='./index.php' role="button">Cancel</a>
                </div>
            </div>
        </form>

    </div>
</body>

</html>