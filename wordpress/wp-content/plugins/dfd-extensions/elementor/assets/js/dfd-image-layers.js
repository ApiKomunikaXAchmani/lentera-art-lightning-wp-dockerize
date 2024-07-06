jQuery(window).on('elementor/frontend/init', function () {
	elementorFrontend.hooks.addAction('frontend/element_ready/el_image_layers.default', function ($element) {
		elementorFrontend.elements.$body.trigger('post-load');
//		console.log('la-la-la');
//		setTimeout(function() {
//			jQuery('body').trigger('test-trigger');
//		}, 5000);
		
//		var $container = $element.find('.dfd-image-layers-wrap'),
//			layerWidth = 0,
//			initImageLayers = function () {
//				if (typeof jQuery.fn.equalHeights != 'undefined') {
//					$container.find('.dfd-layer-container').equalHeights('elementor-widget-container');
//				}
//
//				if (typeof jQuery.fn.waypoint != 'undefined') {
//					$container.waypoint(function () {
//						$container.addClass('layer-animate');
//					}, {triggerOnce: true, offset: '70%'});
//				}
//			},
//			imageSizing = function () {
//				$container.find('.dfd-layer-item').each(function () {
//					var $el = jQuery(this);
//
//					if ($el.width() > layerWidth) {
//						layerWidth = $el.width();
//					}
//				});
//
//				$container.css({'width': layerWidth});
//			};
//		imageSizing();
//		initImageLayers();
//		jQuery(window).resize(function () {
//			initImageLayers();
//		});
	});
});

//(function($) {
//	$(window).on( 'elementor/frontend/init', function() {
//		elementorFrontend.on( 'components:init', function() {
//			elementorFrontend.elements.$document.off(
//				'click', 
//				elementorFrontend.utils.anchors.getSettings('selectors.links'),
//				elementorFrontend.utils.anchors.handleAnchorLinks
//			);
//		});
//	});
//})(jQuery);

//jQuery(window).on('elementor/frontend/init', function () {
//        elementorFrontend.hooks.addAction('frontend/element_ready/woocommerce-product-data-tabs.default', function ($scope, $) {
//            productPageScripts.tabs();
//            productPageScripts.accordion();
//            productPageScripts.rating();
//        });
//        elementorFrontend.hooks.addAction('frontend/element_ready/woocommerce-product-add-to-cart.default', function ($scope, $) {
//            productPageScripts.productVariable();
//            productPageScripts.productQuantity();
//        });
//    });
	
	
//add_action('elementor/widget/render_content', function ($content, $widget) {
//    if ('woocommerce-product-data-tabs' === $widget->get_name()) {
//        if (empty($GLOBALS['thegem_product_page_elementor_template'])) {
//            $thegem_product_data = thegem_get_output_product_page_data(get_the_ID());
//
//            $params = [
//                'tabs' => $thegem_product_data['product_page_desc_review_layout'],
//                'tabs_position' => $thegem_product_data['product_page_desc_review_layout_acc_position'],
//            ];
//
//            if ($params['tabs'] == 'one_by_one' || ($params['tabs'] == 'accordion' && $params['tabs_position'] == 'next_to_gallery') ) {
//                $content = '<div class="preloader skeleton product-tabs-skeleton"></div>';
//            }
//        }
//    }
//    return $content;
//}, 10, 2);