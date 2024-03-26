<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read a Blog</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: #f8f8f8;
            color: #333;
        }

        #con{
            padding-top: 60px;
        }
        #header {
            background-color: #4CAF50;
            padding: 10px;
            text-align: center;
            color: white;
            position: inherit;
        }

        #header a {
            position: absolute;
            top: 10px;
            right: 10px;
            text-decoration: none;
            color: white;
            font-weight: bold;
            font-size: 16px;
        }

        #main {
            text-align: left;
            margin: 50px;
        }

        .blog-content {
            width: 80%;
            margin: 20px auto;
            padding: 20px;
            font-size: 20px;
            border: 2px solid #ccc;
            border-radius: 10px;
            box-shadow: 1px 1px 5px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

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
<body>
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
    <div id="con">
        <div id="header">
            <h1>blog</h1>

        </div>
        <div id="main">
            <h2>Read a Blog</h2>
            <?php
            // Establish MySQL connection
            $conn = new mysqli("localhost", "root", "", "blog");

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Query to fetch blog posts from MySQL
            $sql = "SELECT * FROM blog";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    ?>
                    <div class="blog-content">
                        <h3>User:<?php echo $row['uname']; ?></h3>
                        <p>Title:<?php echo $row['btitle']; ?></p>
                        <p><?php echo $row['bcontent']; ?></p>
                        <p>Date:<?php echo $row['bdate']; ?></p>
                    </div>
                    <?php
                }
            } else {
                echo "No blog posts found";
            }

            // Close MySQL connection
            $conn->close();
            ?>
        </div>
    </div>
</body>
</html>
