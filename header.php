<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<?php wp_body_open(); ?>

	<?php
	$logo = function_exists('cmb2_get_option')
		? cmb2_get_option('header_settings', 'header_logo')
		: '';

	$menu_items = function_exists('cmb2_get_option')
		? cmb2_get_option('header_settings', 'header_menu', [])
		: [];
	?>

	<header class="site-header">
		<div class="header-container">

			<!-- LOGO -->
			<div class="header-logo">
				<a href="<?php echo esc_url(home_url('/')); ?>" aria-label="Ir para a página inicial">

					<?php if (!empty($logo)) : ?>
						<img
							src="<?php echo esc_url($logo); ?>"
							alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
					<?php else : ?>
						<span class="site-title">
							<?php bloginfo('name'); ?>
						</span>
					<?php endif; ?>

				</a>
			</div>

			<!-- MENU -->
			<nav class="header-nav" aria-label="Menu principal">

				<?php if (!empty($menu_items) && is_array($menu_items)) : ?>
					<ul>

						<?php foreach ($menu_items as $item) :

							$page_id = !empty($item['link_page']) ? $item['link_page'] : 0;
							$url = $page_id ? get_permalink($page_id) : '#';
							$text = !empty($item['link_text']) ? $item['link_text'] : 'Link';

							// Classe ativo (UX MUITO BOM)
							$is_active = ($page_id && is_page($page_id)) ? 'current-menu-item' : '';
						?>

							<li class="<?php echo esc_attr($is_active); ?>">
								<a href="<?php echo esc_url($url); ?>">
									<?php echo esc_html($text); ?>
								</a>
							</li>

						<?php endforeach; ?>

					</ul>
				<?php endif; ?>

			</nav>

		</div>
	</header>