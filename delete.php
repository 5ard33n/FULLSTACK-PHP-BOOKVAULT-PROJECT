<?php
if (isset($_GET['id'])) {

    include("connect.php");

    $id = $_GET['id'];

    // 1️⃣ Delete the record
    mysqli_query($conn, "DELETE FROM books WHERE id = $id");

    // 2️⃣ Re-arrange IDs
    mysqli_query($conn, "SET @count = 0");
    mysqli_query($conn, "UPDATE books SET id = @count := @count + 1 ORDER BY id");

    // 3️⃣ Reset AUTO_INCREMENT
    mysqli_query($conn, "ALTER TABLE books AUTO_INCREMENT = 1");

    // 4️⃣ Redirect
    session_start();
    $_SESSION["delete"] = "Book Deleted Successfully";
    header("Location:home.php");
}
?>
