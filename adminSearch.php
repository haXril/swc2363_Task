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
    <form action="adminFound.php" method="post">
        <h1>Search admin record</h1>
        <p>
            <label class="label" for="adminName">Admin Name:</label>
            <input type="text" name="adminName" id="adminName" size="30" maxlength="50" value="<?php if(isset($_POST['adminName'])) echo $_POST['adminName']; ?>"/>
        </p>
        <input type="submit" name="submit" id="submit" value="search"></p>
    </form>
</body>
</html>