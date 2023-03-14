<!DOCTYPE html>
<html lang="en">
<head>
    <title>User Register Page</title>
</head>
<body>
    <form action="userRegister.php" method="POST">
        <div align="center">
            <div align="center">
                <h2 align="center">
                USER REGISTER
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
                            name="userPhoneNo" 
                            id="userPhoneNo" 
                            size="15" 
                            maxlength="20" 
                            pattern="[0-9]{3}-[0-9]{7}" required
                            value="<?php if(isset($_POST['userPhoneNo'])) echo $_POST['userPhoneNo'];?>"
                            style="width: 250px; height: 30px; border-radius: 10px;">
                        </td>
                    </tr>
                    <tr width="100" height="50">
                        <td>
                            Address
                        </td>
                        <td>
                            :
                        </td>
                        <td align="center">
                            <textarea 
                            name="userAddress" 
                            id="userAddress" 
                            size="100" 
                            maxlength="100" 
                            rows="5" 
                            cols="31" 
                            style="border-radius: 10px;"
                            required value="<?php if(isset($_POST['userAddress'])) echo $_POST['userAddress'];?>">
                            </textarea>
                        </td>
                    </tr>
                    <tr width="100" height="50">
                        <td>
                            Position
                        </td>
                        <td style="width: 10px; text-align: center; color: white;">
                            :
                        </td>
                        <td align="left">
                            <select name="userPosition" id="userPosition" style=" border-radius: 5px; height: 30px; width: 100px;">
                                <option value="permanent">Permanent</option>
                                <option value="contract">Contract</option>
                                <option value="temporary">Temporary</option>
                            </select>
                        </td>
                    </tr>
                    <tr width="100" height="50">
                        <td>
                            Email
                        </td>
                        <td>
                            :
                        </td>
                        <td align="center">
                            <input 
                            type="text" 
                            name="userEmail" 
                            id="userEmail" 
                            size="30" 
                            maxlength="50"
                            pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required
                            value="<?php if(isset($_POST['userEmail'])) echo $_POST['userEmail'];?>"
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
                            name="userPassword" 
                            id="userPassword" 
                            size="15" 
                            maxlength="60" 
                            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
                            title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required 
                            value="<?php if(isset($_POST['userPassword'])) echo $_POST['userPassword'];?>"
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

        if(empty ($_POST['userPassword'])){
            $error [] = 'You forgot to the password';
        }else{
            $p = mysqli_real_escape_string($connect, trim ($_POST['userPassword']));
        }

        if(empty ($_POST['firstName'] && $_POST['lastName'])){
            $error [] = 'You forgot to enter your name.';
        }else{
            $n = mysqli_real_escape_string($connect, trim ($_POST['firstName'] ." " .$_POST['lastName']));
        }

        if(empty ($_POST['userPhoneNo'])){
            $error [] = 'You forgot to enter your Phone number.';
        }else{
            $ph = mysqli_real_escape_string($connect, trim ($_POST['userPhoneNo']));
        }

        if(empty ($_POST['userEmail'])){
            $error [] = 'You forgot to enter your email.';
        }else{
            $e = mysqli_real_escape_string($connect, trim ($_POST['userEmail']));
        }

        if(empty ($_POST['userAddress'])){
            $error [] = 'You forgot to enter your address.';
        }else{
            $ad = mysqli_real_escape_string($connect, trim ($_POST['userAddress']));
        }

        if(empty ($_POST['userPosition'])){
            $error [] = 'You forgot to select your position.';
        }else{
            $pos = mysqli_real_escape_string($connect, trim ($_POST['userPosition']));
        }

        $q = "INSERT INTO user (userID, userPassword, userName, userPhoneNo, userEmail, userAddress, userPosition, userTotalLeave, leaveID) 
        VALUES ('', '$p', '$n', '$ph', '$e', '$ad', '$pos', '', '')";

        $result = @mysqli_query ($connect, $q);

        if($result){
            echo '<script>alert ("Thank you for Register with our System!!! :)");</script>';
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


