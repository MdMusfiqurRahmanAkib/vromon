$(document).ready(function(){

	$(".liked").css("display", "none");
	$(".unlike").css("display", "none");
	$(".like").click(function(event){
	   	//PREVENT RELOAD
	    event.preventDefault();
	    
	    //HIDE ALL CONTENTS
	    $(".like").css("display", "none"); 
	    $(".liked").toggle();
	    $(".unlike").toggle();

	    return false;
	});

	$(".unlike").click(function(event){
	   	//PREVENT RELOAD
	    event.preventDefault();
	    
	    //HIDE ALL CONTENTS
	    $(".like").toggle();
	    $(".liked").toggle();
	    $(".unlike").toggle();
	    
	    return false;
	});

});
