<?php
if(isset($_POST['Username']) && isset($_POST['Password'])) {
    $Username = $_POST['Username'];
    $Password = $_POST['Password'];

    // Database connection
    $conn = new mysqli('localhost','root','','signin');
    if($conn->connect_errno){
        die('Connection Failed : '.$conn->connect_error);
    } else {
        $stmt = $conn->prepare("INSERT INTO signdata (Username, Password) VALUES (?, ?)");
        $stmt->bind_param("ss", $Username, $Password);
        $stmt->execute();
        echo "Sign In Successfully...";
        $stmt->close();
        $conn->close();
    }
} else {
    echo "Please fill out all the fields.";
}
?>
