$(document).ready(function($) {
    $(".sm_image").css("display", "none");
    
    $(".small_image a").mouseover(function(){
       var id_content = $(this).attr("href");
        //SHOW NEW CONTENT
        $("#large_image").css("display", "none");
        $(".sm_image").css("display", "none");
        $(id_content).fadeIn(200);
    });

    $(".small_image a").mouseout(function(){
         $(".sm_image").css("display", "none");
         $("#large_image").fadeIn(200);
    });
});
