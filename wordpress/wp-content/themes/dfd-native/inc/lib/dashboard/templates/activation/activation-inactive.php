<?php
if(!defined('ABSPATH')) {
	exit;
}
$data = 'data-redirect="'. esc_attr(apply_filters('dfd_activation_redirect', true)) .'"';
if(get_option('envato_setup_complete', false)) {
	$data = '';
}
?>
<div class="dfd-dashboard-section activation inactive">
	<div class="inner">
		<h3 class="header">
			<?php esc_html_e('Theme activation', 'dfd-native') ?>
			<span class="badge"><?php esc_html_e('Not activated', 'dfd-native') ?></span>
		</h3>
		<div class="content">
			<div class="front">
				<p><?php esc_html_e('Activated theme allows you to get:', 'dfd-native') ?></p>
				<?php require_once get_template_directory() .'/inc/lib/dashboard/templates/activation/active-features.php' ?>
			</div>
			<div class="back">
				<p><?php esc_html_e('Enter your purchase code', 'dfd-native') ?></p>
				<p><span><?php esc_html_e('Where can I get my purchase code', 'dfd-native') ?></span> <a href="https://help.market.envato.com/hc/en-us/articles/202822600-Where-Is-My-Purchase-" title="<?php esc_attr_e('instruction', 'dfd-native')?>"><?php esc_html_e('instruction', 'dfd-native')?></a></p>
				<p class="input-wrapper">
					<input type="text" class="animated" id="dfd-native-purchase-code" />
					<span class="alert empty-field"><?php esc_html_e('Please enter the purchase code', 'dfd-native') ?></span>
					<span class="alert wrong-code"><?php esc_html_e('Please enter a valid code', 'dfd-native') ?></span>
				</p>
				<p><?php esc_html_e('Reminder!', 'dfd-native') ?> <span><?php esc_html_e('One registration per Website. If registered elsewhere please deactivate that registration first.', 'dfd-native') ?></span></p>
			</div>
			<p>
				<a href="#" class="dfd-get-activation-form button button-primary" title="<?php esc_attr_e('Activate theme', 'dfd-native') ?>" <?php echo !empty($data) ? $data : $data ?>><?php esc_html_e('Activate theme', 'dfd-native') ?></a>
			</p>
		</div>
	</div>
</div>