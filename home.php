<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <?php include 'navigation.php'; ?>
    <?php if (!isset($_SESSION['user_id'])) {
        echo "<p>Welcome to our website! Please register or log in.</p>";
    } else {
        include 'maincontent.php';
    }
    ?>

    <script src="./script.js"></script>

</body>

</html>