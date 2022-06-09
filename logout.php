<html>
    <head>
        <title>Logging out</title>
    </head>
    <body>
<?php
session_start();
session_unset();
session_destroy();
header("location: index.php");
?>
    </body>
</html>