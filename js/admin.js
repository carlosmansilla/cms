url = "";
$().ready(function(){
    $("#yes").click(function(){
        $("#mensaje").hide();
        window.location.assign(url);
    });
    $("#no").click(function(){
        $("#mensaje").hide();
    });
    link = $(location).attr('pathname');
    part = link.split("/")[2];
    part = part.split("_")[0];
    $("#menu li a[href*='"+part+"']").css("background-color", "#4CAF50");
});

function eliminar(x){
    url = x;
    $("#mensaje").show();
}