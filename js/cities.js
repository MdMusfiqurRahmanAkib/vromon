$(document).ready(function(){

	//EVENT CLICK
	$(".city_menu a").click(function(event){
	   	//PREVENT RELOAD
	    event.preventDefault();
	    
	    //HIDE ALL CONTENTS
	    $(".districts").css("display", "none");
	    $(".active_districts").css("display", "none");

	    //GET ID FROM NEW CONTENT TO SHOW
	    var id_content = $(this).attr("href");
	    //SHOW NEW CONTENT
	    $(id_content).toggle(300);
	    
	    return false;
	});

});
