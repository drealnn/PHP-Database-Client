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
            ini_set('display_errors', 'On');
            $username = $_POST['username'];
            $password = $_POST['password'];
            $database = $_POST['database'];
            // Validate username and password with database
            // if can't connect, show mysql error and kill
            if (!($database = mysqli_connect("localhost:3306", $username, $password, "project5")))
            {
                echo "<h3>Invalid Username or Password</h3>";
                echo "<a href=index.php>Go back to login page</a>";
                die("Could not connect to database");
            }

            echo "<p> Welcome back $username </p>";
            
             

            if (isset($query))
            {
                if (!($result = mysqli_query($database, $sqlquery)))
                {
                    echo "<h3> Error executing sql statement </h3>";
                    die(mysqli_error());
                }
               
            }
            elseif (isset($update))
            {

                
                if (!($result = mysqli_query($database, $sqlquery)))
                {
                    echo "<h3> Error executing sql statement </h3>";
                    die(mysqli_error());
                }
                
                
                $sqlquery = "select distinct snum from shipments where quantity > 100;";
                
                if (!($result = mysqli_query($database, $sqlquery)))
                {
                    echo "<h3> Error executing sql statement </h3>";
                    die(mysqli_error());
                }
                
                while ($row=mysqli_fetch_row($result))
                {
                    foreach ($row as $key => $value)
                    {
                        $n = sprintf("update suppliers set status = status + 5 where snum = \'%s\'",  $key);
                    }
                    
                    mysqli_query($database, $n);
                    
                }
                
                $sqlquery = "select * from suppliers;";
                
                if (!($result = mysqli_query($database, $sqlquery)))
                {
                    echo "<h3> Error executing sql statement </h3>";
                    die(mysqli_error());
                }
                
                
                
                
                
                
                
            }

        ?>
        
        <table style="background-color:yellow;">
        
            <?php
                
                $metadata = mysqli_fetch_fields($result);
                print("<tr>");
                for ($i = 0; $i<count($metadata);$i++) {
                    print("<td>");
                    printf("%s", $metadata[$i]->name);
                    print("</td>");
                }
                print("</tr>");

                while ($row=mysqli_fetch_row($result))
                {
                    print("<tr>");
                    
                    foreach ($row as $key => $value)
                        print("<td>$value</td>");
                    
                    print("</tr>");
                    
                }
            
            ?>
        
        </table>
        
        
        
        <form method="post" action="user_page.php" >
            <input type="submit" value="logout" />
            <input type = "submit"  value = "go back" />
            <input type = "hidden" name="username" value=<?php echo $username ?> />
            <input type = "hidden" name="password" value=<?php echo $password ?> />
            
        
        </form>