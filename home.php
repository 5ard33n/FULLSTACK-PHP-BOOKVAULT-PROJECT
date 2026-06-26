

 <?php
session_start();
include("connect.php");

// Check if user is logged in
if(!isset($_SESSION['email'])){
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Book List</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #667eea, #764ba2);
            font-family: 'Segoe UI', sans-serif;
            min-height: 100vh;
        }

        .main-card {
            background: #ffffff;
            border-radius: 15px;
            box-shadow: 0 15px 40px rgba(0,0,0,0.2);
            padding: 30px;
            margin-top: 50px;
        }

        h1 {
            font-weight: 700;
            color: #333;
        }

        .btn-primary {
            background: #667eea;
            border: none;
        }

        .btn-primary:hover {
            background: #5a67d8;
        }

        .table {
            margin-top: 20px;
        }

        .table thead {
            background: #667eea;
            color: white;
        }

        .table tbody tr {
            transition: 0.3s;
        }

        .table tbody tr:hover {
            background: #f2f2f2;
            transform: scale(1.01);
        }

        .action-btn {
            margin-right: 5px;
        }

        .btn-info {
            background: #17a2b8;
            border: none;
        }

        .btn-danger {
            background: #dc3545;
            border: none;
        }

        .alert {
            border-radius: 10px;
        }

        @media(max-width: 768px) {
            .main-card {
                padding: 15px;
            }

            h1 {
                font-size: 22px;
            }

            .btn {
                font-size: 12px;
                padding: 5px 10px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="main-card">
             <h1>Welcome to Home Page</h1>

    <p>Hello, <?php echo $_SESSION['email']; ?></p>

    <a href="logout.php">
        <button>Logout</button>
    </a>

            <header class="d-flex justify-content-between align-items-center mb-4">
                <h1>📚 Book List</h1>
                <a href="create.php" class="btn btn-primary">+ Add New Book</a>
            </header>

            <?php
            // session_start();
            if (isset($_SESSION["create"])) {
                echo '<div class="alert alert-success">'.$_SESSION["create"].'</div>';
                unset($_SESSION["create"]);
            }
            if (isset($_SESSION["edit"])) {
                echo '<div class="alert alert-success">'.$_SESSION["edit"].'</div>';
                unset($_SESSION["edit"]);
            }
            if (isset($_SESSION["delete"])) {
                echo '<div class="alert alert-success">'.$_SESSION["delete"].'</div>';
                unset($_SESSION["delete"]);
            }

            include("connect.php");
            $sql = "SELECT * FROM books";
            $result = mysqli_query($conn,$sql);
            ?>

            <div class="table-responsive">
                <table class="table table-hover table-bordered text-center align-middle">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Type</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                      <?php 
                        $serial = 1;
                        while ($row = mysqli_fetch_array($result)) { 
                        ?>

                            <tr>
                               

                                <td><?php echo $serial++; ?></td>

                                <td><?php echo $row["title"]; ?></td>
                                <td><?php echo $row["author"]; ?></td>
                                <td><?php echo $row["type"]; ?></td>
                                <td>
                                    <a href="view.php?id=<?php echo $row["id"]; ?>" class="btn btn-info btn-sm action-btn">View</a>
                                    <a href="edit.php?id=<?php echo $row["id"]; ?>" class="btn btn-warning btn-sm action-btn">Edit</a>
                                    <a href="delete.php?id=<?php echo $row["id"]; ?>" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                        <?php } ?>

                    </tbody>
                </table>
            </div>

        </div>
    </div>
</body>
</html>
