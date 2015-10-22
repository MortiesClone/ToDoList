$(document).ready(function(){
    function send(id, text) {
        if(text == ""){
            alert("Ошибка");
        }
        else{
            if(id == null)
                var a = "text=" + text;
            else
                var a = "id=" + id + "&text=" + text;
            $.ajax({
                type: "GET",
                url: "controller.php",
                data: a,
                success: function(a) {
                    if(a == null) //обработка ошибок
                        alert("server eror");
                    else if(id == null)
                        $("#content").append("<div class=\"task\" data-id=" + a + "><span>" + text + "</span><span class=\"glyphicon glyphicon-remove\"></span><span class=\"glyphicon glyphicon-pencil\"></span></div>")
                }
            });
        }
    }
    var count = 0;
    var activated = false;
    var span;
    var text;

    function add_textfield(){
        $("#inputs").append("<input id=\"id" + count + "\" class=\"sub-item text\" type=\"text\">");
        count++;
    }
    $("#send").click(function(){
        send(null, $("#text").val());                 
    });
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
            text = span.children().val();
            //Левая кнопка
            window.children("#left-btn").click(function(){
                $("#message").css("display", "none");
                send(span.parent().data("id"), text);
                span.html("" + text);
            });
            
            //Правая кнопка
            window.children("#right-btn").click(function(){
                $("#message").css("display", "none");
                span.html("" + text);
            });
            activated = false;
        }
    });
});