<?php
if(!defined('ABSPATH')) {
	exit;
}
$active = (isset($this->isActive) && 'active' === $this->isActive);

$themeData = get_template();
$currentVersion = wp_get_theme($themeData)->get('Version');

if(!class_exists('Dfd_Remote_Actions_Class')) {
	require_once get_template_directory() .'/inc/lib/dashboard/lib/class.remote.php';
}
if(method_exists('Dfd_Remote_Actions_Class', 'instance')) {
	$remote_instance = Dfd_Remote_Actions_Class::instance();
	$response = $remote_instance->getLatestVersion();
	if(is_wp_error($response) || !isset($response['version']) || $response['theme'] != 'DFD Native') {
		$version = false;
	} else {
		$version = $response['version'];
	}
}
$newVersion = (isset($version)) ? $version : false;

$buttonHtml = '<a class="button button-primary dfd-disabled">'. esc_html__('Update theme', 'dfd-native') .'</a>';
if($active) {
	$buttonHtml = '<a href="'. esc_url(admin_url('update-core.php')) .'" class="button button-primary" target="_blank">'. esc_html__('Update theme', 'dfd-native') .'</a>';
}
?>
<div class="dfd-dashboard-section update">
	<div class="inner">
		<h3 class="header">
			<?php esc_html_e('Theme update', 'dfd-native') ?>
			<?php if($active) : ?>
				<span class="badge"><?php esc_html_e('Updated', 'dfd-native') ?></span>
			<?php else: ?>
				<span class="badge inactive"><?php esc_html_e('Not activated', 'dfd-native') ?></span>
			<?php endif; ?>
		</h3>
		<div class="content">
			<ul>
				<li>
					<p><?php esc_html_e('Installed version', 'dfd-native') ?></p>
					<p><span><?php echo esc_html($currentVersion) ?></span></p>
				</li>
				<?php if($newVersion) { ?>
					<li>
						<p><?php esc_html_e('Latest available version', 'dfd-native') ?></p>
						<p><span><?php echo esc_html($newVersion) ?></span></p>
					</li>
				<?php } ?>
			</ul>
			<p>
				<span><?php esc_html_e('Please install Envato market plugin', 'dfd-native') ?></span><br>
				<span><?php esc_html_e('to get automatic updates', 'dfd-native') ?></span>
			</p>
			<div>
				<ul>
					<li>
						<a href="//nativewptheme.net/support/first-steps/native-theme-update" title="<?php esc_attr_e('Theme update', 'dfd-native') ?>" target="_blank"><?php esc_html_e('Manual update guide', 'dfd-native') ?></a>
					</li>
					<li>
						<a href="https://themeforest.net/item/native-powerful-startup-development-tool/19200310" title="<?php esc_attr_e('Theme page', 'dfd-native') ?>" target="_blank"><?php esc_html_e('Visit theme page', 'dfd-native') ?></a>
					</li>
				</ul>
			</div>
			<p><?php echo wp_kses_post($buttonHtml) ?></p>
		</div>
	</div>
</div>