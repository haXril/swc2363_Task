<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login Page</title>
</head>
<body>
    <form action="adminRegister.php" method="POST">
        <div align="center">
            <div align="center">
                <h2 align="center">
                ADMIN REGISTER
                </h2>
                <table align="center">
                    <tr width="100" height="50">
                        <td>
                            First Name
                        </td>
                        <td>
                            :
                        </td>
                        <td align="center">
                            <input 
                            type="text" 
                            name="firstName" 
                            id="firtName" 
                            size="15" 
                            maxlength="20" 
                            value="<?php if(isset($_POST['firstName'])) echo $_POST['firstName'];?>"
                            style="width: 250px; height: 30px; border-radius: 10px;">
                        </td>
                    </tr>
                    <tr width="100" height="50">
                        <td>
                            Last Name
                        </td>
                        <td>
                            :
                        </td>
                        <td align="center">
                            <input 
                            type="text" 
                            name="lastName" 
                            id="lastName" 
                            size="15" 
                            maxlength="20" 
                            value="<?php if(isset($_POST['lastName'])) echo $_POST['lastName'];?>"
                            style="width: 250px; height: 30px; border-radius: 10px;">
                        </td>
                    </tr>
                    <tr width="100" height="50">
                        <td>
                            Phone No.
                        </td>
                        <td>
                            :
                        </td>
                        <td align="center">
                            <input 
                            type="tel" 
                            name="adminPhoneNo" 
                            id="adminPhoneNo" 
                            size="15" 
                            maxlength="20" 
                            pattern="[0-9]{3}-[0-9]{7}" required
                            value="<?php if(isset($_POST['adminPhoneNo'])) echo $_POST['adminPhoneNo'];?>"
                            style="width: 250px; height: 30px; border-radius: 10px;">
                        </td>
                    </tr>
                    <tr width="100" height="50">
                        <td>
                            Email Address
                        </td>
                        <td>
                            :
                        </td>
                        <td align="center">
                            <input 
                            type="text" 
                            name="adminEmail" 
                            id="adminEmail" 
                            size="30" 
                            maxlength="50"
                            pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required
                            value="<?php if(isset($_POST['adminEmail'])) echo $_POST['adminEmail'];?>"
                            style="width: 250px; height: 30px; border-radius: 10px;">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Password
                        </td>
                        <td>
                            :
                        </td>
                        <td align="center">
                            <input 
                            type="password" 
                            name="adminPassword" 
                            id="adminPassword" 
                            size="15" 
                            maxlength="60" 
                            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
                            title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required 
                            value="<?php if(isset($_POST['adminPassword'])) echo $_POST['adminPassword'];?>"
                            style="width: 250px; height: 30px; border-radius: 10px;">
                        </td>
                    </tr>
                </table>
                <br>
                <br>
                <br>
                <button type="submit">Register</button>
                <button type="reset">Clear All</button>
            </div>
        </div>
    </form>

    <?php
    include("task.php");
    
    if($_SERVER['REQUEST_METHOD']== 'POST'){

        $error = array();

        if(empty ($_POST['adminPassword'])){
            $error [] = 'You forgot to the password';
        }else{
            $p = mysqli_real_escape_string($connect, trim ($_POST['adminPassword']));
        }

        if(empty ($_POST['firstName'] && $_POST['lastName'])){
            $error [] = 'You forgot to enter your name.';
        }else{
            $n = mysqli_real_escape_string($connect, trim ($_POST['firstName'] ." " .$_POST['lastName']));
        }

        if(empty ($_POST['adminPhoneNo'])){
            $error [] = 'You forgot to enter your Phone number.';
        }else{
            $ph = mysqli_real_escape_string($connect, trim ($_POST['adminPhoneNo']));
        }

        if(empty ($_POST['adminEmail'])){
            $error [] = 'You forgot to enter your email.';
        }else{
            $e = mysqli_real_escape_string($connect, trim ($_POST['adminEmail']));
        }

        $q = "INSERT INTO admin (adminID, adminPassword, adminName, adminPhoneNo, adminEmail) VALUES ('', '$p', '$n', '$ph', '$e')";

        $result = @mysqli_query ($connect, $q);

        if($result){
            echo '<script>alert ("Thank you for Register with our System!!! :)");</script>';
            header('location: http://localhost/eleave/adminHome.php');
            exit();
        }else{
            echo '<script>alert ("SYSTEM ERROR !!!");</script>';
            echo '<p>' .mysqli_error($connect). '<br><br>Query: '.$q. '</p>';
        }

        mysqli_close($connect);
        exit();
    }
    
    ?>

</body>
</html>