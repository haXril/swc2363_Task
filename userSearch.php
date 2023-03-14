<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eLeave Management System</title>
</head>
<body>
    <?php
    include ("task.php");
    ?>
    <form action="userFound.php" method="post">
        <h1>Search employee record</h1>
        <p>
            <label class="label" for="userName">Admin Name:</label>
            <input type="text" name="userName" id="userName" size="30" maxlength="50" value="<?php if(isset($_POST['userName'])) echo $_POST['userName']; ?>"/>
        </p>
        <input type="submit" name="submit" id="submit" value="search"></p>
    </form>
</body>
</html>