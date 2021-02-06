(function ($) {
	"use strict";
	var nav = $('nav');
  var navHeight = nav.outerHeight();
  
  $('.navbar-toggler').on('click', function() {
    if( ! $('#mainNav').hasClass('navbar-reduce')) {
      $('#mainNav').addClass('navbar-reduce');
    }
  })

  // Preloader
  $(window).on('load', function () {
    if ($('#preloader').length) {
      $('#preloader').delay(100).fadeOut('slow', function () {
        $(this).remove();
      });
    }
  });

  // Back to top button
  $(window).scroll(function() {
    if ($(this).scrollTop() > 100) {
      $('.back-to-top').fadeIn('slow');
    } else {
      $('.back-to-top').fadeOut('slow');
    }
  });
  $('.back-to-top').click(function(){
    $('html, body').animate({scrollTop : 0},1500, 'easeInOutExpo');
    return false;
  });

	/*--/ Star ScrollTop /--*/
	$('.scrolltop-mf').on("click", function () {
		$('html, body').animate({
			scrollTop: 0
		}, 1000);
	});

	/*--/ Star Counter /--*/
	$('.counter').counterUp({
		delay: 15,
		time: 2000
	});

	/*--/ Star Scrolling nav /--*/
	$('a.js-scroll[href*="#"]:not([href="#"])').on("click", function () {
		if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
			var target = $(this.hash);
			target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
			if (target.length) {
				$('html, body').animate({
					scrollTop: (target.offset().top - navHeight + 5)
				}, 1000, "easeInOutExpo");
				return false;
			}
		}
	});

	// Closes responsive menu when a scroll trigger link is clicked
	$('.js-scroll').on("click", function () {
		$('.navbar-collapse').collapse('hide');
	});

	// Activate scrollspy to add active class to navbar items on scroll
	$('body').scrollspy({
		target: '#mainNav',
		offset: navHeight
	});
	/*--/ End Scrolling nav /--*/

	/*--/ Navbar Menu Reduce /--*/
	$(window).trigger('scroll');
	$(window).on('scroll', function () {
		var pixels = 50; 
		var top = 1200;
		if ($(window).scrollTop() > pixels) {
			$('.navbar-expand-md').addClass('navbar-reduce');
			$('.navbar-expand-md').removeClass('navbar-trans');
		} else {
			$('.navbar-expand-md').addClass('navbar-trans');
			$('.navbar-expand-md').removeClass('navbar-reduce');
		}
		if ($(window).scrollTop() > top) {
			$('.scrolltop-mf').fadeIn(1000, "easeInOutExpo");
		} else {
			$('.scrolltop-mf').fadeOut(1000, "easeInOutExpo");
		}
	});

	/*--/ Star Typed /--*/
	if ($('.text-slider').length == 1) {
    var typed_strings = $('.text-slider-items').text();
		var typed = new Typed('.text-slider', {
			strings: typed_strings.split(','),
			typeSpeed: 80,
			loop: true,
			backDelay: 1100,
			backSpeed: 30
		});
	}

	/*--/ Testimonials owl /--*/
	$('#testimonial-mf').owlCarousel({
		margin: 20,
		autoplay: true,
		autoplayTimeout: 4000,
		autoplayHoverPause: true,
		responsive: {
			0: {
				items: 1,
			}
		}
	});

})(jQuery);

/*get name*/
function getName(){
	var myName = document.getElementById('nameToPerson').innerText;
	document.getElementById('nameTo').innerHTML = myName;
}
/*end get name*/
/*message box*/

document .querySelector(".openChatBtn") .addEventListener("click", openForm);
   document.querySelector(".close").addEventListener("click", closeForm);

   function openForm(str) {
      document.querySelector(".openChat").style.display = "block";

      document.getElementById('email').value = str;
      getName();
   }
   function closeForm() {
      document.querySelector(".openChat").style.display = "none";
}
/*End Message box*/


