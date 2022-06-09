<html>
    <head>
        <title>very creative website name</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
    <?php
        session_start();

        if(isset($_SESSION["username"])){
            echo "<h1>Welcome ". $_SESSION["username"]. "</h1>";
        }else{
            echo "<h1>Welcome Guest User</h1>";
        }
        
        if(!(isset($_SESSION["username"]))){
            echo '<a href="./signup.php">Sign-up</a> <br>';
        }
        
        if(!(isset($_SESSION["username"]))){
            echo '<a href="./login.php">login</a>';
        }
        
        if(isset($_SESSION["username"])){
            echo '<a href="./logout.php">Logout</a>';
        }
        ?>


        
    </body>
</html>