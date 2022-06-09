<html>
    <head>
        <title>Login</title>
    </head>

    <body>
    <form action="./login.php" method="POST">
        Username or E-Mail: <input type="text" name="userID" value="" required><br>
        Password: <input type="password" name="password" value="" minlength="8" required><br><br>
        <input type="submit" value="Submit">
    </form>
<?php
if(!(empty($_POST))){
    $servername = "localhost";
    $username = "loginUser";
    $password = "";
    $dbname = "logindb";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT username,email,password FROM users";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()){
            if(trim($_POST["userID"]) == $row["username"] or $_POST["userID"] == $row["email"]){
                if($_POST["password"] == $row["password"]){
                    session_start();
                    $_SESSION["username"] = $row["username"];
                    header("Location: ./index.php");
                    $conn->close();
                    die();
                }
            }
        }
        echo "Username or E-Mail does not exist";
    }

    $conn->close();
}
?>
    </body>
</html>