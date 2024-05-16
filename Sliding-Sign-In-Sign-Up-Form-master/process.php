<?php
if(isset($_POST['Username']) && isset($_POST['Email']) && isset($_POST['Password'])) {
    $Username = $_POST['Username'];
    $Email = $_POST['Email'];
    $Password = $_POST['Password'];

    // Database connection
    $conn = new mysqli('localhost','root','','login');
    if($conn->connect_errno){
        die('Connection Failed : '.$conn->connect_error);
    } else {
        $stmt = $conn->prepare("INSERT INTO sign up (Username, Email, Password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $Username, $Email, $Password);
        $stmt->execute();
        echo "Sign Up Successfully...";
        $stmt->close();
        $conn->close();
    }
} else {
    echo "Please fill out all the fields.";
}
?>
