<!DOCTYPE HTML>
<html>
    <head>
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script src="js/script.min.js"></script>
        <link rel="stylesheet" href="css/style.min.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <style>
            #inputs{
                width: 175px;
                margin-left: 20px;
            }
            .sub-item{
                width: 160px;
                margin-top: 5px;
            }
            body{
                margin: 8px;
            }
            .glyphicon{
                float: right;
                cursor: pointer;
                margin-right: 10px;
                margin-top: 3px;
            }
            .task{
                    padding: 5px;
                    border-bottom: 1px solid #B2BDCB;
                    margin-top: 10px;
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
            $(".glyphicon-pencil").click(function(){
                var text = $(this).parent("p").text();
                $(this).parent("p").text("");
            });
        </script>
    </body>
</html>