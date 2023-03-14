<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eLeave Management System</title>
</head>
<body>
    <h2>Search Result</h2>
    <?php
    include ("task.php");

    $in = $_POST['userName'];
    $in=mysqli_real_escape_string($connect, $in);

    $q = "SELECT userID, userPassword, userName, userPhoneNo, userEmail, userAddress, userPosition, userTotalLeave FROM user WHERE userName='$in' ORDER BY userID";

    $result = @mysqli_query($connect, $q);

    if($result){
        echo '<table border ="2">
        <tr>
        <td align="center"><strong>ID</strong></td>
        <td align="center"><strong>NAME</strong></td>
        <td align="center"><strong>PHONE NO.</strong></td>
        <td align="center"><strong>EMAIL</strong></td>
        <td align="center"><strong>ADDRESS</strong></td>
        <td align="center"><strong>POSTION</strong></td>
        <td align="center"><strong>TOTAL LEAVE</strong></td>
        </tr>';

        while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
            echo '<tr>
            <td>'.$row['userID'].'</td>
            <td>'.$row['userName'].'</td>
            <td>'.$row['userPhoneNo'].'</td>
            <td>'.$row['userEmail'].'</td>
            <td>'.$row['userAddress'].'</td>
            <td>'.$row['userPosition'].'</td>
            <td>'.$row['userTotalLeave'].'</td>
            </tr>';
        }
        echo '</table>';

        mysqli_free_result($result);
    }
    else{
        echo '<p class="error">If no record is shown, this is because you had an incorrect or missing entry in search form.<br>
        Click the back button on the browser and try again.</p>';

        echo '<p>'.mysqli_error($connect).'<br><br/>Query:'.$q.'</p>';
    }

    mysqli_close($connect);
    ?>
</body>
</html>