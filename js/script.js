$(function(){
	//quick menu
	var menuOpen = false;
	$('.q_menu>a').click(function(){
		if(menuOpen == false){
			$(this).addClass('on');
			$(this).find('.sound_only').text('퀵메뉴 닫기');
			menuOpen = true;
		}else{
			$(this).removeClass('on');
			$(this).find('.sound_only').text('퀵메뉴 열기');
			menuOpen = false;
		}
		return false;
	});

	// main nowpay slider
	$('.nowpay .slider').slick({
		arrows: false,
		dots: true,
		slidesToShow: 3,
		responsive: [
			{
				breakpoint: 1024,
				settings: {
					arrows: false,
					centerMode: true,
					centerPadding: '22px',
					slidesToShow: 1
				  }
			}
		]
	});

	// accordion
	$('.paysearch a').click(function(){
		if($(this).parent('li').hasClass('on')){
			$(this).parent('li').removeClass('on');
			$(this).next('.bottom').slideUp();
		}else{
			$('.paysearch li').removeClass('on');
			$('.paysearch .bottom').slideUp();
			$(this).parent('li').addClass('on');
			$(this).next('.bottom').slideDown();
		}
		return false;
	});
	$('.paysearch li:first-child a').trigger('click');
});