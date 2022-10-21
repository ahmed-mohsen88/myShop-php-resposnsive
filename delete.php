<?php
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    define("DB_HOST",  "localhost");
    define("DB_NAME",  "myShop");
    define("DB_PASS",  "1234");
    define("DB_USER",  "ahmed");

    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    $sql = "DELETE FROM client WHERE `ID` = $id ";
    $queryexcute = mysqli_query($conn, $sql);

    header("location:/myShop/index.php");
    exit;
}
