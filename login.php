<?php
// Database connection parameters
$host = 'localhost';
$user = 'root';
$pass = '';
$db   = 'tic_tac_toe';

// Create a connection
$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve user input
$username = $_POST['username'];
$password = $_POST['password'];

// Sanitize user input to prevent SQL injection
//$username = $conn->real_escape_string($username);
//$password = $conn->real_escape_string($password);

// Hash the password (You should use a stronger hashing mechanism in a real-world scenario)
//$hashedPassword = md5($password);

// Query to check if the user existss
$query="select username,password from user";
        $result=mysqli_query($conn,$query);
        if ($row = mysqli_fetch_assoc($result))

// Check if the query was successful
if($row['username']==$username && $row['password']==$password ){
    // Redirect to index.html
    header("Location: index.html");
    exit(); // Ensure that no other code is executed after the redirect
} else {
    echo "Invalid username or password.";
}

// Close the database connection
$conn->close();
?>
