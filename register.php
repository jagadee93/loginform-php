<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="styles.css">

</head>

<body>
    <?php include 'navigation.php'; ?>
    <div class="container">
        <h1>Register</h1>
        <?php
        include("db.php");


        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST["name"];
            $email = $_POST["email"];
            $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
            $address = $_POST["address"];
            $phone = $_POST["phone"];

            $sql = "SELECT * FROM users WHERE email='$email'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                if ($email == $row["email"]) {
                    echo "<p class='danger'>User Exists!</p>";
                }
            } else {
                $sql = "INSERT INTO users (name, email, password, address, phone) VALUES ('$name', '$email', '$password', '$address', '$phone')";
                if ($conn->query($sql) === TRUE) {
                    echo " <h1 class='success'>Registration successful!<h1>";
                    header('Location: login.php');
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }

            $conn->close();
        }
        ?>
        <form action="register.php" class="form__container" method="post">
            <div class="">
                <label for="name">Name:</label>
                <input type="text" name="name" required>
            </div>
            <div class="">

                <label for="email">Email:</label>
                <input type="email" name="email" required>
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" name="password" required>
            </div>
            <div>
                <label for="address">Address:</label>
                <input type="text" name="address" required>
            </div>

            <div>
                <label for="phone">Phone Number:</label>
                <input type="tel" name="phone" required>
            </div>

            <button type="submit" class="cta">Register</button>
        </form>

        <p class="font-3 mb-1"> Already have an account? <a class="link" href="login.php">Login here</a> </p>


    </div>


    <script src="./script.js"></script>
</body>

</html>