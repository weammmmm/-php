<?php
session_start();
include 'connection.php';


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <title>ACP | Manage User</title>
    <style>
        * {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            outline: none;
            border: none;
            text-decoration: none;
        }

        .container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            padding-bottom: 60px;
            width: 90%;
            margin-left: 100px;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        .card {

            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        .card h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .table-container {
            max-height: 500px;
            overflow-y: auto;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
        }

        .table th,
        .table td {
            padding: 10px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        .table th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .table td:last-child {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .table td form {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .table td form button {
            margin-left: 10px;
            padding: 8px 16px;
            background-color: #dc3545;
            border: none;
            color: #fff;
            border-radius: 5px;
            cursor: pointer;
        }

        .table td form a {
            color: #fff;
            text-decoration: none;
        }

        .footer {
            margin-top: 20px;
            text-align: center;
        }

        .headerAdmin {
            background-color: #eeadbc;
            padding: 10px;
            text-align: center;
        }

        .headerAdmin h1 {
            color: #2f3031;
            font-size: 30px;
            margin-top: 10px;

        }

        .headerAdmin nav ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            text-align: center;
        }

        .headerAdmin nav ul li {
            display: inline-block;
            margin-right: 20px;
        }

        .headerAdmin nav ul li a {
            text-decoration: none;
            margin-left: 10px;
            padding: 5px 10px;
            border: 1px solid #2f3031;
            border-radius: 4px;
            color: #2f3031;
        }

        .headerAdmin nav ul li a:hover {
            background-color: #2f3031;
            color: #fff;
        }


        .headerAdmin {
            background-color: #eeadbc;
            padding: 10px;
            text-align: center;
        }

        .headerAdmin h1 {
            color: #2f3031;
            margin-top: 10px;
        }

        .headerAdmin nav ul {
            list-style-type: none;
            padding: 0;
            text-align: center;
        }

        .headerAdmin nav ul li {
            display: inline-block;
            margin-right: 20px;
        }

        .headerAdmin nav ul li a {
            text-decoration: none;
            margin-left: 10px;
            padding: 5px 10px;
            border: 1px solid #2f3031;
            border-radius: 4px;
            color: #2f3031;
            transition: background-color 0.3s ease;
        }

        .headerAdmin nav ul li a:hover {
            background-color: #2f3031;
            color: #fff;
        }
    </style>





</head>

<body class="bg-body-secondary">
    <?php include 'headerAdmin.php'; ?>

    <?php if (isset($_SESSION['massage'])): ?>
        <div class="alert alert-<?= $_SESSION['msg_type'] ?>">
            <?php
            echo $_SESSION['massage'];
            unset($_SESSION['massage']);
            ?>
        </div>
    <?php endif; ?>

    <?php
    $mysqli = new mysqli("localhost", "root", "", "user_db") or die(mysqli_error($mysqli));
    $result = $mysqli->query("SELECT * FROM user_form") or die($mysqli->error);
    ?>

    <section>
        <div class="container">
            <div class="card">
                <h2>All Users</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>User Name</th>

                            <th>email</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td>
                                    <?php echo $row['id']; ?>
                                </td>
                                <td>
                                    <?php echo $row['name']; ?>
                                </td>

                                <td>
                                    <?php echo $row['email']; ?>
                                </td>
                                <td style="text-align: center;">
                                    <a style="width: 90px;" href="updatedata.php?id=<?php echo $row['id'] ?>"
                                        class="btn btn-sm btn-dark" name="edit">Edit</a>
                                    <a style="width: 90px;" href="delete.php?delete=<?php echo $row['id'] ?>"
                                        class="btn btn-sm btn-danger"
                                        onclick="return confirm('Do you want to delete? Y/N')">Delete</a>
                                </td>



                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <?php include 'footer.php'; ?>
</body>

</html>