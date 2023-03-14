<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login Page</title>
</head>
<body>
    <form action="adminLogin.php" method="POST">
        <div class="layer2" align="center">
        <div class="loginPart" align="center">
        <h2 align="center">ADMIN LOGIN</h2>
            <table align="center">
                <tr width="100" height="50">
                    <td class="col1">Admin ID</td>
                    <td class="col2">:</td>
                    <td align="center">
                        <input 
                        type="text" 
                        name="adminID" 
                        id="adminID" 
                        size="4" 
                        maxlength="6" 
                        value="<?php if(isset($_POST['adminID'])) echo $_POST['adminID'];?>"
                        style="width: 250px; height: 30px; border-radius: 10px;"
                        >
                    </td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td>:</td>
                    <td align="center">
                        <input 
                        type="adminPassword" 
                        name="adminPassword" 
                        id="adminPassword" 
                        size="15" 
                        maxlength="60" 
                        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
                        title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required 
                        value="<?php if(isset($_POST['adminPassword'])) echo $_POST['adminPassword'];?>"
                        style="width: 250px; height: 30px; border-radius: 10px;"
                        >
                    </td>
                </tr>
            </table>
            <br><br><br>
            <button class="submitBtn" type="submit">Login</button>
            <button class="resetBtn" type="reset" name="reset">Reset</button>
            <br>
            <br>
            <label>Don't have an account?
                <a href="adminRegister.php">Sign Up</a>
            </label>
        </div>
        </div>
        <div align="center">
        </div>
    </form>

    <?php
    include("task.php");
    
    if($_SERVER['REQUEST_METHOD']=='POST'){

        if(!empty($_POST['adminID'])){
            $id = mysqli_real_escape_string($connect, $_POST['adminID']);
        }else{
            $id = FALSE;
            echo '<p class = "error"> You forgot to enter your ID.</p>';
        }
        if(!empty($_POST['adminPassword'])){
            $p = mysqli_real_escape_string($connect, $_POST['adminPassword']);
        }else{
            $p = FALSE;
            echo '<p class = "error"> You forgot to enter your password.</p>';
        }
        if($id && $p){
            $q = "SELECT * FROM admin WHERE (adminID = '$id' AND adminPassword = '$p')";

            $result = mysqli_query ($connect, $q);

            if(@mysqli_num_rows($result)==1){

                session_start();
                $_SESSION = mysqli_fetch_array($result, MYSQLI_ASSOC);
                echo '<script>alert("Welcome to eLeave System!!!");</script>';
                header('location: http://localhost/eleave/adminHome.php');
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