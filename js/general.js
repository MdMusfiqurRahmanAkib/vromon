$(document).ready(function(){

	 //EVENT CLICK
	$(".hill_sea_menu a").click(function(event){
	   	//PREVENT RELOAD
	    event.preventDefault();
	    
	    //HIDE ALL CONTENTS
	    $(".hill_sea_1").css("display", "none");
	    $(".hill_sea").css("display", "none");

	    //GET ID FROM NEW CONTENT TO SHOW
	    var id_content = $(this).attr("href");
	    //SHOW NEW CONTENT
	    $(id_content).toggle(300);
	    
	    return false;
	});

	

});
