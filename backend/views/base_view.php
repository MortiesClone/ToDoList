<!DOCTYPE HTML>
<html>
    <head>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="js/script.min.js"></script>
        <link rel="stylesheet" href="css/style.min.css">
        <style>
            #inputs{
                width: 175px;
                margin-left: 20px;
            }
            .sub-item{
                width: 160px;
                margin-top: 5px;
            }
        </style>
    </head>
    <body>
        <?php include $view; ?>
        <script>
            var count = 0;
            function add_textfield(){
                $("#inputs").append("<input id=\"id" + count + "\" class=\"sub-item text\" type=\"text\">");
                count++;
            }
        </script>
    </body>
</html>