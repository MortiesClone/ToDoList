$(document).ready(function(){
    
    var count = 0;
    var activated = false;
    var span;
    var text;
    var confirm_window = $(".window");            
    
    function send(id, text, action) {
        if(action == "write"){
            var a = "action=" + action + "&text=" + text;
        }
        else if(action == "rewrite"){
            var a = "action=" + action + "&id=" + id + "&text=" + text;
        }
        else if(action == "delete"){
            var a = "action=" + action + "&id=" + id;
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
    function show_confrim_window(message, left_btn){
        $("#message").css("display", "block");
        confirm_window.children("p").html(message);
        confirm_window.children("#left-btn").val(left_btn);
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
            show_confrim_window("Сохранить?", "Сохранить");
            text = span.children().val();
            
            //Left button
            confirm_window.children("#left-btn").click(function(){
                $("#message").css("display", "none");
                send(span.parent().data("id"), text, "rewrite");
                span.html("" + text);
            });
            
            //Right button
            confirm_window.children("#right-btn").click(function(){
                $("#message").css("display", "none");
                span.html("" + text);
            });
            
            activated = false;
        }
    });
    $(".glyphicon-remove").click(function(){
        var task = $(this).parent();
        
        show_confrim_window("Удалить?", "Удалить");
        
        //Left button
        confirm_window.children("#left-btn").click(function(){
            send(task.data("id"), null, "delete");
            $("#message").css("display", "none");
            task.remove();
        });
        
        //Right button
        confirm_window.children("#right-btn").click(function(){
            $("#message").css("display", "none");                                    
        });
    });
});