<?php
if(!defined('ABSPATH')) {
	exit;
}
$tab = '68';
if(class_exists('WooCommerce')) {
	$tab = '73';
}
$active = (isset($this->isActive) && 'active' === $this->isActive);
$url = '#';
if($active) {
	$url = get_admin_url() .'admin.php?page=native&tab='. $tab;
}
?>
<div class="dfd-dashboard-section demo-installation">
	<div class="inner">
		<h3 class="header">
			<?php esc_html_e('Demo installation', 'dfd-native') ?>
			<?php if($active) : ?>
				<span class="badge"><?php esc_html_e('Activated', 'dfd-native') ?></span>
			<?php else: ?>
				<span class="badge inactive"><?php esc_html_e('Not activated', 'dfd-native') ?></span>
			<?php endif; ?>
		</h3>
		<div class="content">
			<p><?php esc_html_e('More than 60 amazing demos are available', 'dfd-native') ?></p>
			<ul>
				<li>
					<p><?php esc_html_e('Nishe demos for any business', 'dfd-native') ?></p>
					<p><span><?php esc_html_e('Automatically delivery of a fresh version', 'dfd-native') ?></span></p>
				</li>
				<li>
					<p><?php esc_html_e('80+ google speed test', 'dfd-native') ?></p>
					<p><span><?php esc_html_e('Qualified help of our team', 'dfd-native') ?></span></p>
				</li>
				<li>
					<p><?php esc_html_e('Multi page demos for your business', 'dfd-native') ?></p>
					<p><span><?php esc_html_e('Super puper demos in two clicks', 'dfd-native') ?></span></p>
				</li>
			</ul>
			<p>
				<a href="<?php echo esc_url($url) ?>" title="<?php esc_attr_e('Button', 'dfd-native') ?>" target="_blank" class="button button-primary <?php echo esc_attr($active) ? '' : 'dfd-activation-required' ?>"><?php esc_html_e('Start install demos', 'dfd-native') ?></a>
			</p>
		</div>
	</div>
</div>