<!DOCTYPE HTML>
<html>
    <head>
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script src="js/script.min.js"></script>
        <link rel="stylesheet" href="css/style.min.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <style>
            body{
                width: 100%;
                height: 100%;
            }
            #inputs{
                width: 175px;
                margin-left: 20px;
            }
            .sub-item{
                width: 160px;
                margin-top: 5px;
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
            .window{
                position: absolute;
                right: 45%;
                top: 80px;
                border: 1px solid #B2BDCB;
                padding: 25px;
                border-radius: 3px;
                background-color: white;
            }
            .all{
                margin: 8px;
            }
            #message{
                position: fixed;
                width: 100%;
                height: 100%;
            }
            .shadow{
                background-color: black;
                opacity: 0.7;
                width: 100%;
                height: 100%;
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
            var activated = false;
            $(".glyphicon-pencil").click(function(){
                if(!activated){
                    var span = $(this).parent().children().first();
                    var text = span.text();
                    span.html("<input type=\"text\" value=\"" + text + "\">");
                    activated = true;
                }
                else
                {
                    $("#message").css("display", "block");
                }
            });
        </script>
    </body>
</html>
