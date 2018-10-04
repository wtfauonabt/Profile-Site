<!DOCTYPE html>
<html>
    <head>

        <title>First National Bank</title>
        <link rel="icon" href="views/img/icon.ico"/>

        <link href="views/css/base.css" rel="stylesheet">

    </head>
    <body>
        <ul>
            <li><h1><a href="/a2/index.php">First National Bank</a></h1></li>

            <?php
                if (isset($_COOKIE['user_name'])){
                    echo ("<li><a href=\"?model=user&action=log_out\">Sign Out</a></li>");
                    echo ("<li><p>Welcome " . $_COOKIE['user_name'] . "!</p></li>");
                } else {
                    echo ("<li><a href=\"?model=user&action=sign_up\">Register</a></li>");
                    echo ("<li><a href=\"?model=user&action=log_in\">Sign In</a></li>");
                }
            ?>
        </ul>
    </body>
</html>
