(function($) {
	"use strict";
	var dfd_native = window.dfd_native || {};
	
	window.dfd_native = dfd_native;
	
	dfd_native.window = $(window),
	dfd_native.document = $(document),
	dfd_native.windowHeight = dfd_native.window.height(),
	dfd_native.windowWidth = dfd_native.window.width(),
	dfd_native.scrollbarWidth = 0,
	dfd_native.windowScrollTop = 0;
	dfd_native.sameOrigin = true;
	
	dfd_native.initObjectsSizing = function() {
		try {
			dfd_native.sameOrigin = window.parent.location.host == window.location.host;
		} catch (e) {
			dfd_native.sameOrigin = false;
		}
		
		var recalcWindowOffset = function() {
			dfd_native.windowScrollTop = dfd_native.window.scrollTop();
		};

		dfd_native.document.ready(function() {
			var div = document.createElement('div');

			div.style.overflowY = 'scroll';
			div.style.width =  '50px';
			div.style.height = '50px';

			div.style.visibility = 'hidden';

			document.body.appendChild(div);
			dfd_native.scrollbarWidth = div.offsetWidth - div.clientWidth;
			document.body.removeChild(div);

		});

		var recalcWindowInitHeight = function() {
			dfd_native.windowHeight = dfd_native.window.height();
			dfd_native.windowWidth = dfd_native.window.width() + dfd_native.scrollbarWidth;

			recalcWindowOffset();
		};

		recalcWindowInitHeight();

		recalcWindowOffset();
		
		dfd_native.window
				.on("resize load", recalcWindowInitHeight)
				.on("scroll", recalcWindowOffset);
		
		dfd_native.window.on("load", function() {
			$('body').trigger('reinit-waypoint');
		});
	};
	
	dfd_native.initVcShortcodesScripts = function() {
		var initShortcodes = function() {
				initImageLayersModule();
			},
			initImageLayersModule = function() {
				$('.dfd-image-layers-wrap').each(function() {
					var $container = $(this),
						layerWidth = 0,
						initImageLayers = function() {
							if(typeof $.fn.equalHeights != 'undefined') {
								$container.find('.dfd-layer-container').equalHeights();
							}

							if(typeof $.fn.waypoint != 'undefined') {
								$container.waypoint(function () {
									$container.addClass('layer-animate');
								}, {triggerOnce: true, offset: '70%'});
							}
						},
						imageSizing = function() {
							$container.find('.dfd-layer-item').each(function(){
								var $el = $(this);

								if($el.width() > layerWidth) {
									layerWidth = $el.width();
								}
							});

							$container.css({'width': layerWidth});
						};


					dfd_native.window.on('load', function() {
						if(typeof $.fn.imagesLoaded != 'undefined') {
							$container.find('.dfd-layer-item').imagesLoaded().done( function() {
								imageSizing();
								initImageLayers();
							});
						}
					});

					dfd_native.window.on('resize', initImageLayers);

					$('body').on('post-load', function() {
						if(typeof $.fn.imagesLoaded != 'undefined') {
							$container.find('.dfd-layer-item').imagesLoaded().done( function() {
								imageSizing();
							});
						}
						initImageLayers();
					});
				});
			};
		
		dfd_native.document.ready(function() {
			initShortcodes();
		});
		$('body').on('post-load', initShortcodes);
	};
	
	dfd_native.init = function() {
		dfd_native.initVcShortcodesScripts();
	};
	
	dfd_native.init();
	
	if(navigator.userAgent.search("Firefox") >= 0 || (navigator.userAgent.search("Safari") >= 0 && navigator.userAgent.search("Chrome") < 0) ) {
		dfd_native.document.ready(function() {
			$(window).trigger('load');
		});
	}
})(jQuery);