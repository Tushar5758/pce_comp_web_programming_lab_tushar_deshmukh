<!DOCTYPE html>
<html lang="en">
    <head>

        <title>Profile page</title>
        <link rel="stylesheet" type="text/css" href="profile.css">
        <style>
            #nav{
            font-family: Montserrat classic;
            position: fixed;
            display: flex;
            align-items: center;
            justify-content: flex-start; 
            top: 0;
            height: 60px;
            width: 100%;
            background-color:white;
            color:#72c311;

        }
        #nav ul{
            padding-top: 13px;
            padding-bottom: 13px;
            padding-left: 10px;
        }
        #nav li{
            list-style: none;
            float: left;
            padding-right: 20px;
        }
        .nav-links {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        .nav-links li {
            display: inline;
            margin-right: 20px;
        }

        .nav-links li:last-child {
            margin-right: 0;
        }

        .nav-links li a {
            color:#72c311;
            text-decoration: none;
            font-size: 18px;
            padding: 10px 20px;
            border-radius: 20px;
            transition: background-color 0.3s ease;
        }

        .nav-links li a:hover {
            background-color: #555;
        }
        </style>
    </head>
    <body style="padding-top: 50px; font-family: arial;">
    <div id="nav">
        <ul class="nav-links">
            <li><a href="#">#</a></li>
            <li><a href="#">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">News</a></li>
            <li><a href="#">Blog</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </div>
        <?php
            session_start();
            //ithe session mahnun uername ghe login madhun
            // Database connection
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "profile";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            
            // Fetching data
            $sql = "SELECT * FROM logi WHERE uname='White_Fang'"; //username
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output data of each row
                $userData = $result->fetch_assoc();
            } else {
                echo "0 results";
            }

            $conn->close();
         ?>
        <div id="con">
            <div id="container">
                <div id="profile">
                    <div id="p_img">
                        <img src="s.jpg" alt="profile">
                        <h1><?php echo $userData['uname']; ?></h1>
                        <a href="edit.php"><input type="submit" value="Edit profile"></a>
                        <a href="#"><input type="submit" value="Delete Account"></a>
                    </div>
                    <br>
                    <div id="details">
                        <h2>Personal Details</h2>
                        <p>Name:<?php echo $userData['name']; ?></p>
                        <p>Gender:<?php echo $userData['gender']; ?></p>
                        <br>
                        <h2>Contact</h2>
                        <p>Phone No.:<?php echo $userData['phone']; ?></p>
                        <p>E-mail:<?php echo $userData['email']; ?></p>
                    </div>
                </div><br>
            </div>
        </div>
    </body>
</html>

