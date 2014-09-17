jQuery(document).ready(function($){
	//Work ScrollTo
	$("#works-archive a").click(function(e) {
		e.preventDefault();
		$id = $(this).attr('href');
	    $('html, body').animate({
	        scrollTop: $($id).offset().top
	    }, 200);
	});

	//Work Filter
	$('ul#filters li').click(function(){
		$filter = $(this).attr('data-filter');
		$('ul#filters li').removeClass('active');
		$(this).addClass('active');
		$('#works .work-entry').removeClass('hide');
		$('#works .work-entry').each(function(){
			if($(this).hasClass($filter) == false){
				$(this).addClass('hide');
			}
		});
	});

	//Masonry
	setTimeout(function(){
		//Blogroll
		$blogMasn = $('#posts-masn').masonry({
			//columnWidth: 460,
			itemSelector: '.blog-entry',
			gutter: 20
		});

		//Advocate
		$advMasn = $('#adv-mason').masonry({
			//columnWidth: 226,
			itemSelector: '.adv-entry',
			gutter: 10
		});

		//People
		$peopleMasn = $('#people-masn').masonry({
			//columnWidth: 460,
			itemSelector: '.people-entry',
			gutter: 18
		});
		$('.people-entry').click(function(e){
			if($(this).hasClass('active')){
				$('.people-entry').removeClass('active');
				$peopleMasn.masonry();
			}else{
				$('.people-entry').removeClass('active');
				$(this).addClass('active');
				$peopleMasn.masonry();
			}
		});
	}, 400);

	//Say Hello
	$('li.sayhello').click(function(e){
		e.preventDefault();
		$('#sayHello').toggleClass('active');
	});
	$('#sayHello').hover(function(e){
		if($timer){
			clearTimeout($timer);
		}
	},function(e){
		$timer = setTimeout(function(){
			$('#sayHello').removeClass('active');
		}, 250);
	});

	//Mobile
	$('#menuTrigger').click(function(ev){
		$('#siteWrap').addClass('active');
		$('#mobileMenu').addClass('active');
		$('body').addClass('noscroll');
		$('#siteWrap').width($('#siteWrap').width);
		document.ontouchmove = function(event){
			event.preventDefault();
		}
	});
	$(document).hammer({swipe_velocity:0.3}).on('dragleft dragright swipeleft swiperight',function(ev){
		ev.gesture.preventDefault();
		if(ev.type == 'dragleft' || ev.type == 'dragright' || ev.type == 'swiperight') {return;}

		$('#siteWrap').removeClass('active');
		$('#mobileMenu').removeClass('active');
		$('body').removeClass('active');
		$('#siteWrap').width('100%');
		document.ontouchmove = function(event){
			return true;
		}
	});
	$('body.noscroll').bind("touchmove", {}, function(event){
	  event.preventDefault();
	});


});