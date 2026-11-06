<?php
mysqli_close($con);
include 'link.php';
?>

	<section id="subscribe">
		<div class="container">
    		<div class="row">
    			<div class="col-md-12 text-center btn-font">
    				<h4>স্বপ্নীল ভ্রমণের আইডিয়া চান?  </h4>

					<form method="post" class="subscribe-form text-center">
						<input type="email" name="email" id="email" placeholder="ই-মেইল দিন">
						<input id="submit" class="col-md-1 btn btn-dark btn-font" onclick="subscribe_function()" type="button" value="সাবস্ক্রাইব">

					</form>

					<h4>নিয়মিত আপডেটেড থাকুন</h4>

    			</div>
    		</div>
    	</div>
	</section>

	<footer class="footer">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<div class="footer-about text-center">
						<h4>আমাদের ব্যাপারে</h4>
						<div class="footer-para">
				 			<p>
				 				ভ্রমণ একটি পর্যটন বিষয়ক সেবাপ্রদানকারী ওয়েবসাইট
				 			</p>
						</div>
			 			<a href="about.php"><button type="button" class="btn btn-dark btn-font tex">বিস্তারিত</button></a>

					</div>
				</div>

				<div class="col-lg-3 col-md-4">
					<div class="footer-help text-center">
						<h4>আমাদের সাথে যুক্ত হোন</h4>
						<div class="footer-list">
				 			<ul>
								<li><a href="business.php?id=3"> খাদ্য সেবা দিন</a></li>
								<li><a href="business.php?id=4">যানবাহন দিন</a></li>
								<li><a href="business.php?id=5">গাইড হিসেবে যুক্ত হোন</a></li>
							</ul>
						</div>
					</div>
				</div>

			</div>
		</div>
	</footer>

	<section class="copyright">

		<div class="container">
			<div class="row">
				<h4 class="copyright_text col-md-6"><i class="fa fa-copyright" aria-hidden="true"> </i> কপিরাইট ২০২১, সকল স্বত্বাধিকার সংরক্ষিত </h4>
				<div class="col-md-6">
				  	<ul class="social-network social-circle">
                        <li><a href="#" class="icoRss" title="Rss"><i class="fa fa-rss"></i></a></li>
                        <li><a href="#" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#" class="icoGoogle" title="Google +"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#" class="icoLinkedin" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
				</div>
			</div>
		</div>
	</section>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src='https://maps.googleapis.com/maps/api/js?v=3.exp'></script>
    <script src="https://cdn.ckeditor.com/4.10.0/standard/ckeditor.js"></script>
    <script src="js/mapdata.js"></script>
    <script src="js/countrymap.js"></script>
    <script src="js/plan.js"></script>
    <script src="js/general.js"></script>
    <script src="js/cities.js"></script>
	<script src="js/single_post.js"></script>
	<script src="js/hotel.js"></script>
	<script src="js/counter.js"></script>
	<!--
	multiselect
	-->
    <script src="multiselect/js/jquery-3.3.1.min.js"></script>
    <script src="multiselect/js/popper.min.js"></script>
    <script src="multiselect/js/bootstrap.min.js"></script>
    <script src="multiselect/js/chosen.jquery.min.js"></script>
    
    <script src="multiselect/js/main.js"></script>
    <!--
	multiselect ends
	-->
    <script>
		  CKEDITOR.replace('editor1',{
				width: "1000px",
		    	height: "400px"
		     }
		);
	</script>

    <script type='text/javascript'>
		function init_map(){
			var myOptions = {zoom:6,center:new google.maps.LatLng(22.356851,91.78318190000005),mapTypeId: google.maps.MapTypeId.ROADMAP};
			map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);
			marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(22.356851,91.78318190000005)});
			infowindow = new google.maps.InfoWindow({content:'<strong>Title</strong><br>Chittagong<br>'});
			google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});
			infowindow.open(map,marker);
		}

		google.maps.event.addDomListener(window, 'load', init_map);

		function register_function() {
		    var fname = document.getElementById("fname").value;
		    var lname = document.getElementById("lname").value;
		    var username = document.getElementById("username").value;
		    var email = document.getElementById("email").value;
		    var address = document.getElementById("address").value;
		    var password = document.getElementById("password").value;
		    var password = document.getElementById("password").value;
		    var c_password = document.getElementById("c_password").value;
		    var postal_code = document.getElementById("postal_code").value;
		    var mobile = document.getElementById("mobile").value;
		    var nid = document.getElementById("nid").value;
		    // Returns successful data submission message when the entered information is stored in database.
		    var dataString = 'fname=' + fname + '&lname=' + lname + '&username=' + username + '&email=' + email + '&address=' + address + '&mobile=' + mobile + '&nid=' + nid +'&password=' + password +'&postal_code=' + postal_code;

		    if (fname == '' || lname == '' || username == '' || email == '' || nid == '' || password == '' || c_password == '' || postal_code == '') {
		        alert("Please Fill All Fields");
		    }
		    else if (password!==c_password) {
		        alert("Confirmed Password is different from the given one");
		    }
		    else {
		    // AJAX code to submit form.
		        $.ajax({
		            type: "POST",
		            url: "reg_process.php",
		            data: dataString,
		            cache: false,
		        }).done(function (data) {
			        if (data === "successful") {
			            window.location.replace("register_success.php");
			        }
			        else {
			            alert(data);
			        }
			    });
		    }

		    return false;
		}

		function login_function() {

		    var email = document.getElementById("email").value;
		    var password = document.getElementById("password").value;

		    // Returns successful data submission message when the entered information is stored in database.
		    var dataString = 'email=' + email + '&password=' + password;

		    if (email == '' || password == '') {
		        alert("Please Fill All Fields");
		    }
		    else {
		    // AJAX code to submit form.
		        $.ajax({
		            type: "POST",
		            url: "login_process.php",
		            data: dataString,
		            cache: false,
		        }).done(function (data) {
			        if (data === "successful") {
			            window.location.replace("index.php");
			        }
			        else {
			            alert(data);
			        }
			    });
		    }

		    return false;
		}

		function password_change_check() {

		    var password = document.getElementById("password").value;

		    // Returns successful data submission message when the entered information is stored in database.
		    var dataString = 'password=' + password;

		    // AJAX code to submit form.
	        $.ajax({
	            type: "POST",
	            url: "password_check_process.php",
	            data: dataString,
	            cache: false,
	        }).done(function (data) {
		        if (data === "successful") {
		            window.location.replace("change.php?id=11");
		        }
		        else {
		            alert(data);
		        }
		    });


		    return false;
		}

		function password_change() {

		    var password = document.getElementById("password").value;

		    // Returns successful data submission message when the entered information is stored in database.
		    var dataString = 'password=' + password;

		    // AJAX code to submit form.
	        $.ajax({
	            type: "POST",
	            url: "password_change_process.php",
	            data: dataString,
	            cache: false,
	        }).done(function (data) {
		        if (data === "successful") {
		        	alert("Password Changed successfully!");
		            window.location.replace("index.php");
		        }
		        else {
		            alert(data);
		        }
		    });


		    return false;
		}


		function subscribe_function() {
		    var email = document.getElementById("email").value;


		    // Returns successful data submission message when the entered information is stored in database.
		    var dataString = 'email=' + email;

		    if (email == '') {
		        alert("Please Fill the Email Field");
		    }
		    else {
		    // AJAX code to submit form.
		        $.ajax({
		            type: "POST",
		            url: "subscribe.php",
		            data: dataString,
		            cache: false,
		        }).done(function (data) {
			        if (data === "successful") {
			            window.location.replace("subscribe_success.php");
			        }
			        else {
			            alert(data);
			        }
			    });
		    }

		    return false;
		}

		function question_function() {
		    var name = document.getElementById("name").value;
		    var contact = document.getElementById("mobile").value;
		    var email = document.getElementById("email").value;
		    var question = document.getElementById("question_area").value;


		    // Returns successful data submission message when the entered information is stored in database.
		    var dataString = 'name=' + name + '&contact=' + contact + '&email=' + email + '&question=' + question;

		    if (name == '' || contact == '' || email == '' || question == '') {
		        alert("Please Fill All the Field");
		    }
		    else {
		    // AJAX code to submit form.
		        $.ajax({
		            type: "POST",
		            url: "question_receive.php",
		            data: dataString,
		            cache: false,
		        }).done(function (data) {
			        if (data === "successful") {
			            window.location.replace("question_success.php");
			        }
			        else {
			            alert(data);
			        }
			    });
		    }

		    return false;
		}

		function refresh_function() {

			$("#question_area").load(location.href+" #question_area>*","");

			//$('#question_area').reset();
		    return false;
		}
	</script>

    <script type="text/javascript">
    	$(document).ready(function (e) {
			$("#post_form").on('submit',(function(e) {
				e.preventDefault();
				$.ajax({
		        	url: "post_process.php",
					type: "POST",
					data:  new FormData(this),
					contentType: false,
		    	    cache: false,
					processData:false,
					beforeSend : function()
					{

					},
					success: function(data)
				    {
						if(data ==='Invalid File Type!')
						{
							alert(data);
						}
						else{
							alert(data);
							$("#post_form")[0].reset();
						}
				    },
				  	error: function(e)
			    	{
						alert(e);
			    	}
			   });
			}));


		});


    </script>

    <script type="text/javascript">
    	$(document).ready(function (e) {
			$("#guide_request").on('submit',(function(e) {
				e.preventDefault();
				$.ajax({
		        	url: "business_process.php?id=6",
					type: "POST",
					data:  new FormData(this),
					contentType: false,
		    	    cache: false,
					processData:false,
					beforeSend : function()
					{

					},
					success: function(data)
				    {
						if(data ==='Invalid File Type!')
						{
							alert(data);
						}
						else{
							alert(data);
							$("#guide_request")[0].reset();
						}
				    },
				  	error: function(e)
			    	{
						alert(e);
			    	}
			   });
			}));


		});


    </script>

	<script type="text/javascript">
		(function($){
			$('.dropdown-menu a.dropdown-toggle').on('click', function(e) {
			  if (!$(this).next().hasClass('show')) {
				$(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
			  }
			  var $subMenu = $(this).next(".dropdown-menu");
			  $subMenu.toggleClass('show');

			  $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
				$('.dropdown-submenu .show').removeClass("show");
			  });

			  return false;
			});
		})(jQuery)
	</script>
	<script type="text/javascript">
		//like buttons
		$(".like_button").click(function() {
		 if ($(this).hasClass("like-active")) {
		  $(this).find('.like-no').html(parseInt($(this).find('.like-no').html(), 10) - 1)
		  $(this).css("color", "white");
		  $.ajax({
		        type: 'POST',
		        url: 'like_dislike_process.php',
		        data: {
		        		post_id: $(this).attr("id"),
		        		status: "Unlike"
		         },
		    }).done(function (data) {
			        if (data === "successful") {
			            alert("You have unliked this post!");
			        }
			        else {
			            alert(data);
			        }
			    });;
		 } else {
		  $(this).find('.like-no').html(parseInt($(this).find('.like-no').html(), 10) + 1)
		  $(this).css("color", "yellow");
		  $.ajax({
		        type: 'POST',
		        url: 'like_dislike_process.php',
		        data: {
		        		post_id: $(this).attr("id"),
		        		status: "Like"
		         },
		    }).done(function (data) {
			        if (data === "successful") {
			            alert("You have liked this post!");
			        }
			        else {
			            alert(data);
			        }
			    });;
		    if ($(".dislike_button").hasClass("like-active")) {
			   $(".dislike_button").toggleClass('like-active');
			   $(".dislike_button").find('.dislike-no').html(parseInt($(".dislike_button").find('.dislike-no').html(), 10) - 1)
			   $(".dislike_button").css("color", "white");
 			}
		 }
		 $(this).toggleClass('like-active');
		});

		//dislike buttons
		$(".dislike_button").click(function() {
		 if ($(this).hasClass("like-active")) {
		  $(this).find('.dislike-no').html(parseInt($(this).find('.dislike-no').html(), 10) - 1);
		  $(this).css("color", "white");
		  $.ajax({
		        type: 'POST',
		        url: 'like_dislike_process.php',
		        data: {
		        		post_id: $(this).attr("id"),
		        		status: "Undislike"
		         },
		    }).done(function (data) {
			        if (data === "successful") {
			            alert("You have undisliked this post!");
			        }
			        else {
			            alert(data);
			        }
			    });;
		 } else {
		  $(this).find('.dislike-no').html(parseInt($(this).find('.dislike-no').html(), 10) + 1)
		  $(this).css("color", "yellow");
		  $.ajax({
		        type: 'POST',
		        url: 'like_dislike_process.php',
		        data: {
		        		post_id: $(this).attr("id"),
		        		status: "Dislike"
		         },
		    }).done(function (data) {
			        if (data === "successful") {
			            alert("You have disliked this post!");
			        }
			        else {
			            alert(data);
			        }
			    });;
		    if ($(".like_button").hasClass("like-active")) {
			   	$(".like_button").toggleClass('like-active');
			   	$(".like_button").find('.like-no').html(parseInt($(".like_button").find('.like-no').html(), 10) - 1);
			   	$(".like_button").css("color", "white"); 
		   }
		 }
		 $(this).toggleClass('like-active');
		});
	</script>
	<script type="text/javascript">
		$('.add').on('click', add);
		$('.remove').on('click', remove);

		function add() {
		  var new_chq_no = parseInt($('#total_chq').val()) + 1;
		  var new_item = "<input type='text' id='new_item_" + new_chq_no + "' name='menu_"+new_chq_no +"' placeholder=\"খাবারের নাম লিখুন\" >";
		  var new_price = "<input type='text' id='new_price_" + new_chq_no + "' name='price_"+new_chq_no +"' placeholder=\"দাম লিখুন\">";

		  $('#new_chq').append(new_item);
		  $('#new_chq').append(new_price);

		  $('#total_chq').val(new_chq_no);
		}

		function remove() {
		  var last_chq_no = $('#total_chq').val();

		  if (last_chq_no > 1) {
		    $('#new_item_' + last_chq_no).remove();
		    $('#new_price_' + last_chq_no).remove();
		    $('#total_chq').val(last_chq_no - 1);
		  }
		}
	</script>
  </body>
</html>