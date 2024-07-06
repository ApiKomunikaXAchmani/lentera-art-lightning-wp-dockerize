<?php
if(!defined('ABSPATH')) {
	exit;
}
?>
<div class="dfd-dashboard-section activation">
	<div class="inner">
		<h3 class="header">
			<?php esc_html_e('Theme activation', 'dfd-native') ?>
			<span class="badge"><?php esc_html_e('Activated', 'dfd-native') ?></span>
		</h3>
		<div class="content">
			<p><?php esc_html_e('Activated theme allows you to get:', 'dfd-native') ?></p>
			<?php require_once get_template_directory() .'/inc/lib/dashboard/templates/activation/active-features.php' ?>
			<p>
				<?php esc_html_e('Congratulations!', 'dfd-native') ?>
				<span><?php esc_html_e('You successfully activated your theme version.', 'dfd-native') ?></span>
				<a href="#" class="dfd-deactivate-theme"><?php esc_html_e('Deactivate theme', 'dfd-native') ?></a>
			</p>
		</div>
	</div>
</div>