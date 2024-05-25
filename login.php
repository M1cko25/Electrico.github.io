<?php 
session_start();
$meterNum = $_POST['meterNum'];
$pass = $_POST['pass'];

$host = "localhost";
$database = "electrico";
$user = "root";
$password = "";

$con = new mysqli($host, $user, $password, $database);
if ($con->connect_error) {
    die("Failed to connect: " . $con->connect_error);
} else {
    $stmt = $con->prepare("SELECT * FROM users WHERE meterNumber = ?");
    $stmt->bind_param("i", $meterNum);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        if (password_verify($pass, $data['Password'])) {
            header("Location: dashboard.html");
            exit();
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "User not found.";
    }
    $stmt->close();
}
$con->close();
?>
