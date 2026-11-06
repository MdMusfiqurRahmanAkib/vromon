$(document).ready(function(){
  var current = 1,current_step,next_step,steps;
  steps = $("fieldset").length;

  $(".next").click(function(){
    current_step = $(this).parent();
    next_step = $(this).parent().next();
    next_step.show();
    current_step.hide();
    setProgressBar(++current);
  });

  $(".previous").click(function(){
    current_step = $(this).parent();
    next_step = $(this).parent().prev();
    next_step.show();
    current_step.hide();
    setProgressBar(--current);
  });

  setProgressBar(current);
  // Change progress bar action
  function setProgressBar(curStep){
    var percent = parseFloat(100 / steps) * curStep;
    percent = percent.toFixed();
    $(".progress-bar")
      .css("width",percent+"%")
      .html(percent+"%");   
  }

  $(".service").css("display", "none");
  $(".transport_option").click(function(){
      var inputValue = $(this).attr("value");
      var targetBox = $("." + inputValue);
      $(".service").not(targetBox).css("display", "none");
      $(targetBox).show();
  });

  $(".district").css("display", "none");
  $("select").change(function(){
      $(this).find("option:selected").each(function(){
          var optionValue = $(this).attr("value");
          if(optionValue){
              $(".district").not("." + optionValue).css("display", "none");
              $("." + optionValue).show();
          } else{
              $(".district").css("display", "none");
          }
      });
  }).change(); 

});

  $( "#regiration_form" ).submit(function(event) {
      jQuery('.alert-success').removeClass('hide').html( "Handler for .submit() called and see console logs for your posted variable" );
      console.log($(this).serialize());
      event.preventDefault();
  });