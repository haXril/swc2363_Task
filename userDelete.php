<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eLeave Management System</title>
</head>
<body>

    <h2>Delete Employee Record</h2>

    <?php
    include ("task.php");

    if((isset($_GET['id'])) && (is_numeric($_GET['id']))){
        $id = $_GET['id'];
    }
    else if((isset($_POST['id'])) && (is_numeric($_POST['id']))){
        $id = $_POST['id'];
    }
    else{
        echo '<p class="error" >This page has been accessed in error.</p>';
        exit();
    }

    if($_SERVER['REQUEST_METHOD']== 'POST'){
        if($_POST['sure']=='Yes'){
            $q = "DELETE FROM user WHERE userID = $id LIMIT 1";
            $result = @mysqli_query ($connect, $q);

            if(mysqli_affected_rows($connect)== 1){
                echo '<script>alert("THe user has been deleted");
                window.location.href="userList.php";</script>';
            }
            else{
                echo '<p class="error">The record could not be deleted.<br>
                Probably because it does not exist or due to system error.</p>';

                echo '<p>'.mysqli_error($connect).'<br/> Query:'.$q.'</p>';
            }
        }
        else{
            echo '<script>alert("The employee has NOT been deleted");
            window.location.href="adminList.php";</script>';
        }
    }
    else{
        $q = "SELECT userName FROM user WHERE userID = $id";
        $result = @mysqli_query($connect, $q);

        if(mysqli_num_rows($result)==1){
            $row = mysqli_fetch_array($result, MYSQLI_NUM);
            echo "<h3>Are you sure want to permanently delete $row[0]? </h3>";
            echo '<form action="userDelete.php" method="post">
            <input id="submit-no" type="submit" name="sure" value="Yes">
            <input id="submit-no" type="submit" name="sure" value="No">
            <input type="hidden" name="id" value="'.$id.'">
            </form>';
        }
        else{
            echo '<p class="error" >This page has been accessed in error.</p>';
            echo '<p>&nbsp;</p>';
        }
    }
    mysqli_close($connect);
    ?>
</body>
</html>