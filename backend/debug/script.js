$(document).ready(function(){
    
    var count = 0;
    var activated = false;
    var span;
    var text;
    var confirm_window = $(".window");            
    var sub_task = $("#sub-task");
    
    function send(id, text, action, parent, parent_html) {
        if (typeof parent_html == 'undefined') parent_html = null;
        if(action == "write"){
            if(parent == null)
                var a = "action=" + action + "&text=" + text;
            else
                var a = "action=" + action + "&text=" + text + "&parent=" + parent;
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
        $.ajax({
            type: "GET",
            url: "controller.php",
            data: a,
            success: function(a) {
                if(a == false) //обработка ошибок
                    alert("Ошибка записи");
                else if(action == "write"){
                    show_result(a, text, parent_html);
                }
            }
        });
    }
    function show_result(id, task, parent){
        if(parent == null){
            $("#content").append("<div class=\"task\"><span data-id=" + id + ">" + task + "</span><span class=\"glyphicon glyphicon-remove\"></span><span class=\"glyphicon glyphicon-pencil\"></span></div>");
        }
        else{
            parent = parseInt(parent);
            parent--;
            $("#content").children(":eq(" + parent + ")").append("<div class=\"sub-task\ data-id=\"" + id + "\"><span>" + task + "</span><span class=\"glyphicon glyphicon-remove\"></span><span class=\"glyphicon glyphicon-pencil\"></span></div>");
        }    
    }
    function show_confrim_window(message, left_btn){
        $("#message").css("display", "block");
        confirm_window.children("p").html(message);
        confirm_window.children("#left-btn").val(left_btn);
    }
    
    //Click functions
    
    $("#send").click(function(){
        if(sub_task.prop("checked") == false){
            send(null, $("#text").val(), "write", null);
        }
        else{
            var parent = $("#number-of-sub-task option:selected").data("id");
            var parent_html = $("#number-of-sub-task option:selected").val();
            send(null, $("#text").val(), "write", parent, parent_html);
        }
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