<?php
session_start();
include 'header.php';
include 'connection.php';

class HomePage {
    private $id;
    private $name;
    private $email;
    private $userType;

    public function __construct() {
        if (isset($_SESSION['id']) && isset($_SESSION['email'])) {
            $this->id = $_SESSION['id'];
            $this->name = $_SESSION['name'];
            $this->email = $_SESSION['email'];
            $this->userType = $_SESSION['user_type'];
        } else {
            header("Location: login.php");
            exit();
        }
    }

    public function displayPage() {
?>
<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<style>
    .user-data {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        margin-bottom: 20px;
    }
    
    .user-data table {
        margin-bottom: 20px;
    }
    
    .user-data th, .user-data td {
        padding: 8px;
    }
    
    .user-data .btn-container {
        display: flex;
        justify-content: center;
    }
    
    .user-data .btnuserdata {
        background-color: blue;
        border: none;
        color: white;
        padding: 10px 20px;
        border-radius: 5px;
        text-decoration: none;
        margin: 0 5px;
    }
    
    .user-data .btnuserdata:hover {
        background-color: darkred;
    }
    .footer{
        margin-top: 320px;
    }
</style>
<body>
<div class="user-data">
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>User Type</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $this->id; ?></td>
                <td><?php echo $this->name; ?></td>
                <td><?php echo $this->email; ?></td>
                <td><?php echo $this->userType; ?></td>
            </tr>
        </tbody>
    </table>

    <div class="btn-container">
        <a class="btnuserdata" href="changepassword.php">Change Password</a>
        <a class="btnuserdata" href="updateUser.php">update</a>
        <a class="btnuserdata" href="logout.php">Logout</a>
    </div>
</div>

<?php
    }
}

$homePage = new HomePage();
$homePage->displayPage();


