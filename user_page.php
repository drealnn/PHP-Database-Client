<!DOCTYPE html>
<html lang=en>
    <head> 
        <title> CNT php database page </title>
        
        <style>
        
            #my-title {
                text-align: center;
                color: red;
            }
            
            p {
                color: yellow;
            }
            
            h3 {
                color: green;
            }
            
            body {
                background-color: black;
            }
        
            
        </style>
        
    </head>
    
    <body>
        
        <span id="my-title"> <h2>CNT 4714 - Project 5 Database Client</h2> </span>
        
        <?php
            
            extract($_POST);
            // Validate username and password with database
            // if can't connect, show mysql error and kill
            if (!($database = mysqli_connect("localhost:3306", $username, $password, "")))
            {
                echo "<h3>Invalid Username or Password</h3>";
                echo "<a href=index.php>Go back to login page</a>";
                die("Could not connect to database");
            }

            echo "<p> Welcome back $username </p>";
                
        ?>
        
        <form method="post" action="database.php">
            <input type="submit" value="logout" /> </br>
            <textarea rows="10" cols="50" name="sqlquery" ></textarea> </br>
            
            <input type = "submit" name = "query" value = "Submit Query" />
		    <input type = "submit" name="update" value="Submit Update" />
            <input type="reset" value = "clear"/>
            <input name="database" type = "hidden" value="<?php echo "hello" ?>" />
            <input name="username" type = "hidden" value="<?php echo $username; ?>"/>
            <input name="password" type = "hidden"  value="<?php echo $password; ?>" />
        
        </form>