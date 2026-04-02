<?php
$footer_settings = get_option('footer_settings', []);

$footer_logo = $footer_settings['footer_logo'] ?? '';
$footer_text = $footer_settings['footer_text'] ?? '';
$footer_menu = $footer_settings['footer_menu'] ?? [];
$socials = $footer_settings['footer_socials'] ?? [];

$copyright = $footer_settings['footer_copyright']
	?? '© ' . date('Y') . ' ' . get_bloginfo('name') . ' - Todos os direitos reservados';
?>

<footer class="site-footer">
	<div class="container footer-container">

		<!-- INFO -->
		<div class="footer-info">

			<?php if (!empty($footer_logo)) : ?>
				<img
					src="<?php echo esc_url($footer_logo); ?>"
					alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
			<?php endif; ?>

			<?php if (!empty($footer_text)) : ?>
				<p><?php echo esc_html($footer_text); ?></p>
			<?php endif; ?>

		</div>

		<!-- MENU -->
		<?php if (!empty($footer_menu) && is_array($footer_menu)) : ?>
			<div class="footer-menu">
				<h3>Menu</h3>

				<ul>
					<?php foreach ($footer_menu as $item) :

						$page_id = $item['link_page'] ?? 0;
						$text = $item['link_text'] ?? 'Link';
						$url = ($page_id && get_post_status($page_id))
							? get_permalink($page_id)
							: home_url('/');
					?>

						<li>
							<a href="<?php echo esc_url($url); ?>">
								<?php echo esc_html($text); ?>
							</a>
						</li>

					<?php endforeach; ?>
				</ul>
			</div>
		<?php endif; ?>

		<!-- REDES -->
		<?php if (!empty($socials) && is_array($socials)) : ?>
			<div class="footer-socials">
				<h3>Redes sociais</h3>

				<ul>
					<?php foreach ($socials as $social) :

						$url = $social['url'] ?? '#';
						$name = $social['name'] ?? 'Rede social';
						$icon = $social['icon'] ?? '';
					?>

						<li>
							<a
								href="<?php echo esc_url($url); ?>"
								target="_blank"
								rel="noopener noreferrer"
								aria-label="<?php echo esc_attr($name); ?>">

								<?php if (!empty($icon)) : ?>
									<img
										src="<?php echo esc_url($icon); ?>"
										alt="<?php echo esc_attr($name); ?>">
								<?php else : ?>
									<?php echo esc_html($name); ?>
								<?php endif; ?>

							</a>
						</li>

					<?php endforeach; ?>
				</ul>
			</div>
		<?php endif; ?>

	</div>

	</div>


	<!-- COPYRIGHT -->
	<div class="footer-copy">
		<p><?php echo esc_html($copyright); ?></p>
	</div>

</footer>

<?php wp_footer(); ?>
</body>

</html>