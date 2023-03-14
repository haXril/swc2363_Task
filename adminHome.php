<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: #fd76c9;
        }

        nav{
            width: 100%;
            margin: auto;
        }

        ul{
            list-style: none;
        }

        ul li{
            width: 120px;
            color: #fff;
            float: left;
            height: 35px;
            line-height: 35px;
            text-align: center;
            margin-right: 2px;
            border-radius: 10px;
            transition: .4s;
        }

        ul li a{
            color: #fff;
            text-decoration: none;
            font-family: sans-serif;
            font-size: 13Spx;
            display: block;
            background-color: #0005;
        }

        ul li ul li{
            border-top: 1px solid #fff;
        }

        ul li ul{
            display: none;
        }

        ul li:hover ul{
            display: block;
        }
    </style>
</head>
<body>
    <div align="left" style="padding-left: 30px; background-color: #af036d; width: 100%; height: 100px; padding-top: 3vh;">
        <nav>
            <ul>
                <li>HOME</li>
                <li>MENU
                    <ul>
                        <li><a href="add.php">Add</a></li>
                        <li><a href="userRegister.php">Register user</a></li>
                        <li><a href="update.php">Update user Total Leave</a></li>
                        <li><a href="delete.php">Delete leave</a></li>
                    </ul>
                </li>
                <li>ABOUT US</li>
                <li>CONTACT US
                    <ul>
                        <li><a href="https://web.whatsapp.com/">Whatsapp</a></li>
                        <li><a href="https://www.instagram.com/">Instargram</a></li>
                        <li><a href="https://www.facebook.com/">Facebook</a></li>
                        <li><a href="">Twitter</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</body>
</html>