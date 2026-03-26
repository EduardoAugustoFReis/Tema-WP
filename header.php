<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<?php
	$logo = cmb2_get_option('header_settings', 'header_logo');
	$menu_items = cmb2_get_option('header_settings', 'header_menu', []);
	?>

	<header class="site-header">
		<div class="header-container">
			<div class="header-logo">
				<a href="<?php echo esc_url(home_url('/')); ?>">
					<?php if ($logo): ?>
						<img src="<?php echo esc_url($logo); ?>" alt="<?php bloginfo('name'); ?>">
					<?php else: ?>
						<?php bloginfo('name'); ?>
					<?php endif; ?>
				</a>
			</div>
			<nav class="header-nav">
				<ul>
					<?php if ($menu_items): ?>
						<?php foreach ($menu_items as $item):
							$page_id = !empty($item['link_page']) ? $item['link_page'] : 0;
							$url = $page_id ? get_permalink($page_id) : '#';
							$text = !empty($item['link_text']) ? esc_html($item['link_text']) : 'Link';
						?>
							<li><a href="<?php echo esc_url($url); ?>"><?php echo $text; ?></a></li>
						<?php endforeach; ?>
					<?php endif; ?>
				</ul>
			</nav>
		</div>
	</header>