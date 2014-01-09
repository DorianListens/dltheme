jQuery(function($){
	$(window).load(function() {
		var $container = $('.port-grid');
		// init
		$container.isotope({
  		// options
  		itemSelector: '.portfolio-item',
  		layoutMode: 'masonry'
		});

	$('.filter a').click(function(){
		  var selector = $(this).attr('data-filter');
			$('.port-grid').isotope({ filter: selector });
			$(this).parents('ul').find('a').removeClass('active');
			$(this).addClass('active');
		  return false;
		});
	});
});