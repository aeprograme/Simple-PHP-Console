<?php

/**
 * Project : Simple Console
 * File : View.php
 * Description : Console frontend
 * Author : AePrograme
 * Github : https://github.com/AePrograme
 * Credit : HTML structure by ChatGPT
 */
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PHP Console</title>
    <style>
        <?php include APP_PATH . '/Style.php';
        ?>
    </style>
</head>

<body>
    <div id="console">
        <div id="output"></div>
        <input type="text" id="input" autofocus placeholder="Enter command..." />
    </div>
    <script>
        <?php include APP_PATH . '/Script.php'; ?>
    </script>
</body>

</html>
