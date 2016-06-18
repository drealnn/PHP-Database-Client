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
     

        <form method="post" action="user_page.php">

            <p> Username: </p> 
            <input type="text" name="username"/>

            <p> Password:</p> 
            <input type="text" name="password" />

            <br> <br>
            <input type="submit" value="Login" />

        </form>


        <div id="main">



        </div>
        
        
    </body>
    
</html>
