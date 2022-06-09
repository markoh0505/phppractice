<html>
    <head>
        <title>Sign up</title>
    </head>

    <body>
    <form action="./signup.php" method="POST">
        Username: <input type="text" name="username" value="" required><br>
        E-Mail: <input type="text" name="email" value="" required><br>
        Password: <input type="password" name="password" value="" minlength="8" required><br><br>
        <input type="submit" value="Submit">
    </form>
<?php

if(!(empty($_POST))){
    $servername = "localhost";
    $username = "loginUser";
    $password = "qxy-G!V4.Y1ZQ9h]";
    $dbname = "logindb";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
      die('<input type="hidden" value="' . var_dump($_POST) . '" />'."\n");
    }

    //checks if username and email are already in the db
    //returns true if name or email is taken
    function checkNameAndEmail() {
        global $conn;

        $sql = "SELECT username,email FROM users";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()){
                if(trim($_POST["username"]) == $row["username"] or $_POST["email"] == $row["email"]){
                    return TRUE;
                }
            }
        }
    }

    if (checkNameAndEmail()) {
        die("Username or E-Mail is already taken");
        }

    $sql = "INSERT INTO users (username, email, password) VALUES ('".$_POST["username"]."', '".$_POST["email"]."', '".$_POST["password"]."')";
    if ($conn->query($sql) === TRUE) {
        echo "New account created successfully";
        session_start();
        $_SESSION["username"] = $_POST["username"];
        header("Location: ./index.php");
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }

    $conn->close();
}
?>
    </body>
</html>