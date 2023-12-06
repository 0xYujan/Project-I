<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
</head>
<body>
    <?php
    session_start();
    if (isset($_SESSION['email'])) {
        include("../Final/Assets/user_nav.php");
    } else {
        header("Location: 404-page.php");
    exit();
}
        ?>

</body>
</html>