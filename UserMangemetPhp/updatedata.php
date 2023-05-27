<?php
include "connection.php";
$id = "";
$name = "";
$email = "";
$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == 'GET') {
    if (!isset($_GET['id'])) {
        header("location: manageAllUsers.php");
        exit;
    }
    $id = $_GET['id'];
    $sql = "SELECT * FROM user_form WHERE id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    if (!$row) {
        header("location: manageAllUsers.php");
        exit;              
    }
    $name = $row["name"];
    $email = $row["email"];

} elseif ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $email = $_POST["email"];
 


    $sql = "UPDATE user_form SET name='$name', email='$email' WHERE id='$id'";
    $result = $conn->query($sql);

    if ($result) {
        $success = "تم تحديث البيانات بنجاح.";
    } else {
        $error = "حدث خطأ أثناء تحديث البيانات: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Record</title>
</head>

  <style>
      body {
         font-family: Arial, sans-serif;
         background-color: #f4f4f4;
         padding: 20px;
         margin: 0;
      }

      h2 {
         text-align: center;
         color: #333;
      }

      form {
         max-width: 300px;
         margin: 20px auto;
         padding: 20px;
         background-color: #fff;
         border-radius: 5px;
         box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
      }

      label {
         display: block;
         margin-bottom: 10px;
      }

      input[type="text"],
      input[type="email"] {
         width: 100%;
         padding: 10px;
         border: 1px solid #ccc;
         border-radius: 4px;
         box-sizing: border-box;
         margin-bottom: 10px;
      }

      input[type="submit"] {
         background-color: #4caf50;
         color: #fff;
         padding: 10px 20px;
         border: none;
         border-radius: 4px;
         cursor: pointer;
      }

      input[type="submit"]:hover {
         background-color: #45a049;
      }

  

      /* Footer styles */
      footer {
         background-color: #333;
         color: #fff;
       
         text-align: center;
         position: fixed;
         bottom: 0;
         width: 100%;
      }
   </style>
<body>
    <h2>Edit Record</h2>
    <?php if ($success): ?>
        <p><?php echo $success; ?></p>
    <?php elseif ($error): ?>
        <p><?php echo $error; ?></p>
    <?php else: ?>
        <form class="post-form" action="<?php echo $_SERVER['PHP_SELF'] . '?id=' . $id; ?>" method="post">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" value="<?php echo $name; ?>" />
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="<?php echo $email; ?>" />
            </div>
        
            <input type="hidden" name="id" value="<?php echo $id; ?>" />
            <input class="submit" type="submit" value="update" />
        </form>
    <?php endif; ?>
</body>
</html>


