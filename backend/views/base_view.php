<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <?php if(FRONTEND == false):?>
            <script src="js/script.min.js"></script>
            <link rel="stylesheet" href="css/style.min.css">
        <?php else:?>
            <script src="frontend/js_result/script.js"></script>
            <link rel="stylesheet" href="frontend/css/style.css">
        <?php endif;?>
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
                    text = span.text();
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
                    activated = false;
                }
            });
        </script>
    </body>
</html>
