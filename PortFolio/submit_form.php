<?php
$host = 'localhost';        
$dbname = 'contact_portfolio';  
$username = 'root';        
$password = '';             

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $message = $conn->real_escape_string($_POST['message']);

    $sql = "INSERT INTO contact_messages (name, email, message) VALUES ('$name', '$email', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('Message sent successfully!');
                window.location.href = 'index.html';
              </script>";
    } else {
        echo "<script>
                alert('Error: Unable to send the message. Please try again later.');
                window.location.href = 'index.html';
              </script>";
    }
}

$conn->close();
?>
