<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <?php include 'navigation.php'; ?>
    <!-- Login Form -->
    <div class="container">
        <h1>Login</h1>
        <form action="login.php" class="form__container" method="post">
            <div class="">
                <label for="loginEmail">Email:</label>
                <input type="email" name="loginEmail" required>
            </div>
            <div class="">
                <label for="loginPassword">Password:</label>
                <input type="password" name="loginPassword" required>
            </div>
            <button type="submit" class="cta">Login</button>
        </form>
        <p class="font-3 mb-1">Don't have an account?<a class="link" href="register.php"> Register here</a></p>
    </div>


    <?php
    include("db.php");
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $loginEmail = $_POST["loginEmail"];
        $loginPassword = $_POST["loginPassword"];

        $sql = "SELECT * FROM users WHERE email='$loginEmail'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($loginPassword, $row["password"])) {
                echo "<p class='success'>Login successful!</p>";
                session_start();
                $_SESSION['user_id'] = $row["id"];
                $_SESSION['user_name'] = $row["name"];
                header('Location: home.php');
            } else {
                echo "<p class='danger'>Invalid password!</p>";
            }
        } else {
            echo "<p class='danger'>User not found!</p>";
        }
    }

    $conn->close();

    ?>
    <script src="./script.js"></script>
</body>

</html>