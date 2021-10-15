$( document ).ready(function() {
		getPlayer();
		setInterval(function () {
			getPlayer();
		}, 60*1000);
	});

	function getPlayer () {
		$.getJSON( "https://api.mcsrvstat.us/1/play.ifactions.tk", function( data ) {
			$("#ping").html(data.ping);
			$("#ip").html(data.hostname);
			$("#players").html(data.players.online);
		});	
	}
    
    function serverjoin()
    {
        swal({
            title: "IP has been copied!",
            text: "You can join the server by adding the IP to your server list!",
            icon: "success",
            button: "Join Now",
        });
    }
		
            function openMobile() {
                $(".dd-bg").addClass("active");
                $(".cyvers-nav ul#main-nav").addClass("open");
            }
            function closeMobile() {
                $(".dd-bg").removeClass("active");
                $(".cyvers-nav ul#main-nav").removeClass("open");
            }

$(window).scroll(function() {
    if ($(this).scrollTop() >= 50) { 
        $('#return-to-top').fadeIn(200);
    } else {
        $('#return-to-top').fadeOut(200);
    }
});
$('#return-to-top').click(function() {
    $('body,html').animate({
        scrollTop : 0
    }, 500);
});