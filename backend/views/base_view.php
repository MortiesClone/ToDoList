<!DOCTYPE HTML>
<html>
    <head>
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script src="js/script.min.js"></script>
        <link rel="stylesheet" href="css/style.min.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <meta charset="utf-8">
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
            var span;
            var text;
            $(".glyphicon-pencil").click(function(){
                if(!activated){
                    span = $(this).parent().children().first();
                    var text = span.text();
                    span.html("<input type=\"text\" value=\"" + text + "\">");
                    activated = true;
                }
                else
                {
                    var window = $(".window");
                    $("#message").css("display", "block");
                    window.children("p").html("Сохранить?");
                    window.children("#left-btn").val("Сохранить");
                    window.children("#right-btn").click(function(){
                        $("#message").css("display", "none");
                        span.html("" + text);
                    });
                }
            });
        </script>
    </body>
</html>
