<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="labTaskSwc2353.css" />
<title>Pandamart Malaysia</title>
</head>

<body>

<div class="page" align="center">
<div class="backPage"><a href="labTaskSwc2353.html">
<font color="#FFFFFF" class="backBtn"><<&nbsp;&nbsp;&nbsp;&nbsp;BACK</font>
</a>
</div>

<header align="center" class="logoPart1">
<a href="labTaskSwc2353.html"><img class="logo2" src="panda1.png"/></a>
</header>

<div align="center" class="logoPart2">
<a href="labTaskSwc2353.html">Foodpanda</a>
</div>

<div align="center" class="tablePart">
<div class="signUpPart" align="center">
<h1 class="signUpTitle">Sign Up</h1>

<form action="" method="POST">
<table >
<tr>
<td class="first">No. ID </td>
<td class="second">:</td>
<td class="third"><input type="cusID" name="cusID" id="cusID" size="12" maxlength="20" value="<?php if(isset($_POST['cusID'])) echo $_POST['cusID'];?>" class="textInput"/></td>
</tr>
<tr>
<tr>
<td class="first">First Name </td>
<td class="second">:</td>
<td class="third"><input type="firstName" name="firstName" id="firstName" size="20" maxlength="30" value="<?php if(isset($_POST['firstName'])) echo $_POST['firstName'];?>" class="textInput"/></td>
</tr>
<tr>
<td class="first">Last Name </td>
<td class="second">:</td>
<td class="third"><input type="lastName" name="lastName" id="lastName" size="20" maxlength="30" value="<?php if(isset($_POST['lastName'])) echo $_POST['lastName'];?>" class="textInput"/></td>
</tr>
<tr>
<td class="first">Address </td>
<td class="second">:</td>
<td class="third"><textarea rows="4" cols="50" name="address" class="textArea"></textarea></td>
</tr>
<tr>
<td class="first"></td>
<td class="second"></td>
<td class="third"></td>
</tr>
<tr>
<td class="first">Username </td>
<td class="second">:</td>
<td class="third"><input type="username" name="username" id="username" size="20" maxlength="30" value="<?php if(isset($_POST['username'])) echo $_POST['username'];?>" class="textInput"/></td>
</tr>
<tr>
<td class="first">Password </td>
<td class="second">:</td>
<td class="third"><input type="password1" name="password1" id="password1" size="20" maxlength="30" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required value="<?php if(isset($_POST['password1'])) echo $_POST['password1'];?>" class="textInput"/></td>
</tr>
<tr>
<td class="first"></td>
<td class="second"></td>
<td class="third"></td>
</tr>

</table>

<div align="center" class="btnPart">
<p><input type="submit" name="submit" value="Sign Up" class="submitBtn" />
<input type="reset" name="reset" value="Reset" class="resetBtn" /></p>
</div>
</form>

<?php

include("task.php");

if($_SERVER['REQUEST_METHOD']=='POST'){

    if(!empty($_POST['cusID'])){
        $cusID = mysqli_real_escape_string($connect, $_POST['cusID']);
    }else{
        $cusID = FALSE;
        echo '<script>
        alert ("You forgot to enter your ID number.");
        </script>';
    }
    if(!empty($_POST['firstName'])){
        $firstname = mysqli_real_escape_string($connect, $_POST['firstName']);
    }else{
        $firstname = FALSE;
        echo '<script>
        alert ("You forgot to enter your first name.");
        </script>';
    }

    if(!empty($_POST['lastName'])){
        $lastname = mysqli_real_escape_string($connect, $_POST['lastName']);
    }else{
        $lastname = FALSE;
        echo '<script>
        alert ("You forgot to enter your last name.");
        </script>';
    }

    if(!empty($_POST['username'])){
        $username = mysqli_real_escape_string($connect, $_POST['username']);
    }else{
        $username = FALSE;
        echo '<script>
        alert ("You forgot to enter your username.");
        </script>';
    }

    if(!empty($_POST['password1'])){
        $password = mysqli_real_escape_string($connect, $_POST['password1']);
    }else{
        $password = FALSE;
        echo '<script>
        alert ("You forgot to enter your password.");
        </script>';
    }

    if($username && $password){
        $a = "SELECT cusID, firstName, lastName, username, password1 FROM customer WHERE (username='$username' AND password1='$password')";

        $display = mysqli_query($connect, $a);

        if(@mysqli_num_rows($display)==1){

            session_start();
            $_SESSION = mysqli_fetch_array($display, MYSQLI_ASSOC);
            echo '<script>alert("Welcome to eLeave System!!!");</script>';

            exit();

            mysqli_free_result($display);
            mysqli_close($connect);
        }
        else{
            echo '<script>alert("perhaps you need to register, just click the Register button");</script>';
        }
    }else{
        echo '<script>alert("Please try again.");</script>';
    }
    mysqli_close($connect);
}

?>

</div>
</div>
</div>
</body>
</html>