<?php
if(!defined('ABSPATH')) {
	exit;
}
$status = Dfd_Theme_Helpers::getSystemStatus();
?>
<div class="dfd-dashboard-section status">
	<div class="inner">
		<h3 class="header">
			<?php esc_html_e('System status', 'dfd-native') ?>
			<?php if($status['failed'] === 0) : ?>
				<span class="badge"><?php esc_html_e('Ok', 'dfd-native') ?></span>
			<?php else : ?>
				<span class="badge failed"><?php esc_html_e('Bad', 'dfd-native') ?></span>
			<?php endif; ?>
		</h3>
		<div class="content">
			<p><?php esc_html_e('Current system specifications', 'dfd-native') ?>:</p>
			<?php if(!empty($status) && is_array($status)) { ?>
				<ul>
					<?php foreach($status as $k => $v) : ?>
						<?php if(!empty($v['name']) && !empty($v['value'])) { ?>
							<li>
								<?php echo esc_html($v['name']) ?>
								<span class="status-wrapper">
									<?php echo ($v['passed']) ? '<span class="passed">'.esc_html__('Ok', 'dfd-native').'</span>' : '<span class="passed failed">'.esc_html__('Bad', 'dfd-native').'</span>' ?>
									<span class="value"><?php echo esc_html($v['value']) ?></span>
								</span>
							</li>
						<?php } ?>
					<?php endforeach; ?>
				</ul>
			<?php } ?>
			<?php if($status['failed'] === 100) : ?>
				<p><?php esc_html_e('The checker could not test your server configuration. Please get in touch with our support if you face any difficulties.', 'dfd-native') ?></p>
			<?php endif; ?>
			<p><a href="https://nativewptheme.net/support/first-steps/getting-started" target="_blank" title="<?php esc_attr_e('Check System Requirements', 'dfd-native') ?>"><?php esc_html_e('Check System Requirements', 'dfd-native') ?></a></p>
		</div>
	</div>
</div>