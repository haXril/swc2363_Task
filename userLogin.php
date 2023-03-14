<!DOCTYPE html>
<html lang="en">
<head>
    <title>User Login Page</title>
</head>
<body>
    <form action="userLogin.php" method="POST">
        <div align="center" >
        <div align="center" >
        <h2 align="center" >USER LOGIN</h2>
            <table align="center">
                <tr width="100" height="50">
                    <td>User ID</td>
                    <td>:</td>
                    <td align="center">
                        <input 
                        type="text" 
                        name="userID" 
                        id="userID" 
                        size="4" 
                        maxlength="6" 
                        value="<?php if(isset($_POST['userID'])) echo $_POST['userID'];?>"
                        style="width: 250px; height: 30px; border-radius: 10px;"
                        >
                    </td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td>:</td>
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
                        style="width: 250px; height: 30px; border-radius: 10px;"
                        >
                    </td>
                </tr>
            </table>
            <br><br><br>
            <button type="submit">Login</button>
            <button type="reset" name="reset">Reset</button>
            <br>
            <br>
            <label>Don't have an account?
                <a href="userRegister.php">Sign Up</a>
            </label>
        </div>
        </div>
    </form>

    <?php
    include("task.php");
    
    if($_SERVER['REQUEST_METHOD']=='POST'){

        if(!empty($_POST['userID'])){
            $id = mysqli_real_escape_string($connect, $_POST['userID']);
        }else{
            $id = FALSE;
            echo '<p class = "error"> You forgot to enter your ID.</p>';
        }
        if(!empty($_POST['userPassword'])){
            $p = mysqli_real_escape_string($connect, $_POST['userPassword']);
        }else{
            $p = FALSE;
            echo '<p class = "error"> You forgot to enter your password.</p>';
        }
        if($id && $p){
            $q = "SELECT * FROM user WHERE (userID = '$id' AND userPassword = '$p')";

            $result = mysqli_query($connect, $q);

            if(@mysqli_num_rows($result)==1){

                session_start();
                $_SESSION = mysqli_fetch_array($result, MYSQLI_ASSOC);
                echo '<script>alert("Welcome to eLeave System!!!");</script>';

                exit();

                mysqli_free_result($result);
                mysqli_close($connect);
            }
            else{
                echo'<script>
                alert ("The adminID and adminPassword entered do not match our records perhaps you need to register, just click the Register button");
                </script>';
            }
        }
        else{
            echo '<p class="error"> Please try again. </p>';
        }
        mysqli_close($connect);
    }
    ?>

</body>
</html>