/*delete msgs*/
function deleteMsg(del){
	var xhttp;

	xhttp = new XMLHttpRequest();

	xhttp.onreadystatechange = function(){

		if (this.readyState == 4 && this.status == 200) {
			document.getElementById('msg1234').innerHTML = this.responseText;
		}
	};

	xhttp.open("GET" , "delete.php?del="+del, true);
	xhttp.send();
	document.getElementById('messageFinale').innerHTML = "";
}
/*end delete msg*/

/*delete msgs*/
function deleteHouse(del){
	var xhttp;

	xhttp = new XMLHttpRequest();

	xhttp.onreadystatechange = function(){

		if (this.readyState == 4 && this.status == 200) {
			document.getElementById('msg1234').innerHTML = this.responseText;
		}
	};

	xhttp.open("GET" , "deleteHouse.php?delHouse="+del, true);
	xhttp.send();
	document.getElementById('messageFinale').innerHTML = "";
}
/*end delete msg*/


/*BH Details*/

function viewDetails(anchor)
{
	var xhttp;

    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
      if (this.readyState == 4 && this.status == 200) {
         document.getElementById("bhDetails").innerHTML = this.responseText;
      }
    };
    xhttp.open("GET", "getBhDetails.php?email="+anchor, true);
    xhttp.send();
}

/*End BH Details*/

/*Search BH*/

function searchHouse(str)
 {
	/*let search = document.getElementById('search').value;*/
	document.getElementById('posts').innerHTML = str;

	/*if (search == null) {
		document.getElementById('test').innerHTML = "";
	}else{*/

		var xhttp;

		xhttp = new XMLHttpRequest();

		xhttp.onreadystatechange = function(){

			if (this.readyState == 4 && this.status == 200) {
				document.getElementById('posts').innerHTML = this.responseText;
			}
		};

		xhttp.open("GET" , "getSearch.php?search="+str, true);
		xhttp.send();
	/*}*/

}

/*End Search*/


/*Notification*/

function showNotify() 
{
  var xhttp;

    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
      if (this.readyState == 4 && this.status == 200) {
         document.getElementById("notify").innerHTML = this.responseText;
      }
    };
    xhttp.open("GET", "getNotifyAll.php?query", true);
    xhttp.send();

     document.getElementById('msg12345').innerHTML = "You have a new message";
}

/*End Notification*/

/*Notification All*/

function showMessages() 
{
  var xhttp;

    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
      if (this.readyState == 4 && this.status == 200) {
         document.getElementById("messagesAll").innerHTML = this.responseText;
      }
    };
    xhttp.open("GET", "getAllMasseges.php?queryAll", true);
    xhttp.send();
}

/*End Notification All*/

/*Message sending*/

function sendText() {
	let text = document.getElementById('text').value;
	let email = document.getElementById('email').value;

	var xhttp;

    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
      if (this.readyState == 4 && this.status == 200) {
         document.getElementById('msg1234').innerHTML = "<span class='py-3'>"+this.responseText+"</span>";
      }
    };
   xhttp.open("POST","sendMsg.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("email="+email+"&msg="+text);

    document.getElementById('text').value = "";
    document.querySelector(".openChat").style.display = "none";
}

/*Message sending end*/

/*Table*/

function loadTable() 
{
	let xhttp;

	xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
	if (this.readyState == 4 && this.status == 200) {
		document.getElementById('posts').innerHTML = this.responseText;
	}	
	};

	xhttp.open("GET", "posts.php", true);
	xhttp.send();
}

/*End Table*/


/*Table 2*/

function loadTableBook() 
{
	let xhttp;

	xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
	if (this.readyState == 4 && this.status == 200) {
		document.getElementById('posts').innerHTML = this.responseText;
	}	
	};

	xhttp.open("GET", "houseBook.php", true);
	xhttp.send();
}

/*End Table*/


/*Table 3*/

function loadTablePeople() 
{
	let xhttp;

	xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
	if (this.readyState == 4 && this.status == 200) {
		document.getElementById('peopleUsers').innerHTML = this.responseText;
	}	
	};

	xhttp.open("GET", "peopleUsers.php", true);
	xhttp.send();
}

/*End Table*/