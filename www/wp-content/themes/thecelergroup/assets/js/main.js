$(document).ready(function () {
	function initBgCover(context) {
		if (!context) context = $("body")
		context.find(".js-bg-cover").each(function () {
			var holder = $(this)
			var image = holder.find("> img").hide()
			var imageSrc = image.prop("src")
			holder.css({
				backgroundImage: "url(" + imageSrc + ")",
			})
		})
	}

	initBgCover();

	/* smooth scroll*/
	var winWidth = $(window).width()
	$(' a.js-has-smooth[href*="#"]:not([href="#"])').click(function () {
		if (location.pathname.replace(/^\//, "") == this.pathname.replace(/^\//, "") && location.hostname == this.hostname) {
			var target = $(this.hash)
			target = target.length ? target : $("[name=" + this.hash.slice(1) + "]")
			if (target.length) {
				if (winWidth > 991) {
					$("html, body").animate(
						{
							scrollTop: target.offset().top - 50,
						},
						1000
					)
				} else {
					$("html, body").animate(
						{
							scrollTop: target.offset().top,
						},
						1000
					)
				}
				return false
			}
		}
	})

	// slider-col2
	$(".slider-col-3").slick({
		arrows: true,
		dots: true,
		slidesToShow: 3,
		adaptiveHeight: true,
		slidesToScroll: 1,
		centerMode:true,
		centerPadding: '0',
		autoplay: true,
		autoplaySpeed: 10000,
		responsive: [
			{
				breakpoint: 1200,
				settings: {
					slidesToShow: 2,
					centerMode: false,
				},
			},
			{
				breakpoint: 769,
				settings: {
					slidesToShow: 1,
					centerMode: false,
				},
			},
		],
	})
})