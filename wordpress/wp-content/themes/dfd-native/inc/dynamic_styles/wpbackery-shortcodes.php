<?php
$output .= '.dfd-timeline-wrap .timeline-nav-button:before {';
	$output .= 'color: '. $vars['main_site_color'] .'; ';
$output .= '}';
$output .= '.dfd-timeline-wrap .timeline-nav-button:hover:before {';
	$output .= 'color: '. $vars['secondary_site_color'] .'; ';
$output .= '}';
$output .= '.dfd-timeline-wrap .timeline__item.completed:before, .dfd-timeline-wrap .timeline__item.completed:after, .dfd-timeline-wrap.timeline--horizontal .timeline__item:first-child.completed .timeline__item__inner:before, .dfd-timeline-wrap.timeline--horizontal .timeline__item.completed + .timeline__item.completed .timeline__item__inner:before {';
	$output .= 'background: '. $vars['main_site_color'] .'; ';
$output .= '}';