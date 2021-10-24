
"use strict";
$(document).ready(function () {
	$(".loginCard .rgstr-btn button").click(function () {
		$('.loginCard .wrapper').addClass('move');
		$('.body').css('background', '#e0b722');
		$(".loginCard .login-btn button").removeClass('active');
		$(this).addClass('active');

	});
	$(".loginCard .login-btn button").click(function () {
		$('.loginCard .wrapper').removeClass('move');
		$('.body').css('background', '#ff4931');
		$(".loginCard .rgstr-btn button").removeClass('active');
		$(this).addClass('active');
	});
});