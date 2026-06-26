<?php

    include 'connect.php';

    if(isset($_POST['signup'])) {
        $username = $_POST['username'];
        $email    = $_POST['email'];
        $password = $_POST['password'];
        $password = md5($password);

        // Fixed: was "while" instead of "WHERE"
        $checkEmail = "SELECT * FROM users WHERE email='$email'";
        $result = $conn->query($checkEmail);

        if($result->num_rows > 0) {
            echo "Email address already exists. <a href='index.php'>Go back</a>";
        } else {
            $insertQuery = "INSERT INTO users(username, email, password)
                            VALUES ('$username', '$email', '$password')";

            // if($conn->query($insertQuery) == TRUE) {
            //     header("location: index.php");
            //     exit();
            // } else {
            //     echo "Error: " . $conn->error;
            // }
            if($conn->query($insertQuery) == TRUE) {
    echo "
    <html>
    <head>
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    </head>
    <body>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: 'Registration Successful!'
            }).then(() => {
                window.location.href='index.php';
            });
        </script>
    </body>
    </html>";
    exit();
} else {
    echo "Error: " . $conn->error;
}
        }
    }

    if(isset($_POST['signIn'])) {
        $email    = $_POST['email'];
        $password = $_POST['password'];
        $password = md5($password);

        $sql    = "SELECT * FROM users WHERE email='$email' AND password='$password'";
        $result = $conn->query($sql);

        if($result->num_rows > 0) {
            session_start();
            $row = $result->fetch_assoc();
            $_SESSION['email'] = $row['email'];
            header("Location: home.php");
            exit();
        } else {
            echo "Incorrect Email or Password. <a href='index.php'>Go back</a>";
        }
    }

?>
