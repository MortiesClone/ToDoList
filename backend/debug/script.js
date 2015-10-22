$(document).ready(function(){
    
    var count = 0;
    var activated = false;
    var span;
    var text;
    
    function send(id, text, action) {
        if(action == "write"){
            var a = "action=" + action + "&text=" + text;
        }
        else if(action == "rewrite"){
            var a = "action=" + action + "&id=" + id + "&text=" + text;
        }
        else if(action == "delete"){
            var a = "action=" + action + "id=" + id;
        }
        else {
            alert("Ошибка использования функции");
        }
        if(text == ""){
            alert("Ошибка");
        }
        $.ajax({
            type: "GET",
            url: "controller.php",
            data: a,
            success: function(a) {
                if(a == false) //обработка ошибок
                    alert("Ошибка");
                else if(action == "write")
                    $("#content").append("<div class=\"task\" data-id=" + a + "><span>" + text + "</span><span class=\"glyphicon glyphicon-remove\"></span><span class=\"glyphicon glyphicon-pencil\"></span></div>")
            }
        });
    }
    function add_textfield(){
        $("#inputs").append("<input id=\"id" + count + "\" class=\"sub-item text\" type=\"text\">");
        count++;
    }
    $("#send").click(function(){
        send(null, $("#text").val(), "write");                 
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
                send(span.parent().data("id"), text, "rewrite");
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
//    $(".glyphicon-remove").click(fucntion(){
//        var window = $(".window");
//        var task = $(this).parent();
//        $("#message").css("display", "block");
//        window.children("p").html("Удалить?");
//        window.children("#left-btn").val("Удалить");    
//        window.children("#left-btn").click(fucntion(){
//            send(task.data("id"), null, "delete");              
//        });
//        window.children("#right-btn").click(fucntion(){
//            $("#message").css("display", "none");                                    
//        });
//    });
});