<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyShop</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container" my-5>
        <h2>List of client</h2>
        <a class="btn btn-primary" role="button" href="/myShop/create.php">New Client</a>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Adress</th>
                    <th>Created date</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <?php
                define("DB_HOST",  "localhost");
                define("DB_NAME",  "myShop");
                define("DB_PASS",  "1234");
                define("DB_USER",  "ahmed");

                $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

                if (!$conn->connect_error) {
                } else {
                    die(mysqli_error($conn));
                }

                $sql = "SELECT * FROM client";
                $excuteQuery = mysqli_query($conn, $sql);

                if (!$excuteQuery) {
                    die(mysqli_error($conn));
                } else {
                    $rows = mysqli_num_rows($excuteQuery);
                    if ($rows > 0) {
                        while ($row = mysqli_fetch_assoc($excuteQuery)) {
                            echo "<tr>
                <td>$row[ID]</td>
                <td>$row[Name]</td>
                <td>$row[Email]</td>
                <td>$row[Phone]</td>
                <td>$row[Adress]</td>
                <td>$row[CreatedDate]</td>
                <td>
                <a href='/myShop/edit.php?id=$row[ID]' class='btn btn-primary btn-sm'>Edit</a>
                <a href='/myShop/delete.php?id=$row[ID]'class='btn btn-danger btn-sm'>Delete</a>
                </td>
                </tr>";
                        }
                    }
                }
                ?>
                <!-- <tr>
                    <td>1</td>
                    <td>ahmed mohsen</td>
                    <td>ahmedmohsensobhimohamed@gmail.com</td>
                    <td>01112441524</td>
                    <td>c9 32 tabarak city</td>
                    <td>20/10/2022</td>
                    <td>
                        <a href="/myShop/edit.php" class="btn btn-primary btn-sm">Edit</a>
                        <a href="/myShop/delete.php" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr> -->

            </tbody>

        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>