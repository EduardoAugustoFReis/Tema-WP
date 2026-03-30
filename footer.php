<?php
$footer_settings = get_option('footer_settings', []);

// Segurança: verifica se os valores existem
$footer_logo = isset($footer_settings['footer_logo']) ? $footer_settings['footer_logo'] : '';
$footer_text = isset($footer_settings['footer_text']) ? $footer_settings['footer_text'] : '';
$footer_menu = isset($footer_settings['footer_menu']) ? $footer_settings['footer_menu'] : [];
$socials = isset($footer_settings['footer_socials']) ? $footer_settings['footer_socials'] : [];
$copyright = isset($footer_settings['footer_copyright'])
	? $footer_settings['footer_copyright']
	: '© ' . date('Y') . ' Meu Site - Todos os direitos reservados';
?>


<footer class="site-footer">
	<div class="footer-container">

		<!-- Informações do Footer -->
		<div class="footer-info">
			<?php if ($footer_logo): ?>
				<img src="<?php echo esc_url($footer_logo); ?>" alt="<?php bloginfo('name'); ?>">
			<?php endif; ?>
			<?php if ($footer_text): ?>
				<p><?php echo esc_html($footer_text); ?></p>
			<?php endif; ?>
		</div>

		<!-- Menu do Footer -->
		<?php if ($footer_menu): ?>
			<div class="footer-menu">
				<h3>Menu</h3>
				<ul>
					<?php foreach ($footer_menu as $item):
						$page_id = isset($item['link_page']) ? $item['link_page'] : 0;
						$text = isset($item['link_text']) ? $item['link_text'] : 'Link';
						$url = $page_id ? get_permalink($page_id) : '#';
					?>
						<li><a href="<?php echo esc_url($url); ?>"><?php echo esc_html($text); ?></a></li>
					<?php endforeach; ?>
				</ul>
			</div>
		<?php endif; ?>

		<!-- Redes Sociais -->
		<?php if ($socials): ?>
			<div class="footer-socials">
				<h3>Redes Sociais</h3>
				<ul>
					<?php foreach ($socials as $social):
						$url = isset($social['url']) ? $social['url'] : '#';
						$name = isset($social['name']) ? $social['name'] : '';
						$icon = isset($social['icon']) ? $social['icon'] : '';
					?>
						<li>
							<a href="<?php echo esc_url($url); ?>" target="_blank" rel="noopener">
								<?php if ($icon): ?>
									<img src="<?php echo esc_url($icon); ?>" alt="<?php echo esc_attr($name); ?>">
								<?php else: ?>
									<?php echo esc_html($name); ?>
								<?php endif; ?>
							</a>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
		<?php endif; ?>

	</div>

	<!-- Copyright -->
	<div class="footer-copy">
		<p><?php echo esc_html($copyright); ?></p>
	</div>
</footer>

<?php wp_footer(); ?>
</body>

</html>