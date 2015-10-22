<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <?php if(DEBUG == false):?>
            <script src="js/script.min.js"></script>
            <link rel="stylesheet" href="css/style.min.css">
        <?php else:?>
            <script src="debug/script.js"></script>
            <link rel="stylesheet" href="debug/style.css">
        <?php endif;?>
    </head>
    <body>
        <?php include $view; ?>
        <script>
            
        </script>
    </body>
</html>
