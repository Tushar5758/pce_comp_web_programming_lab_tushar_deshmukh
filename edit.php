<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Profile</title>
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
<body style="padding-top: 50px; font-family: Arial;">
    <div id="nav">
        <ul class="nav-links">
            <li><a href="#">#</a></li>
            <li><a href="#">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </div>

    <?php
    session_start();
    //ithe session mahnun uername ghe login madhun
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "profile";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $userData = []; // Initialize an empty array to store user data

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Update the user's profile
        $name = $_POST["name"];
        $gender = $_POST["gender"];
        $phone =(int)$_POST["phone"];
        $email = $_POST["email"];

        $sql = "UPDATE logi SET name='$name', gender='$gender', phone=$phone, email='$email' WHERE uname='White_Fang'";

        if ($conn->query($sql) === TRUE) {
            echo "Profile updated successfully";
        } else {
            echo "Error updating profile: " . $conn->error;
        }
    }

    // Fetching data
    $sql = "SELECT * FROM logi WHERE uname='White_Fang'";
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
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div id="p_img">
                        <img src="s.jpg" alt="profile">
                        <h1><?php echo $userData['uname']; ?></h1>
                    </div>
                    <br>
                    <div id="details">
                        <h2>Edit Personal Details</h2>
                        <p>Name: <input type="text" name="name" value="<?php echo $userData['name']; ?>"></p>
                        <p>Gender: <input type="text" name="gender" value="<?php echo $userData['gender']; ?>"></p>
                        <br>
                        <h2>Edit Contact</h2>
                        <p>Phone No.: <input type="text" name="phone" value="<?php echo $userData['phone']; ?>"></p>
                        <p>E-mail: <input type="text" name="email" value="<?php echo $userData['email']; ?>"></p>
                        <input type="submit" value="Update Profile">
                    </div>
                </form>
            </div><br>
        </div>
    </div>
</body>
</html>
