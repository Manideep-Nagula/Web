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
    $message = 'Account does not exist';
    $ok = false;
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM studentdetails WHERE Email='$email' ";
    $result = mysqli_query($conn,$sql);
    $count = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
    if($count==1)
    {
        if(password_verify($password,$row['Pasword']))
        {
            $ok = true;
            $message="Login SuccessFull";
        }
        else
        {
            $message = "Incorrect Password";
        }
        
    }
    echo json_encode(
        array(
            'ok' => $ok,
            'message' => $message
        )
    );
    $conn->close();
?>
