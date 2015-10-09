function send(){
    var count 
    var data = "text=" + $("#text").val() + "&done=" + $("#check").val();
    $.ajax({
        type: "GET",
        url: "some.php",
        data: data,
        success: function(msg){
            $("#content").append('<p>' + $("#text").val() + msg + '</p>');
        }
    });
}