<?php

$errors = [];
$email = '';
$password = '';
$user_type = '';

include 'connection.php';

if (isset($_POST['login'])) {
   $email = htmlspecialchars($_POST['email']);
   $password = htmlspecialchars($_POST['password']);
   $user_type = $_POST['user_type']; // قيمة الدور المختارة

   $hashPassword = md5($password);
      $query = "SELECT * FROM user_form WHERE email = '$email' AND password = '$hashPassword' AND user_type = '$user_type'";
   $result = mysqli_query($conn, $query);

   if (!$result) {
      die('Error Executing query! ' . mysqli_error($conn));
   }

   if (mysqli_num_rows($result) == 1) {
      $user = mysqli_fetch_assoc($result);
      if ($user['user_type'] == 'admin') {
         session_start();
         $_SESSION["id"] = $user['id'];
         $_SESSION["name"] = $user['name'];
         $_SESSION["email"] = $user['email'];
         $_SESSION["password"] = $user['password'];
         $_SESSION["user_type"] = $user['user_type'];
         header("Location:manageAllUsers.php");
         exit;
      }
       elseif ($user['user_type'] == 'user') {
         session_start();
         $_SESSION["id"] = $user['id'];
         $_SESSION["name"] = $user['name'];
         $_SESSION["email"] = $user['email'];
         $_SESSION["password"] = $user['password'];
         $_SESSION["user_type"] = $user['user_type'];

         header("Location: userdata.php");
         exit;
      }
   } else {
      $errors[] = 'Login failed. Please check your email, password, and role.'; 
   }
}

$conn->close();



?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="css/style.css" rel="stylesheet">
   <style>
      .text-center {
  text-align: center;
}

.mt-3 {
  margin-top: 3rem;
}

.form-btn {
  background-color: #333;
  color: #fff;
  padding: 10px 20px;
  border: none;
  cursor: pointer;
}

.form-btn:hover {
  background-color: #555;
}

label {
  display: inline-block;
  margin-left: 10px;
}

p {
  margin: 10px 0;
}

a {
  color: blue;
  text-decoration: none;
}

a:hover {
  text-decoration: underline;
}
</style>
   <title>ACP | Login</title>
   <script>
		window.onload = function() {
			var errorMessage = "<?php echo $errors[0]; ?>";
			if (errorMessage) {
				alert(errorMessage);
			}
		};
	</script>
</head>

<body>
   <?php include('header.php'); ?>
   <div class="form-container">


      <?php if (count($errors) > 0) { ?>
         <ul class="px-3 text-danger">
            <?php foreach ($errors as $error) { ?>
               <li>
                  <?php echo $error; ?>
               </li>
            <?php } ?>
         </ul>
      <?php } ?>
      <form action="" method="post" enctype="multipart/form-data" class="container-sm">
         <input type="text" name="email" id="email" class="form-control my-4 py-2" placeholder="Email"
            value="<?php echo $email; ?>" />
         <input type="password" name="password" id="password" class="form-control my-4 py-2" placeholder="Password"
            value="<?php echo $password; ?>" />
         <select class="form-select mb-3" name="user_type" aria-label="Default select example">
            <option selected value="user">User</option>
            <option value="admin">Admin</option>
         </select>

         <div class="text-center mt-3">
            <button class="form-btn" type="submit" name="login" id="login">Login</button>
            <input type="checkbox" id="remember" name="remember" <?php if (isset($_COOKIE["loginId"])) { ?> checked
               <?php } ?>>
            Remember me
            </label>
            <p> <a href="signup.php">signup now</a></p>
            <a href="changepassword.php">  هل نسيت كلمة المرور</a>

         </div>
   </div>
   </div>
   </form>
   </div>
   </div>
   </div>

   <?php include('footer.php'); ?>
</body>

</html>