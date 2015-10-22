function send() {
    var a = "text=" + $("#text").val() + "&done=" + $("#check").val();
    $.ajax({
        type: "GET",
        url: "controller.php",
        data: a,
        success: function(a) {
            a = JSON.parse(a);
            $("#content").append("<div class=\"task\" data-id=" + a.id + "><span>" + a.text + "</span><span class=\"glyphicon glyphicon-remove\"></span><span class=\"glyphicon glyphicon-pencil\"></span></div>")
        }
    })
}
var count = 0;
var activated = false;
var span;
var text;

function add_textfield(){
    $("#inputs").append("<input id=\"id" + count + "\" class=\"sub-item text\" type=\"text\">");
    count++;
}
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