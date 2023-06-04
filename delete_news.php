<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
</head>
<body>
    <?php require 'header.php' ?>
    <center>
        <h1>DELETE</h1>
        <form action="delete_news_db.php" method="post">
            <input type="number" name="id" placeholder="select id">
            <input type="submit" value="delete">
        </form>    
    </center>
</body>
</html>