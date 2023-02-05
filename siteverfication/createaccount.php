<?php
    // making connection with database
    $servername = "localhost";
    $username = "root";
    $password = "password" ;
    $conn = new mysqli($servername, $username, $password,'studentdb');
    if(!$conn)
    {
        echo 'connection error' .$conn->error;
    }
    $message = 'User already Exists';
    $ok = false;
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
    $sql = "INSERT INTO studentdetails(StudentName,Email,Pasword)
    VALUES ('$name','$email','$password')";
    if(mysqli_query($conn,$sql))
    {
        $ok = true;
        $message ='Account Created Successfully';
    }
    echo json_encode(
        array(
            'ok' => $ok,
            'message' => $message
        )
    );
    $conn->close();
?>
