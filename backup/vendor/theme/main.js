$(document).ready(function(){
	
	$(".navbar-toggler").click(function() {
		var icon = $("#nav-icon")
		if(icon.hasClass("fa-bars")) {
			icon.removeClass("fa-bars")
			icon.addClass("fa-times")
		} else {
			icon.addClass("fa-bars")
			icon.removeClass("fa-times")
		}
	})
	
	$(window).on('scroll', function(event) {
        var scroll = $(window).scrollTop()
        if (scroll > 100) {
            $("#navigation").addClass("fixed-top")
            $("#navigation").addClass("shadow")
            $("#navigation").addClass("bg-white")
            $("#navigation").removeClass("bg-light")
            $("#navigation").removeClass("border-bottom")
			$("#responsiveNav").addClass("pb-4")
			$("#responsiveNav").addClass("mb-5")
        } else {
            $("#navigation").removeClass("fixed-top")
            $("#navigation").removeClass("shadow")
            $("#navigation").removeClass("bg-white")
            $("#navigation").addClass("bg-light")
            $("#navigation").addClass("border-bottom")
			$("#responsiveNav").removeClass("pb-4")
			$("#responsiveNav").removeClass("mb-5")
        }
    })
})